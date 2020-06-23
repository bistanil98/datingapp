<?php
	namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Model\Customer;
use DB;
use Session;
use Mail;
use App\Jobs\SendEmailJob;
use App\Http\Middleware\SuperAgency;
use Illuminate\Http\UploadedFile;

class AgencyController  extends Controller
{
    
    public function __construct(){
        // there are only function allow same auth 		
		$this->middleware(SuperAgency::class, ['except' => ['update_password','plan_agencia','register_agencia','email_verify','verify','login','password_lost','logout']]);
		
    }


		
	public function plan_agencia(Request $request) { 
	$agency_id= $request->session()->get('agency_id');
	if(!empty($agency_id)){
		return redirect('/agencia/control');
	}
	 $title = "";        
	 $data = compact('title');			
	$agency_packages = DB::table('agency_packages')->get();			
		return view('front.agency.plan_agency',['agency_packages'=>$agency_packages],$data);
	}
	
	public function login(Request $request){
	$agency_id= $request->session()->get('agency_id');
	if(!empty($agency_id)){
		return redirect('/agencia/control');
	}
		$title = "Agency Login";        
        $data = compact('title');

	  if ( !empty( $request->except('_token') ) ){
        $validatedData = $request->validate([		 
        'email' => 'required',		 
		'password'  => 'required',		
	  ]);
		
	    $password = md5($request->password);
	    $email = ($request->email);
		 $get_user = DB::table('members')
		//->where('is_email',1)		
		->where('role','Agency')		
		->where('email',$email)		
		->where('password',$password)		
		->first();			
        if(!empty($get_user)){ 
			if($get_user->is_email!=1){
				Session::flash('message', 'Email address is not verified.'); 
				Session::flash('alert-class', 'alert-danger'); 			
				
			}else if($get_user->status!=1){
				Session::flash('message', 'Your account is temporarily locked contact your system administrator'); 
				Session::flash('alert-class', 'alert-danger'); 			
				
			}else{
				session(['agency_id' => $get_user->id]);		     		    
				return redirect('/agencia/control');
			}
			 
	  }else{
		Session::flash('message', 'Invalid login detail'); 
		Session::flash('alert-class', 'alert-danger'); 			
		return redirect()->back();  
	 }
	}
	   
		return view('front.agency.login',$data); 
	
	}
	
	 public function logout() {	
        session()->flush();
		Session::flash('message', 'Logout Successfully'); 
		Session::flash('alert-class', 'alert-success');	
        return redirect('/agencia-login');
    }
	
	public function register_agencia(Request $request){     
	$agency_id= $request->session()->get('agency_id');
	if(!empty($agency_id)){
		return redirect('/agencia/control');
	}
	$categories=  DB::table('categories')
	//->orderby('name','asc')
	->where('status','1')
	->get();
	$province=  DB::table('province')
	->orderby('name','asc')
	->where('status','1')
	->get();
	 $title = "";        
	 $data = compact('title');
	 if ( !empty( $request->except('_token') ) ){
	   $request->validate([		 
        'agency_category' => 'required'		
	  ]);
	 if(!empty($request->input('agency_category'))){
	$agency_category = $request->input('agency_category');
	$agency_category = implode(', ', $agency_category);
	}else{
	$agency_category = '';
	}
	
		// $agency_category = $request->input('agency_category');	  
	$provincia = $request->input('provincia');	  
	$zona = $request->input('zona');
	$website = $request->input('website');
	$whatsapp = $request->input('whatsapp');
	$zone = $request->input('zone');
	$population = $request->input('population');
	$founder_year = $request->input('founder_year');
	$banner_link = $request->input('banner_link');
	$mobile = $request->input('mobile');
	$email = $request->input('email');
	$name = $request->input('name');
	$role = $request->input('role');
	$password = $request->input('password');		
	$role = 'Agency';
	$created_at =  date('Y-m-d h:i:s');
	$update_at =  date('Y-m-d h:i:s');
	 // INSERT COMMAND
	 $hash = md5( rand(0,1000) );
	 $site_url_link = url('/')."/agencia/verify/".$hash;
	DB::table('members')	
	->insert(
	[
	'agency_category' =>$agency_category,	
	'provincia' =>$provincia,	
	'zona' =>$zona,	
	'website' =>$website,	
	'whatsapp' =>$whatsapp,	
	'population' =>$population,	
	'founder_year' =>$founder_year,	
	'banner_link' =>$banner_link,	
	'mobile' =>$mobile,	
	'email' =>$email,	
	'role' =>$role,	
	'password' =>md5($password),		
	'name' =>$name,	
	'hash' =>$hash,
	'created_at'=>$created_at,
	'update_at'=>$update_at,
	]
	);
	// insert id 
	$profile_ads_id = DB::getPdo()->lastInsertid();;
        
		// upload profile photo
		$profile = '';
		if($request->hasFile('profile')){
			$image = $request->file('profile');										
		$destinationPath = public_path('/uploads/profile_logo/');
		$profile=$image->getClientOriginalName();
		$profile = time().$profile;           
		$image->move($destinationPath, $profile);
		$image_path= public_path('/uploads/profile_logo/');
		DB::table('members')
		->where('id',$profile_ads_id)
		->update([		
		'upload_logo' => $profile,		
		]);
		}
		//End Photo
		$hostname = getenv('HTTP_HOST');
		if($hostname=="localhost:7777"){
			
		}else{
			
			Mail::send('front.emails.register_agencia',
			     $user=array(
				 'email' => $email,
				 'site_url_link' => $site_url_link,
				 ), function($message) use ($user,$email){
			   $message->from('escortlisting@escortlisting.localjoy.website');
			   $message->to($email, 'Escort')->subject('Thanks For Register On Escort');
		   }); 
		}
		Session::flash('message', 'Profile create Successfully'); 
		Session::flash('alert-class', 'alert-success');	
		return redirect('/agencia/email-verify'); 
	 }else{
	 return view('front.agency.register_agencia',['categories'=>$categories,'province'=>$province],$data); 
	 }
	 
	}
	
	
		public function profile_agencia(Request $request){     
	$agency_id= $request->session()->get('agency_id');
	 $agencies=  DB::table('members')->where(['id' =>$agency_id])->first();
	$categories=  DB::table('categories')
	//->orderby('name','asc')
	->where('status','1')
	->get();
	$province=  DB::table('province')
	->orderby('name','asc')
	->where('status','1')
	->get();
	 $title = "";        
	 $data = compact('title');
	 if ( !empty( $request->except('_token') ) ){
		// $agency_category = $request->input('agency_category');	  
	$provincia = $request->input('provincia');	  
	$zona = $request->input('zona');
	$website = $request->input('website');
	$whatsapp = $request->input('whatsapp');
	$zone = $request->input('zone');
	$population = $request->input('population');
	$founder_year = $request->input('founder_year');
	$banner_link = $request->input('banner_link');
	//$mobile = $request->input('mobile');
	$email = $request->input('email');
	$name = $request->input('name');
	//$role = $request->input('role');
	//$password = $request->input('password');		
	$role = 'Agency';
	$created_at =  date('Y-m-d h:i:s');
	$update_at =  date('Y-m-d h:i:s');
	 // INSERT COMMAND
	 
	DB::table('members')
	->where('id',$agency_id)
	->update(
	[
	//'agency_category' =>$agency_category,	
	'provincia' =>$provincia,	
	'zona' =>$zona,	
	'website' =>$website,	
	'whatsapp' =>$whatsapp,	
	'population' =>$population,	
	'founder_year' =>$founder_year,	
	'banner_link' =>$banner_link,	
	//'mobile' =>$mobile,	
	'email' =>$email,	
	//'role' =>$role,	
	//'password' =>md5($password),		
	'name' =>$name,	
	//'hash' =>$hash,
	//'created_at'=>$created_at,
	'update_at'=>$update_at,
	]
	);
	// insert id 
		
        
		// upload profile photo
		$profile = '';
		if($request->hasFile('profile')){
		$image = $request->file('profile');
		if(!empty($agencies->upload_logo)){
			 $file_path=  public_path('/uploads/profile_logo/'.$agencies->upload_logo);
			 unlink($file_path);
			}
		$destinationPath = public_path('/uploads/profile_logo/');
		$profile=$image->getClientOriginalName();
		$profile = time().$profile;           
		$image->move($destinationPath, $profile);
		$image_path= public_path('/uploads/profile_logo/');
		DB::table('members')
		->where('id',$agency_id)
		->update([		
		'upload_logo' => $profile,		
		]);
		}
		//End Photo
		
		Session::flash('message', 'Profile Update Successfully'); 
		Session::flash('alert-class', 'alert-success');	
		return redirect('/agencia/control');
	 }else{
	$population = DB::table('population')
	->where('province_id', '=', $agencies->provincia)		
	->get();
	 return view('front.agency.profile_agencia',['agencies'=>$agencies,'categories'=>$categories,'province'=>$province,'population'=>$population],$data); 
	 }
	 
	}
	
	public function email_verify() {        
	 $title = "Email Verify";        
	 $data = compact('title');			
	 return view('front.agency.email_verify',$data); 
	}
	
	public function verify(Request $request,$hash){	
	$title = "Agencia Email Verify";       
	$data = compact('title');
	$members=  DB::table('members')->where(['hash' =>$hash])->count();
	
	if($members>0){	
		$get_members=  DB::table('members')->where(['hash' =>$hash])->first();
		DB::table('members')
		->where(['id' =>$get_members->id])
		->update([
		'is_email' =>1		
		]);	
		Session::flash('message', 'Account not found!'); 
		Session::flash('alert-class', 'alert-success');
		return redirect('/'); 
	}else{		
		Session::flash('message', 'Account not found!'); 
		Session::flash('alert-class', 'alert-danger');		
		return redirect('/'); 
	}	
	
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
		->first();		
        if(!empty($get_user)){        
			$hash = md5( rand(0,1000) );
			$site_url_link = url('/')."/agencia/reset-password/".$hash;		
			DB::table('members')
			->where(['email' =>$email])
			->update([
			'hash' =>$hash,			
			]);
			$hostname = getenv('HTTP_HOST');
			if($hostname=="localhost:7777"){
			}else{
			Mail::send('front.emails.password_lost_agencia',
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
	   
		return view('front.agency.password_lost',$data); 
	
	}
	
	public function update_password(Request $request,$hash){     
	
	$title = "Agency  Reset password";       
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
			$hash = md5( rand(0,1000) );
			DB::table('members')
			->where(['id' =>$members->id])
			->update([
			'password' =>md5($password),	
			'hash' =>$hash		
			]);
			Session::flash('message', 'Your account password successfully updated'); 
			Session::flash('alert-class', 'alert-success');					
			return redirect('agencia-login'); 		
		}
	
	}else{		
		Session::flash('message', 'Your reset password token has expired'); 
		Session::flash('alert-class', 'alert-danger');
		return redirect('agencia-login'); 
	}	
	
	
	return view('front.agency.update_password',['hash'=>$hash],$data); 
	}
	
	// publish
	public function control(Request $request) {        
		$title = "Control";        
		$data = compact('title');
		$agency_id= $request->session()->get('agency_id');
		$agency=  DB::table('members')
		->where(['id' =>$agency_id])
		->first();
		
		return view('front.agency.control',['agency'=>$agency],$data); 
	}
	
	
	// create_add
	public function create_add(Request $request) {        
		$title = "Create Ad";        
		$data = compact('title');
		$agency_id= $request->session()->get('agency_id');
		/* $agency=  DB::table('members')
		->where(['id' =>$agency_id])
		->first(); */
		
		return view('front.agency.create_add',['agency_id'=>$agency_id],$data); 
	}
	
	

	public function profile(Request $request){
	
	$user_id= $request->session()->get('agency_id');	
	
		
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
	
		if ( !empty( $request->except('_token') ) ){	
	$location = $request->input('location');
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
	$role = 'Agency';
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
		if($location=='continue'){
		return redirect('/agencia/create-add');
		}else{
		return redirect('/agencia/anuncios-activos');
		}
		 
		
		}else{
			return view('front.agency.profile',[
			'categories'=>$categories,
			'over_you'=>$over_you,
			'province'=>$province,		
			'countries'=>$countries,
			'services'=>$services,			
			'title'=>$title]);	
		}
	

	}
	
	public function profile_edit(Request $request, $id, $location){	
	$user_id= $request->session()->get('agency_id');	
	
	$profile_ads =  DB::table('profile_ads')
	->where('member_id',$user_id)	
	->where('id',$id)	
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
		// END schedule
				
		Session::flash('message', 'Profile Update Successfully'); 
		Session::flash('alert-class', 'alert-success');	
		return redirect('/agencia/'.$location.''); 
	}
		
		$population = DB::table('population')
		->where('province_id', '=', $profile_ads->province)		
		->get();
		return view('front.agency.profile_edit',[
		'profile_ads'=>$profile_ads,
		'population'=>$population,
		'categories'=>$categories,
		'over_you'=>$over_you,
		'province'=>$province,		
		'countries'=>$countries,
		'services'=>$services,
		'profile_ads'=>$profile_ads,
		'location'=>$location,
		'title'=>$title,
		]);

	}
	
	// @ delete records function
		public function delete(Request $request, $id, $location){
		//$categories = Categories::where('id', $id)->first();
		//Categories::where('id', $id)->delete();
		$agency_id= $request->session()->get('agency_id');
		$profile_ads =  DB::table('profile_ads')
		->where('member_id',$agency_id)	
		->where('id',$id)	
		->delete();
		Session::flash('message', 'Profile Successfully deleted!');
		Session::flash('alert-class', 'alert-info'); 
		return redirect('/agencia/'.$location.''); 

		}
		
		
	// @ status records function
		public function status(Request $request, $id, $location){		
		$agency_id= $request->session()->get('agency_id');
		$profile_ads =  DB::table('profile_ads')
		->where('member_id',$agency_id)	
		->where('id',$id)
		->select('user_status')
		->first();
		if($profile_ads->user_status==1){
			$status = 0;
		}else{
			$status = 1;
		}
		DB::table('profile_ads')
		->where('member_id',$agency_id)	
		->where('id',$id)	
		->update(['user_status'=>$status]);
		Session::flash('message', 'Profile Status Changed');
		Session::flash('alert-class', 'alert-info'); 
		return redirect('/agencia/'.$location.''); 

		}
	
	public function faq() {        
	 $title = "";        
	 $data = compact('title');			
	 return view('front.agency.faq',$data); 
	}
	
	public function contrasena(Request $request){     
	$agency_id= $request->session()->get('agency_id');
	$title = "Agency  Change password";       
	$data = compact('title');
	$members=  DB::table('members')->where(['id' =>$agency_id])->count();
	
	if($members>0){
		$members_password=  DB::table('members')->select('password')->where(['id' =>$agency_id])->first();
		if ( !empty( $request->except('_token') ) ){		
		$validatedData = $request->validate([
		'new_password' => 'required|min:6',	   
		'confirm_password' => 'required|same:new_password'   
		]);
			$password = $request->input('new_password');	  						
			$old_password = $request->input('old_password');
			if(md5($old_password)==($members_password->password)){
			DB::table('members')
			->where(['id' =>$agency_id])
			->update([
			'password' =>md5($password),				
			]);
			Session::flash('message', 'Your account password successfully changed'); 
			Session::flash('alert-class', 'alert-success');					
			return redirect('agencia-login'); 
			}else{
				Session::flash('message', 'The old password does not match our records.'); 
				Session::flash('alert-class', 'alert-danger');
			 }
		}
	
	}else{		
		Session::flash('message', 'Invalid agency id'); 
		Session::flash('alert-class', 'alert-danger');
		return redirect('agencia-login'); 
	}	
	
	
	return view('front.agency.contrasena',$data); 
	}
	
	
		public function contact(Request $request){     
	    $agency_id= $request->session()->get('agency_id');
		$title = "Agency  Contact Us";       
		$data = compact('title');
		if ( !empty( $request->except('_token') ) ){
			$name = $request->input('name');	  						
			$email = $request->input('email');	  						
			$telephone = $request->input('telephone');	  						
			$comments = $request->input('comments');			
			$created_at = date('Y-m-d h:i:s');
			DB::table('agency_contact_enquiry')
			->insert([
				'agency_id' =>$agency_id,				
				'name' =>$name,				
				'email' =>$email,				
				'telephone' =>$telephone,				
				'comments' =>$comments,				
				'created_at' =>$created_at,				
			]);
			Session::flash('message', 'Your contact enquiry sent'); 
			Session::flash('alert-class', 'alert-success');					
			return redirect('/agencia/contact-us'); 
			
		}
		return view('front.agency.contact',$data); 
	}
	
	

	
	public function privacy() {        
	 $title = "";        
	 $data = compact('title');			
	 return view('front.agency.privacy',$data); 
	}
	
		// anuncios_activos
	public function anuncios_activos(Request $request) {        
		$title = "Create Ad";        
		$data = compact('title');
		$agency_id= $request->session()->get('agency_id');
		$profile_ads = DB::table('profile_ads')
			->where('member_id', $agency_id)
			->select('id','first_name','profile_pic','telephone','created_at','status','category')
			->get()
			->all();		
		return view('front.agency.anuncios_activos',['profile_ads'=>$profile_ads],$data); 
	}
	
	
	
	// zona_top
	
	public function zona_top_payment(Request $request){     
	    $agency_id= $request->session()->get('agency_id');
			
		
		if ( !empty( $request->except('_token') ) ){		    
			$number_of_photo = count( $request->input('number_of_photo'));
			$payment_type = $request->input('payment_type');
			$package = $request->input('package');
			$created_at = date('Y-m-d h:i:s');			
			// get price for top zona pakages
			$get_user = DB::table('top_agency_packages')
			->where('advertisements',$number_of_photo)	
			->where('name',$package)	
			->first();
			// 
		
			$profile_ads_id = implode(', ', $request->input('number_of_photo')); 
			$type = 'top';
			$total_price = $get_user->price;
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
			
			// count pakage by end date 
			//1 semana week
			//2 semanas week			
			//1 mes month 
			//3 meses month
			$from_date = date('Y-m-d');
			if($package=='1 semana'){					
			$to_date =  gmdate('Y-m-d',strtotime('+1 week',strtotime($from_date)));			
			}else if($package=='2 semanas'){
			$to_date =  gmdate('Y-m-d',strtotime('+1 weeks',strtotime($from_date)));
			}else if($package=='1 mes'){
			$to_date =  gmdate('Y-m-d',strtotime('+1 month',strtotime($from_date)));
			}else if($package=='1 mes'){
			$to_date =  gmdate('Y-m-d',strtotime('+1 months',strtotime($from_date)));
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
				]);
			}				
			Session::flash('message', 'The escort was successfully added in TOP ANUNCIO'); 
			Session::flash('alert-class', 'alert-success');					
			return redirect('/agencia/control');
			
		}
		
	}
	
		public function zona_top(Request $request){     
	    $agency_id= $request->session()->get('agency_id');
		$agency_category = agency_category(session('agency_id'));
		$categoriesSaved = explode(',',$agency_category); 
		$category = $categoriesSaved[0];
		$profile_ads = DB::table('profile_ads')
			->where('member_id', $agency_id)
			->where('category',$category)
			->select('id','first_name','profile_pic')
			->get()
			->all();	
			
		$title = "Zone Top";          
		$data = compact('title');
		return view('front.agency.zona_top',['profile_ads'=>$profile_ads,'category'=>$category,'id'=>''],$data);  
	}
	
	
	public function zona_top_category(Request $request, $category=null){     
	    $agency_id= $request->session()->get('agency_id');
		
		$profile_ads = DB::table('profile_ads')
			->where('member_id', $agency_id)
			->where('category',$category)
			->select('id','first_name','profile_pic')
			->get()
			->all();	
		$title = "Zone Top";          
		$data = compact('title');
		return view('front.agency.zona_top',['profile_ads'=>$profile_ads,'category'=>$category,'id'=>''],$data);  
	}
	
	public function zona_top_category_id(Request $request, $category=null, $id=null){     
	    $agency_id= $request->session()->get('agency_id');		
		$profile_ads = DB::table('profile_ads')
			->where('member_id', $agency_id)
			->where('category',$category)
			->select('id','first_name','profile_pic')
			->get()
			->all();	
		$title = "Zone Top";          
		$data = compact('title');
		return view('front.agency.zona_top',['profile_ads'=>$profile_ads,'category'=>$category,'id'=>$id],$data);  
	}
	
	// subida_zone	
	public function subida_zone_payment(Request $request){     
	    $agency_id= $request->session()->get('agency_id');
			if ( !empty( $request->except('_token') ) ){	
		
			$number_of_photo = count( $request->input('number_of_photo'));
			$UserSelected = ( $request->input('UserSelected'));
			$payment_type = $request->input('payment_type');			
			$created_at = date('Y-m-d h:i:s');			
			// get price for top zona pakages
			$get_user = DB::table('subida_agency_packages')
			->where('id',$UserSelected)				
			->first();
			// 
		   
			$profile_ads_id = implode(', ', $request->input('number_of_photo')); 
			$type = 'subida';
			$total_price = $get_user->price;
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
			
			foreach($request->input('number_of_photo') as $key=>$data){
				DB::table('top_subida_profile_lists')
				->insert([							
					'order_id' =>$order_id,
					'type' =>$type,	
					'profile_ads_id' =>$data,
					'user_id' =>$agency_id,								
					'from_date' =>$request->input('from_date')[$key],
					'to_date' =>$request->input('to_date')[$key],			
					
				]);
			}			
			Session::flash('message', 'The escort was successfully added in TOP ANUNCIO'); 
			Session::flash('alert-class', 'alert-success');					
			return redirect('/agencia/control');
			
		}
		 
	}
		
	public function subida_zone(Request $request){     
	    $agency_id= $request->session()->get('agency_id');
			$agency_category = agency_category(session('agency_id'));
			$categoriesSaved = explode(',',$agency_category); 
			$category = $categoriesSaved[0];
			$profile_ads = DB::table('profile_ads')
			->where('member_id', $agency_id)
			->select('id','first_name','profile_pic')
			->where('category',$category)
			->get()
			->all();	
		$title = "Subida Top";          
		$data = compact('title');
		return view('front.agency.subida_zone',['profile_ads'=>$profile_ads,'category'=>$category,'id'=>''],$data);  
	}
	
	public function subida_zone_category (Request $request, $category=null){     
	    $agency_id= $request->session()->get('agency_id');		
		$profile_ads = DB::table('profile_ads')
			->where('member_id', $agency_id)
			->where('category',$category)
			->select('id','first_name','profile_pic')
			->get()
			->all();	
		$title = "Subida Top";          
		$data = compact('title');
		return view('front.agency.subida_zone',['profile_ads'=>$profile_ads,'category'=>$category,'id'=>''],$data);  
	}
	
	public function subida_zone_category_id (Request $request, $category=null, $id=null){     
	    $agency_id= $request->session()->get('agency_id');		
		$profile_ads = DB::table('profile_ads')
			->where('member_id', $agency_id)
			->where('category',$category)
			->select('id','first_name','profile_pic')
			->get()
			->all();	
		$title = "Subida Top";          
		$data = compact('title');
		return view('front.agency.subida_zone',['profile_ads'=>$profile_ads,'category'=>$category,'id'=>$id],$data);  
	}
	
	
}
