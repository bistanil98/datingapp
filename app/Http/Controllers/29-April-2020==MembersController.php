<?php
	namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Model\Customer;
use DB;
use Session;
use Mail;
use App\Jobs\SendEmailJob;
use App\Http\Middleware\SuperCustomer;
use Illuminate\Http\UploadedFile;
use Carbon\Carbon;

class MembersController  extends Controller
{
    
    public function __construct(){
        // there are only function allow same auth 		
		$this->middleware(SuperCustomer::class, ['except' => ['resend','reset_password','password_lost','logout','login','register','verification','email_password','update_password','password_saved','publish']]);
		// Alternativly
		//$this->middleware('auth', ['except' => ['index', 'show']]);
    }


	public function change_password(Request $request){
	$title = "Change Password ";        
	$data = compact('title');
	$user_id = $request->session()->get('user_id'); 		
	if ( !empty( $request->except('_token') ) ){
	$validatedData = $request->validate([		         		 
	'new_password'  => 'required|min:6',
	'password_confirmation' => 'required|same:new_password'
	]);
	// write code to update password			
	$new_password = $request->input('new_password');
	DB::table('customer')
	->where('id', $user_id)
	->update(['password'=>md5($new_password)]);	
	session()->flush();
	Session::flash('message', 'Password Changed Successfully'); 
	Session::flash('alert-class', 'alert-success');
	
	return redirect('/customer/login'); 
	}

	return view('front.customer.change_password',$data); 

	}
	
	
	public function logout(){
		session()->flush();
		Session::flash('message', 'Logout Successfully'); 
		Session::flash('alert-class', 'alert-success');			
		return redirect('/'); 
	}  



		
	public function email_password($id=null) {        
	$title = "Email Password";        
	$data = compact('title');			
	return view('front.members.email_password',['id'=>$id],$data); 
	}	
	
	public function resend($id=null) {        
	$title = "Email Password";        
	$members=  DB::table('members')->where(['id' =>$id])->first();			
	$hostname = getenv('HTTP_HOST');
		if($hostname=="localhost:7777"){			
		}else{
			$hash = md5( rand(0,1000) );
			$site_url_link = url('/')."/members/update-password/".$hash;
			$email = $members->email;
			DB::table('members')
			->where('id' ,$id)
			->update(['hash' =>$hash]);	
			
			Mail::send('front.emails.register',
			     $user=array(
				 'email' => $email,
				 'site_url_link' => $site_url_link,
				 ), function($message) use ($user,$email){
			   $message->from('escortlisting@escortlisting.localjoy.website');
			   $message->to($email, 'Escort')->subject('Thanks For Register On Escort');
		   }); 
		}
		return redirect('/members/email-password/'.$id); 
	}	

	
	public function update_password(Request $request,$hash){     
	
	$title = "Member choose password";       
	$data = compact('title');
	$members=  DB::table('members')->where(['hash' =>$hash])->count();
	if($members>0){
	
	if ( !empty( $request->except('_token') ) ){
	
	$validatedData = $request->validate([
	'new_password' => 'required|min:6',	   
	'confirm_password' => 'required|same:new_password'   
	]);

	$password = $request->input('new_password');	  
	$members=  DB::table('members')->where(['hash' =>$hash])->first();
		DB::table('members')
		->where(['id' =>$members->id])
		->update([
		'password' =>md5($password)	,
		'is_email' =>1	
		]);
						
			return redirect('members/password-saved'); 
	
	}
	
	}else{		
			Session::flash('message', 'Account not found!'); 
			Session::flash('alert-class', 'alert-danger');	
			//return redirect('/members/login'); 
		}	
	
	
	return view('front.members.update_password',['hash'=>$hash],$data); 
	}
	// update password
	public function password_saved() {        
		$title = "Password Saved";        
		$data = compact('title');			
		return view('front.members.password_saved',$data); 
	}
	
	// publish
	public function publish() {        
		$title = "Publish";        
		$data = compact('title');			
		return view('front.members.publish',$data); 
	}
	
	
	// publish
	public function control(Request $request) {        
		$title = "Control";        
		$data = compact('title');
		$user_id= $request->session()->get('user_id');
		$members=  DB::table('members')
		->where(['id' =>$user_id])
		->first();
		
		$profile_ads =  DB::table('profile_ads')
		->where('member_id',$user_id)	
		->select('id')
		->first();
		if(!empty($profile_ads)){
		$ads_id = $profile_ads->id;
		}else{
		$ads_id = '';
		}
		return view('front.members.control',['members'=>$members,'ads_id'=>$ads_id],$data); 
	}
	
	


	
		public function password_lost(Request $request){	
		$title = "Password Lost";        
        $data = compact('title');


	  if ( !empty( $request->except('_token') ) ){
        $validatedData = $request->validate([		 
        'email' => 'required'		
	  ]);
		
	    $email = ($request->email);
		 $get_user = DB::table('members')		
		->where('email',$email)				
		->where('role','Individual')				
		->first();		
        if(!empty($get_user)){        
			$hash = md5( rand(0,1000) );
			$site_url_link = url('/')."/members/reset-password/".$hash;		
			DB::table('members')
			->where(['email' =>$email])
			->update([
			'hash' =>$hash,			
			]);
			$hostname = getenv('HTTP_HOST');
			if($hostname=="localhost:7777"){
			}else{
			Mail::send('front.emails.members_password_lost',
			$user=array(
				'name' => $get_user->name,
				'email' => $email,
				'site_url_link' => $site_url_link,
			), function($message) use ($user,$email){
			$message->from('escortlisting@escortlisting.localjoy.website');
			$message->to($email, 'Escort')->subject('Reset you password');
			}); 
			}

			Session::flash('message', 'An email will be sent to the Registrant email for the account. That email will include a link to change your password.'); 
			Session::flash('alert-class', 'alert-success');	
		  }else{
			Session::flash('message', 'Email address not found!'); 
			Session::flash('alert-class', 'alert-danger'); 			
			return redirect()->back();  
         }
	}
	   
		return view('front.members.password_lost',$data); 
	
	}
	
	public function reset_password(Request $request,$hash){     
	
	$title = "Member  Reset password";       
	$data = compact('title');
	$members=  DB::table('members')->where('role','Individual')->where(['hash' =>$hash])->count();
	if($members>0){
	
		if ( !empty( $request->except('_token') ) ){		
		$validatedData = $request->validate([
		'new_password' => 'required|min:6',	   
		'confirm_password' => 'required|same:new_password'   
		]);
			$password = $request->input('new_password');	  
			$members=  DB::table('members')->where(['hash' =>$hash])->first();
			$hash = md5( rand(0,1000) );
			DB::table('members')
			->where(['id' =>$members->id])
			->update([
			'password' =>md5($password),	
			'hash' =>$hash		
			]);
			Session::flash('message', 'Your account password successfully updated'); 
			Session::flash('alert-class', 'alert-success');					
			return redirect('publish'); 		
		}
	
	}else{		
		Session::flash('message', 'Your reset password token has expired'); 
		Session::flash('alert-class', 'alert-danger');
		return redirect('publish'); 
	}	
	
	
	return view('front.members.reset_password',['hash'=>$hash],$data); 
	}
	
	public function profile(Request $request){
	
	$user_id= $request->session()->get('user_id');	
	
	$profile_ads =  DB::table('profile_ads')
	->where('member_id',$user_id)	
	->first();
	
	$members=  DB::table('members')
	->where(['id' =>$user_id])
	->first();
	$categories=  DB::table('categories')
	//->orderby('name','asc')
	->where('status','1')
	->get();
	$over_you=  DB::table('over_you')
	->orderby('name','asc')
	->where('status','1')
	->get();
	
	$services=  DB::table('services')
	->orderby('name','asc')
	->where('status','1')
	->get();
	
	$countries=  DB::table('countries')->select('nationality')->get();
	$province=  DB::table('province')
	->orderby('name','asc')
	->where('status','1')
	->get();   
	$title = "Membership Profile";
	
	
	if(!empty($profile_ads)){
		if ( !empty( $request->except('_token') ) ){
	 
	$first_name = $request->input('first_name');	  
	$schedule_status = $request->input('schedule_status');	  
	$telephone = $request->input('telephone');	  
	$category = $request->input('category');
	$province = $request->input('province');
	$population = $request->input('population');
	$zone = $request->input('zone');
	$nationality = $request->input('nationality');
	$age = $request->input('age');
	$height = $request->input('height');
	//$weight = $request->input('weight');
	if($category=='chaperos'){
	$chest = '';
	}else{
	$chest = $request->input('chest');
	}
	$hair = $request->input('hair');
	$eyes = $request->input('eyes');
	$contact_me_by_whatsApp = $request->input('contact_me_by_whatsApp');	
	if(!empty($request->input('over_you'))){
	$over_you = $request->input('over_you');
	$over_you = implode(', ', $over_you);
	}else{
	$over_you = '';
	}
	
	if(!empty($request->input('services'))){
	$services = $request->input('services');
	$services = implode(', ', $services);
	}else{
	$services = '';
	}	
	
	$customer_experiences = $request->input('customer_experiences');
	$title = $request->input('title');
	$text = $request->input('text');
	$role = 'Individual';
	$member_id = $user_id;
	$created_at =  date('Y-m-d h:i:s');
	$update_at =  date('Y-m-d h:i:s');
	$profile_ads_id = $profile_ads->id;
	// INSERT COMMAND
	DB::table('profile_ads')
	->where('profile_ads.id', $profile_ads_id)
	->update(
	[
	'schedule_status' =>$schedule_status,	
	'first_name' =>$first_name,	
	'telephone' =>$telephone,	
	'category' =>$category,	
	'province' =>$province,	
	'population' =>$population,	
	'zone' =>$zone,	
	'nationality' =>$nationality,	
	'age' =>$age,	
	'height' =>$height,	
	//'weight' =>$weight,	
	'chest' =>$chest,	
	'hair' =>$hair,	
	'eyes' =>$eyes,	
	'contact_me_by_whatsApp' =>$contact_me_by_whatsApp,	
	'over_you' =>$over_you,	
	'services' =>$services,	
	'customer_experiences' =>$customer_experiences,	
	'title' =>$title,	
	'text'=>$text,
	'role'=>$role,
	'member_id'=>$member_id,	
	//'created_at'=>$created_at,
	'update_at'=>$update_at,
	]
	);
	
       
		// upload profile photo		
		if($request->hasFile('profile')){
			$image = $request->file('profile');
			if(!empty($profile_ads->profile_pic)){
			 $file_path=  public_path('/uploads/profile_ads/'.$profile_ads->profile_pic);
			 unlink($file_path);
			}
			$destinationPath = public_path('/uploads/profile_ads/');
			$profile=$image->getClientOriginalName();
			$profile = time().$profile;           
			$image->move($destinationPath, $profile);
			$image_path= public_path('/uploads/profile_ads/');
			DB::table('profile_ads')
			->where('profile_ads.id', $profile_ads_id)
			->update([
			
			'profile_pic' => $profile,		
			]);
			}
		//End Photo
		
		// upload pic1 photo		
		if($request->hasFile('pic1')){
			$image = $request->file('pic1');
			if(!empty($profile_ads->gallery_1)){
			 $file_path=  public_path('/uploads/profile_ads/'.$profile_ads->gallery_1);
			 unlink($file_path);
			}
			$destinationPath = public_path('/uploads/profile_ads/');
			$pic1=$image->getClientOriginalName();
			$pic1 = time().$pic1;           
			$image->move($destinationPath, $pic1);
			$image_path= public_path('/uploads/profile_ads/');
			DB::table('profile_ads')
			->where('profile_ads.id', $profile_ads_id)
			->update([
			
			'gallery_1' => $pic1,		
			]);
			}
		//End Photo
		
		// upload pic2 photo		
		if($request->hasFile('pic2')){
			$image = $request->file('pic2');	
			if(!empty($profile_ads->gallery_2)){
			 $file_path=  public_path('/uploads/profile_ads/'.$profile_ads->gallery_2);
			 unlink($file_path);
			}
			$destinationPath = public_path('/uploads/profile_ads/');
			$pic2=$image->getClientOriginalName();
			$pic2 = time().$pic2;           
			$image->move($destinationPath, $pic2);
			$image_path= public_path('/uploads/profile_ads/');
			DB::table('profile_ads')		
			->where('profile_ads.id', $profile_ads_id)
			->update([
			
			'gallery_2' => $pic2,		
			]);
			}
		//End Photo
		
		// upload pic3 photo		
		if($request->hasFile('pic3')){
			$image = $request->file('pic3');
			if(!empty($profile_ads->gallery_3)){
			 $file_path=  public_path('/uploads/profile_ads/'.$profile_ads->gallery_3);
			 unlink($file_path);
			}
			$destinationPath = public_path('/uploads/profile_ads/');
			$pic3=$image->getClientOriginalName();
			$pic3 = time().$pic3;           
			$image->move($destinationPath, $pic3);
			$image_path= public_path('/uploads/profile_ads/');
			DB::table('profile_ads')
			->where('profile_ads.id', $profile_ads_id)
			->update([			
			'gallery_3' => $pic3,		
			]);
			}
		//End Photo
		
		// upload pic4 photo		
		if($request->hasFile('pic4')){
			$image = $request->file('pic4');	
			if(!empty($profile_ads->gallery_4)){
			 $file_path=  public_path('/uploads/profile_ads/'.$profile_ads->gallery_4);
			 unlink($file_path);
			}
			$destinationPath = public_path('/uploads/profile_ads/');
			$pic4=$image->getClientOriginalName();
			$pic4 = time().$pic4;           
			$image->move($destinationPath, $pic4);
			$image_path= public_path('/uploads/profile_ads/');
			DB::table('profile_ads')
			->where('profile_ads.id', $profile_ads_id)
			->update([
			
			'gallery_4' => $pic4,		
			]);
			}
		//End Photo
		
		
		// upload pic5 photo		
		if($request->hasFile('pic5')){
			$image = $request->file('pic5');
			if(!empty($profile_ads->gallery_5)){
			 $file_path=  public_path('/uploads/profile_ads/'.$profile_ads->gallery_5);
			 unlink($file_path);
			}
			$destinationPath = public_path('/uploads/profile_ads/');
			$pic5=$image->getClientOriginalName();
			$pic5 = time().$pic5;           
			$image->move($destinationPath, $pic5);
			$image_path= public_path('/uploads/profile_ads/');
			DB::table('profile_ads')
			->where('profile_ads.id', $profile_ads_id)
			->update([
			
			'gallery_5' => $pic5,		
			]);
			}
		//End Photo
		
		
		// upload pic6 photo		
		if($request->hasFile('pic6')){
			$image = $request->file('pic6');
			if(!empty($profile_ads->gallery_6)){
			 $file_path=  public_path('/uploads/profile_ads/'.$profile_ads->gallery_6);
			 unlink($file_path);
			}
			$destinationPath = public_path('/uploads/profile_ads/');
			$pic6=$image->getClientOriginalName();
			$pic6 = time().$pic6;           
			$image->move($destinationPath, $pic6);
			$image_path= public_path('/uploads/profile_ads/');
			DB::table('profile_ads')	
			->where('profile_ads.id', $profile_ads_id)
			->update([
			
			'gallery_6' => $pic6,		
			]);
			}
		//End Photo
		
		
		// upload pic7 photo		
		if($request->hasFile('pic7')){
			$image = $request->file('pic7');
			if(!empty($profile_ads->gallery_7)){
			 $file_path=  public_path('/uploads/profile_ads/'.$profile_ads->gallery_7);
			 unlink($file_path);
			}
			$destinationPath = public_path('/uploads/profile_ads/');
			$pic7=$image->getClientOriginalName();
			$pic7 = time().$pic7;           
			$image->move($destinationPath, $pic7);
			$image_path= public_path('/uploads/profile_ads/');
			DB::table('profile_ads')	
			->where('profile_ads.id', $profile_ads_id)
			->update([
			
			'gallery_7' => $pic7,		
			]);
			}
		//End Photo
		
		
		// upload pic8 photo		
		if($request->hasFile('pic8')){
			$image = $request->file('pic8');	
			if(!empty($profile_ads->gallery_8)){
			 $file_path=  public_path('/uploads/profile_ads/'.$profile_ads->gallery_8);
			 unlink($file_path);
			}
			$destinationPath = public_path('/uploads/profile_ads/');
			$pic8=$image->getClientOriginalName();
			$pic8 = time().$pic8;           
			$image->move($destinationPath, $pic8);
			$image_path= public_path('/uploads/profile_ads/');
			DB::table('profile_ads')
			->where('profile_ads.id', $profile_ads_id)
			->update([
			
			'gallery_8' => $pic8,		
			]);
			}
		//End Photo
		
		
		// upload selfie1 photo		
		if($request->hasFile('selfie1')){
			$image = $request->file('selfie1');	
			if(!empty($profile_ads->selfie_1)){
			 $file_path=  public_path('/uploads/profile_ads/'.$profile_ads->selfie_1);
			 unlink($file_path);
			}
			$destinationPath = public_path('/uploads/profile_ads/');
			$selfie1=$image->getClientOriginalName();
			$selfie1 = time().$selfie1;           
			$image->move($destinationPath, $selfie1);
			$image_path= public_path('/uploads/profile_ads/');
			DB::table('profile_ads')
			->where('profile_ads.id', $profile_ads_id)
			->update([
			
			'selfie_1' => $selfie1,		
			]);
			}
		//End Photo
		
		// upload selfie2 photo		
		if($request->hasFile('selfie2')){
			$image = $request->file('selfie2');	
			if(!empty($profile_ads->selfie_2)){
			 $file_path=  public_path('/uploads/profile_ads/'.$profile_ads->selfie_2);
			 unlink($file_path);
			}
			$destinationPath = public_path('/uploads/profile_ads/');
			$selfie2=$image->getClientOriginalName();
			$selfie2 = time().$selfie2;           
			$image->move($destinationPath, $selfie2);
			$image_path= public_path('/uploads/profile_ads/');
			DB::table('profile_ads')
			->where('profile_ads.id', $profile_ads_id)
			->update([
			
			'selfie_2' => $selfie2,		
			]);
			}
		//End Photo
		
		// upload selfie3 photo		
		if($request->hasFile('selfie3')){
			$image = $request->file('selfie3');	
			if(!empty($profile_ads->selfie_3)){
			 $file_path=  public_path('/uploads/profile_ads/'.$profile_ads->selfie_3);
			 unlink($file_path);
			}
			$destinationPath = public_path('/uploads/profile_ads/');
			$selfie3=$image->getClientOriginalName();
			$selfie3 = time().$selfie3;           
			$image->move($destinationPath, $selfie3);
			$image_path= public_path('/uploads/profile_ads/');
			DB::table('profile_ads')
			->where('profile_ads.id', $profile_ads_id)
			->update([
			
			'selfie_3' => $selfie3,		
			]);
			}
		//End Photo
		
		// upload selfie4 photo		
		if($request->hasFile('selfie4')){
			$image = $request->file('selfie4');	
			if(!empty($profile_ads->selfie_4)){
			 $file_path=  public_path('/uploads/profile_ads/'.$profile_ads->selfie_4);
			 unlink($file_path);
			}
			$destinationPath = public_path('/uploads/profile_ads/');
			$selfie4=$image->getClientOriginalName();
			$selfie4 = time().$selfie4;           
			$image->move($destinationPath, $selfie4);
			$image_path= public_path('/uploads/profile_ads/');
			DB::table('profile_ads')
			->where('profile_ads.id', $profile_ads_id)
			->update([
			
			'selfie_4' => $selfie4,		
			]);
			}
		//End Photo
		
		// upload video1 photo		
		if($request->hasFile('video1')){
			$image = $request->file('video1');
			if(!empty($profile_ads->video_1)){
			 $file_path=  public_path('/uploads/profile_ads/'.$profile_ads->video_1);
			 unlink($file_path);
			}
			$destinationPath = public_path('/uploads/profile_ads/');
			$video1=$image->getClientOriginalName();
			$video1 = time().$video1;           
			$image->move($destinationPath, $video1);
			$image_path= public_path('/uploads/profile_ads/');
			DB::table('profile_ads')	
			->where('profile_ads.id', $profile_ads_id)
			->update([
			
			'video_1' => $video1,		
			]);
			}
		//End Photo
		
		
		// upload video2 photo		
		if($request->hasFile('video2')){
			$image = $request->file('video2');
			if(!empty($profile_ads->video_2)){
			 $file_path=  public_path('/uploads/profile_ads/'.$profile_ads->video_2);
			 unlink($file_path);
			}
			$destinationPath = public_path('/uploads/profile_ads/');
			$video2=$image->getClientOriginalName();
			$video2 = time().$video2;           
			$image->move($destinationPath, $video2);
			$image_path= public_path('/uploads/profile_ads/');
			DB::table('profile_ads')	
			->where('profile_ads.id', $profile_ads_id)
			->update([
			
			'video_2' => $video2,		
			]);
			}
		//End Photo
		
		
		// upload video3 photo		
		if($request->hasFile('video3')){
			$image = $request->file('video3');
			if(!empty($profile_ads->video_3)){
			 $file_path=  public_path('/uploads/profile_ads/'.$profile_ads->video_3);
			 unlink($file_path);
			}
			$destinationPath = public_path('/uploads/profile_ads/');
			$video3=$image->getClientOriginalName();
			$video3 = time().$video3;           
			$image->move($destinationPath, $video3);
			$image_path= public_path('/uploads/profile_ads/');
			DB::table('profile_ads')
			->where('profile_ads.id', $profile_ads_id)
			->update([
			
			'video_3' => $video3,		
			]);
			}
		//End Photo
		
		
		// upload video4 photo		
		if($request->hasFile('video4')){
			$image = $request->file('video4');
			if(!empty($profile_ads->video_4)){
			 $file_path=  public_path('/uploads/profile_ads/'.$profile_ads->video_4);
			 unlink($file_path);
			}
			$destinationPath = public_path('/uploads/profile_ads/');
			$video4=$image->getClientOriginalName();
			$video4 = time().$video4;           
			$image->move($destinationPath, $video4);
			$image_path= public_path('/uploads/profile_ads/');
			DB::table('profile_ads')
			->where('profile_ads.id', $profile_ads_id)
			->update([
			
			'video_4' => $video4,		
			]);
			}
		//End Photo
		
		
		// Tarifas
		$tariffs = array();
		foreach($request->input('tariffs_description') as $key=>$data){	
		if(!empty($data)){
			$tariffs[] = array(
				"tariffs_description"   => $data,
				"tariffs_euro_price" => $request->input('tariffs_euro_price')[$key]
			);
		}
		
		}
		if(!empty($tariffs)){
		$tariffsJSON = json_encode($tariffs);
		   DB::table('profile_ads')
			->where('profile_ads.id', $profile_ads_id)
			->update([			
		 	'tariffs' => $tariffsJSON,		
			]);
		}
		// END Tarifas
		
		// schedule
	
		$schedule = array();
		if($schedule_status=='no'){
		$from_1 = array_values(array_filter($request->input('from_1')));
		$from_2 = array_values(array_filter($request->input('from_2')));
		$unit_1 = array_values(array_filter($request->input('unit_1')));
		$unit_2 = array_values(array_filter($request->input('unit_2')));
		foreach($request->input('days') as $key=>$data){	
		if(!empty($data)){		
			$schedule[] = array(
				"days"   => $data,
				"from_1" => $from_1[$key],
				"from_2" => $from_2[$key],
				"unit_1" => $unit_1[$key],
				"unit_2" => $unit_2[$key]
			);
		}
		
		}
		}else{
		foreach($request->input('full_days') as $key=>$data){	
		if(!empty($data)){
			$schedule[] = array(
				"days"   => $data,
				"from_1" => $request->input('full_from_1')[$key],
				"from_2" => $request->input('full_from_2')[$key],
				"unit_1" => $request->input('full_unit_1')[$key],
				"unit_2" => $request->input('full_unit_2')[$key]
			);
		}
		
		}
		}
		
		if(!empty($schedule)){
		$scheduleJSON = json_encode($schedule);
		   DB::table('profile_ads')
			->where('profile_ads.id', $profile_ads_id)
			->update([
			
			'schedule' => $scheduleJSON,		
			]);
		}
				
		Session::flash('message', 'Profile Update Successfully'); 
		Session::flash('alert-class', 'alert-success');	
		return redirect('/members/control');  
	}
		
		$population = DB::table('population')
		->where('province_id', '=', $profile_ads->province)		
		->get();
		return view('front.members.profile_edit',[
		'profile_ads'=>$profile_ads,
		'population'=>$population,
		'categories'=>$categories,
		'over_you'=>$over_you,
		'province'=>$province,		
		'countries'=>$countries,
		'services'=>$services,
		'profile_ads'=>$profile_ads,
		'title'=>$title]);
		
	}else{
	if ( !empty( $request->except('_token') ) ){	
	$schedule_status = $request->input('schedule_status');	
	$first_name = $request->input('first_name');	  
	$telephone = $request->input('telephone');	  
	$category = $request->input('category');
	$province = $request->input('province');
	$population = $request->input('population');
	$zone = $request->input('zone');
	$nationality = $request->input('nationality');
	$age = $request->input('age');
	$height = $request->input('height');
	//$weight = $request->input('weight');
	if($category=='chaperos'){
	$chest = '';
	}else{
	$chest = $request->input('chest');
	}
	$hair = $request->input('hair');
	$eyes = $request->input('eyes');
	$contact_me_by_whatsApp = $request->input('contact_me_by_whatsApp');	
	if(!empty($request->input('over_you'))){
	$over_you = $request->input('over_you');
	$over_you = implode(', ', $over_you);
	}else{
	$over_you = '';
	}
	
	if(!empty($request->input('services'))){
	$services = $request->input('services');
	$services = implode(', ', $services);
	}else{
	$services = '';
	}	
	
	$customer_experiences = $request->input('customer_experiences');
	$title = $request->input('title');
	$text = $request->input('text');
	$role = 'Individual';
	$member_id = $user_id;
	$created_at =  date('Y-m-d h:i:s');
	$update_at =  date('Y-m-d h:i:s');
	
	// INSERT COMMAND
	DB::table('profile_ads')	
	->insert(
	[
	'schedule_status' =>$schedule_status,	
	'first_name' =>$first_name,	
	'telephone' =>$telephone,	
	'category' =>$category,	
	'province' =>$province,	
	'population' =>$population,	
	'zone' =>$zone,	
	'nationality' =>$nationality,	
	'age' =>$age,	
	'height' =>$height,	
	//'weight' =>$weight,	
	'chest' =>$chest,	
	'hair' =>$hair,	
	'eyes' =>$eyes,	
	'contact_me_by_whatsApp' =>$contact_me_by_whatsApp,	
	'over_you' =>$over_you,	
	'services' =>$services,	
	'customer_experiences' =>$customer_experiences,	
	'title' =>$title,	
	'text'=>$text,
	'role'=>$role,
	'member_id'=>$member_id,	
	'created_at'=>$created_at,
	'update_at'=>$update_at,
	]
	);
	// insert id 
	$profile_ads_id = DB::getPdo()->lastInsertid();;
        
		// upload profile photo		
		if($request->hasFile('profile')){
			$image = $request->file('profile');										
			$destinationPath = public_path('/uploads/profile_ads/');
			$profile=$image->getClientOriginalName();
			$profile = time().$profile;           
			$image->move($destinationPath, $profile);
			$image_path= public_path('/uploads/profile_ads/');
			DB::table('profile_ads')
			->where('profile_ads.id', $profile_ads_id)
			->update([
			
			'profile_pic' => $profile,		
			]);
			}
		//End Photo
		
		// upload pic1 photo		
		if($request->hasFile('pic1')){
			$image = $request->file('pic1');										
			$destinationPath = public_path('/uploads/profile_ads/');
			$pic1=$image->getClientOriginalName();
			$pic1 = time().$pic1;           
			$image->move($destinationPath, $pic1);
			$image_path= public_path('/uploads/profile_ads/');
			DB::table('profile_ads')
			->where('profile_ads.id', $profile_ads_id)
			->update([
			
			'gallery_1' => $pic1,		
			]);
			}
		//End Photo
		
		// upload pic2 photo		
		if($request->hasFile('pic2')){
			$image = $request->file('pic2');										
			$destinationPath = public_path('/uploads/profile_ads/');
			$pic2=$image->getClientOriginalName();
			$pic2 = time().$pic2;           
			$image->move($destinationPath, $pic2);
			$image_path= public_path('/uploads/profile_ads/');
			DB::table('profile_ads')		
			->where('profile_ads.id', $profile_ads_id)
			->update([
			
			'gallery_2' => $pic2,		
			]);
			}
		//End Photo
		
		// upload pic3 photo		
		if($request->hasFile('pic3')){
			$image = $request->file('pic3');										
			$destinationPath = public_path('/uploads/profile_ads/');
			$pic3=$image->getClientOriginalName();
			$pic3 = time().$pic3;           
			$image->move($destinationPath, $pic3);
			$image_path= public_path('/uploads/profile_ads/');
			DB::table('profile_ads')
			->where('profile_ads.id', $profile_ads_id)
			->update([
			
			'gallery_3' => $pic3,		
			]);
			}
		//End Photo
		
		// upload pic4 photo		
		if($request->hasFile('pic4')){
			$image = $request->file('pic4');										
			$destinationPath = public_path('/uploads/profile_ads/');
			$pic4=$image->getClientOriginalName();
			$pic4 = time().$pic4;           
			$image->move($destinationPath, $pic4);
			$image_path= public_path('/uploads/profile_ads/');
			DB::table('profile_ads')
			->where('profile_ads.id', $profile_ads_id)
			->update([
			
			'gallery_4' => $pic4,		
			]);
			}
		//End Photo
		
		
		// upload pic5 photo		
		if($request->hasFile('pic5')){
			$image = $request->file('pic5');										
			$destinationPath = public_path('/uploads/profile_ads/');
			$pic5=$image->getClientOriginalName();
			$pic5 = time().$pic5;           
			$image->move($destinationPath, $pic5);
			$image_path= public_path('/uploads/profile_ads/');
			DB::table('profile_ads')
			->where('profile_ads.id', $profile_ads_id)
			->update([
			
			'gallery_5' => $pic5,		
			]);
			}
		//End Photo
		
		
		// upload pic6 photo		
		if($request->hasFile('pic6')){
			$image = $request->file('pic6');										
			$destinationPath = public_path('/uploads/profile_ads/');
			$pic6=$image->getClientOriginalName();
			$pic6 = time().$pic6;           
			$image->move($destinationPath, $pic6);
			$image_path= public_path('/uploads/profile_ads/');
			DB::table('profile_ads')	
			->where('profile_ads.id', $profile_ads_id)
			->update([
			
			'gallery_6' => $pic6,		
			]);
			}
		//End Photo
		
		
		// upload pic7 photo		
		if($request->hasFile('pic7')){
			$image = $request->file('pic7');										
			$destinationPath = public_path('/uploads/profile_ads/');
			$pic7=$image->getClientOriginalName();
			$pic7 = time().$pic7;           
			$image->move($destinationPath, $pic7);
			$image_path= public_path('/uploads/profile_ads/');
			DB::table('profile_ads')	
			->where('profile_ads.id', $profile_ads_id)
			->update([
			
			'gallery_7' => $pic7,		
			]);
			}
		//End Photo
		
		
		// upload pic8 photo		
		if($request->hasFile('pic8')){
			$image = $request->file('pic8');										
			$destinationPath = public_path('/uploads/profile_ads/');
			$pic8=$image->getClientOriginalName();
			$pic8 = time().$pic8;           
			$image->move($destinationPath, $pic8);
			$image_path= public_path('/uploads/profile_ads/');
			DB::table('profile_ads')
			->where('profile_ads.id', $profile_ads_id)
			->update([
			
			'gallery_8' => $pic8,		
			]);
			}
		//End Photo
		
		
		// upload selfie1 photo		
		if($request->hasFile('selfie1')){
			$image = $request->file('selfie1');										
			$destinationPath = public_path('/uploads/profile_ads/');
			$selfie1=$image->getClientOriginalName();
			$selfie1 = time().$selfie1;           
			$image->move($destinationPath, $selfie1);
			$image_path= public_path('/uploads/profile_ads/');
			DB::table('profile_ads')
			->where('profile_ads.id', $profile_ads_id)
			->update([
			
			'selfie_1' => $selfie1,		
			]);
			}
		//End Photo
		
		// upload selfie2 photo		
		if($request->hasFile('selfie2')){
			$image = $request->file('selfie2');										
			$destinationPath = public_path('/uploads/profile_ads/');
			$selfie2=$image->getClientOriginalName();
			$selfie2 = time().$selfie2;           
			$image->move($destinationPath, $selfie2);
			$image_path= public_path('/uploads/profile_ads/');
			DB::table('profile_ads')
			->where('profile_ads.id', $profile_ads_id)
			->update([
			
			'selfie_2' => $selfie2,		
			]);
			}
		//End Photo
		
		// upload selfie3 photo		
		if($request->hasFile('selfie3')){
			$image = $request->file('selfie3');										
			$destinationPath = public_path('/uploads/profile_ads/');
			$selfie3=$image->getClientOriginalName();
			$selfie3 = time().$selfie3;           
			$image->move($destinationPath, $selfie3);
			$image_path= public_path('/uploads/profile_ads/');
			DB::table('profile_ads')
			->where('profile_ads.id', $profile_ads_id)
			->update([
			
			'selfie_3' => $selfie3,		
			]);
			}
		//End Photo
		
		// upload selfie4 photo		
		if($request->hasFile('selfie4')){
			$image = $request->file('selfie4');										
			$destinationPath = public_path('/uploads/profile_ads/');
			$selfie4=$image->getClientOriginalName();
			$selfie4 = time().$selfie4;           
			$image->move($destinationPath, $selfie4);
			$image_path= public_path('/uploads/profile_ads/');
			DB::table('profile_ads')
			->where('profile_ads.id', $profile_ads_id)
			->update([
			
			'selfie_4' => $selfie4,		
			]);
			}
		//End Photo
		
		// upload video1 photo		
		if($request->hasFile('video1')){
			$image = $request->file('video1');										
			$destinationPath = public_path('/uploads/profile_ads/');
			$video1=$image->getClientOriginalName();
			$video1 = time().$video1;           
			$image->move($destinationPath, $video1);
			$image_path= public_path('/uploads/profile_ads/');
			DB::table('profile_ads')	
			->where('profile_ads.id', $profile_ads_id)
			->update([
			
			'video_1' => $video1,		
			]);
			}
		//End Photo
		
		
		// upload video2 photo		
		if($request->hasFile('video2')){
			$image = $request->file('video2');										
			$destinationPath = public_path('/uploads/profile_ads/');
			$video2=$image->getClientOriginalName();
			$video2 = time().$video2;           
			$image->move($destinationPath, $video2);
			$image_path= public_path('/uploads/profile_ads/');
			DB::table('profile_ads')	
			->where('profile_ads.id', $profile_ads_id)
			->update([
			
			'video_2' => $video2,		
			]);
			}
		//End Photo
		
		
		// upload video3 photo		
		if($request->hasFile('video3')){
			$image = $request->file('video3');										
			$destinationPath = public_path('/uploads/profile_ads/');
			$video3=$image->getClientOriginalName();
			$video3 = time().$video3;           
			$image->move($destinationPath, $video3);
			$image_path= public_path('/uploads/profile_ads/');
			DB::table('profile_ads')
			->where('profile_ads.id', $profile_ads_id)
			->update([
			
			'video_3' => $video3,		
			]);
			}
		//End Photo
		
		
		// upload video4 photo		
		if($request->hasFile('video4')){
			$image = $request->file('video4');										
			$destinationPath = public_path('/uploads/profile_ads/');
			$video4=$image->getClientOriginalName();
			$video4 = time().$video4;           
			$image->move($destinationPath, $video4);
			$image_path= public_path('/uploads/profile_ads/');
			DB::table('profile_ads')
			->where('profile_ads.id', $profile_ads_id)
			->update([
			
			'video_4' => $video4,		
			]);
			}
		//End Photo
		
		
		// Tarifas
		$tariffs = array();
		foreach($request->input('tariffs_description') as $key=>$data){	
		if(!empty($data)){
			$tariffs[] = array(
				"tariffs_description"   => $data,
				"tariffs_euro_price" => $request->input('tariffs_euro_price')[$key]
			);
		}
		
		}
		if(!empty($tariffs)){
		$tariffsJSON = json_encode($tariffs);
		   DB::table('profile_ads')
			->where('profile_ads.id', $profile_ads_id)
			->update([
			
			'tariffs' => $tariffsJSON,		
			]);
		}
		// END Tarifas
		
		// schedule
	
		$schedule = array();
		if($schedule_status=='no'){
		$from_1 = array_values(array_filter($request->input('from_1')));
		$from_2 = array_values(array_filter($request->input('from_2')));
		$unit_1 = array_values(array_filter($request->input('unit_1')));
		$unit_2 = array_values(array_filter($request->input('unit_2')));
		foreach($request->input('days') as $key=>$data){	
		if(!empty($data)){		
			$schedule[] = array(
				"days"   => $data,
				"from_1" => $from_1[$key],
				"from_2" => $from_2[$key],
				"unit_1" => $unit_1[$key],
				"unit_2" => $unit_2[$key]
			);
		}
		
		}
		}else{
		foreach($request->input('full_days') as $key=>$data){	
		if(!empty($data)){
			$schedule[] = array(
				"days"   => $data,
				"from_1" => $request->input('full_from_1')[$key],
				"from_2" => $request->input('full_from_2')[$key],
				"unit_1" => $request->input('full_unit_1')[$key],
				"unit_2" => $request->input('full_unit_2')[$key]
			);
		}
		
		}
		}
		
		if(!empty($schedule)){
		$scheduleJSON = json_encode($schedule);
		   DB::table('profile_ads')
			->where('profile_ads.id', $profile_ads_id)
			->update([
			
			'schedule' => $scheduleJSON,		
			]);
		}
		// END schedule
		Session::flash('message', 'Profile Update Successfully'); 
		Session::flash('alert-class', 'alert-success');	
		return redirect('/members/control'); 
		
		}else{
			return view('front.members.profile',[
			'categories'=>$categories,
			'over_you'=>$over_you,
			'province'=>$province,		
			'countries'=>$countries,
			'services'=>$services,
			'profile_ads'=>$profile_ads,
			'title'=>$title]);	
		}
	}

	}
	
		public function contrasena(Request $request){     
	$user_id= $request->session()->get('user_id');
	$title = "Member  Change password";       
	$data = compact('title');
	$members=  DB::table('members')->where(['id' =>$user_id])->count();
	
	if($members>0){
		$members_password=  DB::table('members')->select('password')->where(['id' =>$user_id])->first();
		if ( !empty( $request->except('_token') ) ){		
		$validatedData = $request->validate([
		'new_password' => 'required|min:6',	   
		'confirm_password' => 'required|same:new_password'   
		]);
			$password = $request->input('new_password');	  						
			$old_password = $request->input('old_password');
			if(md5($old_password)==($members_password->password)){
			DB::table('members')
			->where(['id' =>$user_id])
			->update([
			'password' =>md5($password),				
			]);
			Session::flash('message', 'Your account password successfully changed'); 
			Session::flash('alert-class', 'alert-success');					
			return redirect('publish'); 
			}else{
				Session::flash('message', 'The old password does not match our records.'); 
				Session::flash('alert-class', 'alert-danger');
			 }
		}
	
	}else{		
		Session::flash('message', 'Invalid member id'); 
		Session::flash('alert-class', 'alert-danger');
		return redirect('publish'); 
	}	
	
	
	return view('front.members.contrasena',$data); 
	}
	
	
		public function contact(Request $request){     
	    $user_id= $request->session()->get('user_id');
		$title = "Member  Contact Us";       
		$data = compact('title');
		if ( !empty( $request->except('_token') ) ){
			$name = $request->input('name');	  						
			$email = $request->input('email');	  						
			$telephone = $request->input('telephone');	  						
			$comments = $request->input('comments');			
			$created_at = date('Y-m-d h:i:s');
			DB::table('agency_contact_enquiry')
			->insert([
				'agency_id' =>$user_id,				
				'type' =>'individual',				
				'name' =>$name,				
				'email' =>$email,				
				'telephone' =>$telephone,				
				'comments' =>$comments,				
				'created_at' =>$created_at,				
			]);
			Session::flash('message', 'Your contact enquiry sent'); 
			Session::flash('alert-class', 'alert-success');					
			return redirect('/members/contact-us'); 
			
		}
		return view('front.members.contact',$data); 
	}
	
	

	
	public function privacy() {        
	 $title = "";        
	 $data = compact('title');			
	  $tearms = DB::table('settings')			
			->select('id','tearms')
			->first();
	 return view('front.members.privacy',['tearms'=>$tearms],$data);
	}
	
		// subida_zone	
	public function subida_zone(Request $request){     
	        $agency_id= $request->session()->get('user_id');
			$profile_ads = DB::table('profile_ads')
			->where('member_id', $agency_id)
			//->where('category',$category)
			//->where('province',$get_provinceId)
			->select('id','first_name','profile_pic','category','province','population','telephone')
			->first();
			//dd($profile_ads);die;
			$title = "Subida Top";          
		$data = compact('title');
		return view('front.members.subida_zone',['Nameprovince'=>'','ads'=>$profile_ads,'id'=>''],$data);  
	}
	
	
		public function subida_zone_payment(Request $request){     
	    $agency_id= $request->session()->get('agency_id');
			if ( !empty( $request->except('_token') ) ){				
			$number_of_photo = count( $request->input('number_of_photo'));
			$UserSelected = ( $request->input('UserSelected'));
			$payment_type = $request->input('payment_type');			
			$created_at = date('Y-m-d h:i:s');			
			// get price for top zona pakages
			$get_user = DB::table('subida_agency_packages')
			->select('price','durations','subidas')
			->where('id',$UserSelected)				
			->first();
			
		   
			$profile_ads_id = implode(', ', $request->input('number_of_photo')); 
			$type = 'subida';
			$total_price = $get_user->price;			
			$seen_days = str_replace(' dias','',$get_user->durations);
			$seen_daily = $get_user->subidas;
			
			DB::table('top_subida_booking_packages')
			->insert([							
				'type' =>$type,				
				'total_price' =>$total_price,				
				'profile_ads_id' =>$profile_ads_id,				
				'user_id' =>$agency_id,				
				'payment_type' =>$payment_type,				
				'created_at' =>$created_at,				
						
			]);
			$order_id = DB::getPdo()->lastInsertid();
			// save multiple data with sparate profile listing @top_subida_profile_lists table  
			$price = $total_price/count($request->input('number_of_photo'));
			foreach($request->input('number_of_photo') as $key=>$data){
				DB::table('top_subida_profile_lists')
				->insert([							
					'order_id' =>$order_id,
					'type' =>$type,	
					'price' =>$price,
					'profile_ads_id' =>$data,
					'user_id' =>$agency_id,								
					'from_date' =>date('Y-m-d', strtotime($request->input('from_date')[$key])),
					'to_date' =>date('Y-m-d', strtotime($request->input('to_date')[$key])),
					'from_date_time' =>$request->input('from_date_time')[$key].':00',
					'to_date_time' => $request->input('to_date_time')[$key].':00',
					'seen_days' =>$seen_days,				
					'seen_daily' =>$seen_daily,	
					'created_at' =>$created_at,	
					
				]);
			}			
			Session::flash('message', 'The escort was successfully added in Auto Subida'); 
			Session::flash('alert-class', 'alert-success');					
			return redirect('/members/control');
			
		}
		 
	}
		
			
	public function zona_top_payment(Request $request){     
	    $agency_id= $request->session()->get('agency_id');
			
		
		if ( !empty( $request->except('_token') ) ){		
			if(empty($request->input('number_of_photo'))){
				Session::flash('message', 'Ads not selected in TOP ANUNCIO'); 
				Session::flash('alert-class', 'alert-error');					
				return redirect('/members/zona-top');
			}
			$number_of_photo = count( $request->input('number_of_photo'));
			$payment_type = $request->input('payment_type');
			$package = $request->input('package');
			$provinces = $request->provinces;		 
			$category = $request->category;	
			$created_at = date('Y-m-d h:i:s');			
			// get price for top zona pakages
			$get_user = DB::table('top_agency_packages')
			->where('advertisements',$number_of_photo)			
			->where('category', 'like', "%".$category."%")
			->where('provinces', 'like', "%".$provinces."%")
			->where('durations',$package)	
			->first();
			// 
			if($get_user==null){
				Session::flash('message', 'Price not selected in TOP ANUNCIO'); 
				Session::flash('alert-class', 'alert-error');					
				return redirect('/members/zona-top');
			}
			
			$profile_ads_id = implode(', ', $request->input('number_of_photo')); 
			$type = 'top';
			$total_price = $get_user->price;
			$price = $total_price/count($request->input('number_of_photo'));
			 DB::table('top_subida_booking_packages')
			->insert([							
				'type' =>$type,			
				'price' =>$price,
				'total_price' =>$total_price,				
				'profile_ads_id' =>$profile_ads_id,				
				'user_id' =>$agency_id,				
				'payment_type' =>$payment_type,				
				'created_at' =>$created_at,				
			]);
			$order_id = DB::getPdo()->lastInsertid(); 
			// save multiple data with sparate profile listing @top_subida_profile_lists table  
			
			// count pakage by end date 
			//1 semana week
			//2 semanas week			
			//1 mes month 
			//3 meses month
			$from_date = date('Y-m-d');
			if($package=='1 semana'){		
			$seen_days = 7;
			$to_date =  gmdate('Y-m-d',strtotime('+1 week',strtotime($from_date)));			
			}else if($package=='2 semanas'){
			$seen_days = 15;
			$to_date =  gmdate('Y-m-d',strtotime('+1 weeks',strtotime($from_date)));
			}else if($package=='1 mes'){
			$seen_days = 30;
			$to_date =  gmdate('Y-m-d',strtotime('+1 month',strtotime($from_date)));
			}else if($package=='3 meses'){
			$seen_days = 90;
			$to_date =  gmdate('Y-m-d',strtotime('+3 months',strtotime($from_date)));
			}
			
			foreach($request->input('number_of_photo') as $data){
				DB::table('top_subida_profile_lists')
				->insert([							
					'order_id' =>$order_id,
					'type' =>$type,	
					'profile_ads_id' =>$data,
					'user_id' =>$agency_id,								
					'from_date' =>$from_date,
					'to_date' =>$to_date,
					'seen_days' =>$seen_days,				
					'created_at' =>$created_at,				
					'seen_daily' =>0
				]);
			}				
			Session::flash('message', 'The escort was successfully added in TOP ANUNCIO'); 
			Session::flash('alert-class', 'alert-success');					
			return redirect('/members/control');
			
		}
		
	}
	

		public function zona_top(Request $request){     
	        $agency_id= $request->session()->get('user_id');
			$profile_ads = DB::table('profile_ads')
			->where('member_id', $agency_id)			
			->select('id','first_name','profile_pic','category','province','population','telephone')
			->first();			
			$title = "Zone Top";          
		$data = compact('title');
		return view('front.members.zona_top',['Nameprovince'=>'','ads'=>$profile_ads,'id'=>''],$data);  
	}	

	public function anuncios(Request $request){     
	        $agency_id= $request->session()->get('user_id');
			$profile_ads = DB::table('profile_ads')
			->where('member_id', $agency_id)			
			->select('id','first_name','profile_pic','category','province','population','telephone','user_status','user_status_subida')
			->first();			
			$title = "Zone Top";          
		$data = compact('title');
		$members=  DB::table('members')
		->where(['id' =>$agency_id])
		->first();
		return view('front.members.anuncios',['members'=>$members,'subida'=>$profile_ads,'id'=>''],$data);  
	}
	
		// @ status records function
		public function status(Request $request, $id, $location,$top_subida_profile_lists_id,$type){	
		
		$agency_id= $request->session()->get('user_id');
		$profile_ads =  DB::table('profile_ads')
		->where('member_id',$agency_id)	
		->where('id',$id)
		->select('user_status','user_status_subida')
		->first();
		
		$top_subida_profile =  DB::table('top_subida_profile_lists')		
		->where('id',$top_subida_profile_lists_id)
		->select('from_date','to_date','seen_days','ad_active_inactive_status')
		->first();
		if($type=='subida'){
		     $status = $profile_ads->user_status_subida; 
		     $fiedls = 'user_status_subida'; 
		}else{
		     $status = $profile_ads->user_status;  
		     $fiedls = 'user_status';  
		    
		}
		
		if($status==1){
		$from_date = \Carbon\Carbon::createFromFormat('Y-m-d', $top_subida_profile->from_date);
		$to_date = \Carbon\Carbon::createFromFormat('Y-m-d', $top_subida_profile->to_date);
		$start_expiry_days = $from_date->diffInDays($to_date);
		$start_date = \Carbon\Carbon::createFromFormat('Y-m-d', $top_subida_profile->from_date);
		$current_date = \Carbon\Carbon::createFromFormat('Y-m-d', date('Y-m-d'));
		$mindays = $from_date->diffInDays($current_date);
		$seen_days  = $start_expiry_days-$mindays;		
			$status = 0;
			DB::table('top_subida_profile_lists')
			->where('id',$top_subida_profile_lists_id)
			->update(['ad_active_inactive_status'=>1,'seen_days'=>$seen_days]);
			
				$created_at = date('Y-m-d h:i:s');
				DB::table('top_subida_profile_on_off_status')
						->insert([
						'profile_ads_id' =>$id,
						'status' =>'off',						
						'created_at' =>$created_at,
						'type' =>$type,
						]);
		}else{
			
			$from_date= \Carbon\Carbon::now()->addDays(0);			
			$to_date= \Carbon\Carbon::now()->addDays($top_subida_profile->seen_days);			
			DB::table('top_subida_profile_lists')
			->where('id',$top_subida_profile_lists_id)
			->update(['ad_active_inactive_status'=>0, 'from_date'=>$from_date, 'to_date'=>$to_date]);			
			$status = 1;
			
			$created_at = date('Y-m-d h:i:s');
				DB::table('top_subida_profile_on_off_status')
						->insert([
						'profile_ads_id' =>$id,
						'status' =>'off',						
						'created_at' =>$created_at,
						'type' =>$type,
						]);
			
		}
		DB::table('profile_ads')
		->where('member_id',$agency_id)	
		->where('id',$id)	
		->update([$fiedls=>$status]);
		Session::flash('message', 'Profile Status Changed');
		Session::flash('alert-class', 'alert-info'); 
		return redirect('/members/'.$location.''); 

		}
		
		
		public function estadisticas(Request $request,$id=null){
		$title = "Performance";        
		$data = compact('title');
		$profile_ads = DB::table('profile_ads')
		->where('id', $id)			
		->select('id','first_name','profile_pic','category','province','population','telephone','created_at')
		->first();	
		
		
		///visualizaciones
		$visualizaciones = DB::table('visualizaciones')
		->where('profile_id', $id)					
		->count();
		$visualizaciones30Days = DB::table('visualizaciones')
		->where('created_at', '>=', Carbon::now()->subDays(30))
		->where('profile_id', $id)					
		->count();
		// there are get 
		
			///visualizaciones
		$piesepuerto = DB::table('top_subida_profile_lists')
		->where('profile_ads_id', $id)					
		->sum('price');
		$piesepuerto30Days = DB::table('top_subida_profile_lists')
		//->where('created_at', '>=', Carbon::now()->subDays(30))
		->where('profile_ads_id', $id)					
		->sum('price');
		// there are get 
		
		
		$TopAnuncioTotalCount = DB::table('visualizaciones')
		->where('profile_id', $id)					
		->where('type', 'top')					
		->count();
		$AutoSubidaCount = DB::table('visualizaciones')
		->where('profile_id', $id)					
		->where('type', 'subida')					
		->count();
		
		return view('front.members.estadisticas',['id'=>$id,
		'ads'=>$profile_ads,
		'visualizaciones'=>$visualizaciones,
		'visualizaciones30Days'=>$visualizaciones30Days,
		'TopAnuncioTotalCount'=>$TopAnuncioTotalCount,
		'AutoSubidaCount'=>$AutoSubidaCount,
		'piesepuerto'=>$piesepuerto,
		'piesepuerto30Days'=>$piesepuerto30Days,
		],$data); 
	}
	
	public function facturacion(Request $request){     
	    $user_id= $request->session()->get('user_id');
		$title = "Member  Facturacion";       
		$data = compact('title');
		if ( !empty( $request->except('_token') ) ){
			$name = $request->input('name');	  						
			$email = $request->input('email');	  						
			$telephone = $request->input('telephone');	  						
			$comments = $request->input('comments');			
			$created_at = date('Y-m-d h:i:s');
			DB::table('agency_contact_enquiry')
			->insert([
				'agency_id' =>$user_id,				
				'type' =>'facturacion',				
				'name' =>$name,				
				'email' =>$email,				
				'telephone' =>$telephone,				
				'comments' =>$comments,				
				'created_at' =>$created_at,				
			]);
			Session::flash('message', 'Your contact enquiry sent'); 
			Session::flash('alert-class', 'alert-success');					
			return redirect('/members/facturacion'); 
			
		}
		return view('front.members.facturacion',$data); 
	}
	
	
		
}
