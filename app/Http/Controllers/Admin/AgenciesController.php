<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Middleware\SuperAdmin;
use Session;

class AgenciesController extends Controller {
	
	
	public function __construct()
    {
        $this->middleware(SuperAdmin::class);		
		app('view')->composer('admin.layouts.sidebar', function ($view) {		
        $action = app('request')->route()->getAction();
        $controller = class_basename($action['controller']);
        list($controller, $action) = explode('@', $controller);
        $view->with(compact('controller', 'action'));
    });
    }


	/* 	// @ listing function
		public function index(){
		$title = 'Agencies';   
		$agencies = DB::table('members')		
		->where('role',  'Agency')
		->get();		
		 return view('admin.agencies.index',['agencies'=>$agencies,'title'=>$title]);

		} */
		
			public function index(Request $request){
		
			$title = 'Agencies';   
			$name = $request->get('name');
			$email = $request->get('email');
			$mobile = $request->get('mobile');
			$category = $request->get('category');		
			$provinces = $request->get('province');
			$status = $request->get('status');
			
			$search = DB::table('members');
			$search->where('role',  'Agency');
			
			if (!empty($name)) {					
			$search->where('members.name', 'like','%' .$name. '%');
			}
			
			if (!empty($status)) {	
				if($status=='all'){
				}else if($status=='2'){	
					$search->where('members.status', 0);	
				}else{
					$search->where('members.status', 1);	
					$search->where('members.is_email',  '1');
				}
				
			}else{
				$search->where('members.status', 1);
				
			}

			if (!empty($email)) {					
			$search->where('members.email', 'like','%' .$email. '%');
			}
			
			if ($request->has('pending') && $request->has('pending')==1) {
			$search->where('members.is_email', 0);
			$search->where('members.status', '1');
			}
			if (!empty($category)) {					
				$search->where('members.agency_category', 'like','%' .$category. '%');
			}
			if (!empty($provinces)) {					
				$search->where('members.provincia', 'like','%' .$provinces. '%');
			}
			if (!empty($mobile)) {					
				$search->where('members.mobile', 'like','%' .$mobile. '%');
			}
			$search->orderby('members.id', '=', 'desc');
			$agencies = $search->get();
			
			$categories=  DB::table('categories')
			//->orderby('name','asc')
			->where('status','1')
			->get();
			$province=  DB::table('province')
			//->orderby('name','asc')
			->where('status','1')
			->get();

			return view('admin.agencies.index',['agencies'=>$agencies,'title'=>$title,'categories'=>$categories,'province'=>$province]);

		}
		
		// @ status records function
		public function status($id){	
		// update STATUS
		$members =  DB::table('members')
		->where('id',$id)			
		->select('status')
		->first();
		if($members->status==1){
			$status = 0;
		}else{
			$status = 1;
		}
		DB::table('members')
		->where('id',$id)	
		->update(['status'=>$status]);
		// end  update  STATUS
		
		/* $profile_ads =  DB::table('profile_ads')
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
		->update(['user_status'=>$status]); */
		Session::flash('message', 'Agencies Status Changed');
		Session::flash('alert-class', 'alert-info'); 
		return redirect('/admin/agencies'); 

		}

		// @ add records function

	public function add(Request $request){     
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
		 //$agency_category = $request->input('agency_category');	  
		    $request->validate([		 
        'agency_category' => 'required'		
	  ]);
	 if(!empty($request->input('agency_category'))){
	$agency_category = $request->input('agency_category');
	$agency_category = implode(',', $agency_category);
	}else{
	$agency_category = '';
	}
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
	//'hash' =>$hash,
	'created_at'=>$created_at,
	'update_at'=>$update_at,
	'is_email'=>1,
	'is_mobile'=>1
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
		/* $hostname = getenv('HTTP_HOST');
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
		} */
		Session::flash('message', 'Agency create successfully'); 
		Session::flash('alert-class', 'alert-success');	
		return redirect('/admin/agencies'); 
	 }else{
	 return view('admin.agencies.add',['categories'=>$categories,'province'=>$province],$data); 
	 }
	 
	}
	
	public function edit(Request $request, $id){     
	$categories=  DB::table('categories')
	//->orderby('name','asc')
	->where('status','1')
	->get();
	$province=  DB::table('province')
	->orderby('name','asc')
	->where('status','1')
	->get();
	 $title = "";  
	$agencies =  DB::table('members')
	->where('id',$id)	
	->first();
	$population = DB::table('population')
		->where('province_id', '=', $agencies->provincia)		
		->get();
	 $data = compact('title');
	 if ( !empty( $request->except('_token') ) ){
		 //$agency_category = $request->input('agency_category');	  
		    $request->validate([		 
        'agency_category' => 'required'		
	  ]);
	 if(!empty($request->input('agency_category'))){
	$agency_category = $request->input('agency_category');
	$agency_category = implode(',', $agency_category);
	}else{
	$agency_category = '';
	}
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
	//$password = $request->input('password');		
	$role = 'Agency';
	//$created_at =  date('Y-m-d h:i:s');
	$update_at =  date('Y-m-d h:i:s');
	 // INSERT COMMAND
	 $hash = md5( rand(0,1000) );
	 $site_url_link = url('/')."/agencia/verify/".$hash;
	DB::table('members')	
	->where('id', $id)
	->update(
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
		->where('id',$id)
		->update([		
		'upload_logo' => $profile,		
		]);
		}
		//End Photo
		
		Session::flash('message', 'Agency create successfully'); 
		Session::flash('alert-class', 'alert-success');	
		return redirect('/admin/agencies'); 
	 }else{
	 return view('admin.agencies.edit',['categories'=>$categories,'province'=>$province,'agencies'=>$agencies,'population'=>$population],$data); 
	 }
	 
	}
	
			// @ edit records function

		// @ view records function
		public function view($id){
			$agencies = DB::table('members')
			->where('members.id', $id)			
			->first();
			
			
			// ads
		$search = DB::table('profile_ads');		
		$search->select('profile_ads.*', 'members.email');
		$search->leftJoin('members', 'members.id', '=', 'profile_ads.member_id');
		
		$search->where('profile_ads.member_id',  $id);
		$search->orderby('profile_ads.member_id', '=', 'desc');
		$profile = $search->get();
		
			return view('admin.agencies.view',['profile'=>$profile,'agencies'=>$agencies]);
		}
		
		// @ delete records function
		public function delete($id){
		$agencies = DB::table('members')			
		->where('members.id', $id)			
		->first();
		if(!empty($agencies->upload_logo)){
		$file_path=  public_path('/uploads/profile_logo/'.$agencies->upload_logo);
			unlink($file_path);
		}
		$profile = DB::table('profile_ads')			
		->where('profile_ads.member_id', $id)->count();
		if($profile>0){
		 $ads = DB::table('profile_ads')			 
		->where('profile_ads.member_id', $id)
		->get();
		
		foreach($ads as $data){		
			DB::table('visualizaciones')			
	->where('profile_id', $data->id)
		->delete();
		DB::table('favoritos')
			->where('profile_id', $data->id)
			->delete();
		DB::table('schedule')			
		->where('profile_ads_id', $data->id)			
		->delete();
		
		DB::table('tariffs')			
		->where('profile_id', $data->id)			
		->delete();
		
		DB::table('piesepuerto')			
		->where('profile_ads_id', $data->id)			
		->delete();
			
			if(!empty($data->profile_pic) && file_exists( public_path().'/uploads/profile_ads/'.$data->profile_pic)){
				$file_path=  public_path('/uploads/profile_ads/'.$data->profile_pic);
				unlink($file_path);
			}
			if(!empty($data->gallery_1) && file_exists( public_path().'/uploads/profile_ads/'.$data->gallery_1)){
				$file_path=  public_path('/uploads/profile_ads/'.$data->gallery_1);
				unlink($file_path);
			}
			if(!empty($data->gallery_2) && file_exists( public_path().'/uploads/profile_ads/'.$data->gallery_2)){
				$file_path=  public_path('/uploads/profile_ads/'.$data->gallery_2);
				unlink($file_path);
			}
			if(!empty($data->gallery_3) && file_exists( public_path().'/uploads/profile_ads/'.$data->gallery_3)){
				$file_path=  public_path('/uploads/profile_ads/'.$data->gallery_3);
				unlink($file_path);
			}
			if(!empty($data->gallery_4) && file_exists( public_path().'/uploads/profile_ads/'.$data->gallery_4)){
				$file_path=  public_path('/uploads/profile_ads/'.$data->gallery_4);
				unlink($file_path);
			}
			if(!empty($data->gallery_5) && file_exists( public_path().'/uploads/profile_ads/'.$data->gallery_5)){
				$file_path=  public_path('/uploads/profile_ads/'.$data->gallery_5);
				unlink($file_path);
			}
			if(!empty($data->gallery_6) && file_exists( public_path().'/uploads/profile_ads/'.$data->gallery_6)){
				$file_path=  public_path('/uploads/profile_ads/'.$data->gallery_6);
				unlink($file_path);
			}
			if(!empty($data->gallery_7) && file_exists( public_path().'/uploads/profile_ads/'.$data->gallery_7)){
				$file_path=  public_path('/uploads/profile_ads/'.$data->gallery_7);
				unlink($file_path);
			}
			if(!empty($data->gallery_8) && file_exists( public_path().'/uploads/profile_ads/'.$data->gallery_8)){
				$file_path=  public_path('/uploads/profile_ads/'.$data->gallery_8);
				unlink($file_path);
			}
			if(!empty($data->selfie_1) && file_exists( public_path().'/uploads/profile_ads/'.$data->selfie_1)){
				$file_path=  public_path('/uploads/profile_ads/'.$data->selfie_1);
				unlink($file_path);
			}
			if(!empty($data->selfie_2) && file_exists( public_path().'/uploads/profile_ads/'.$data->selfie_2)){
				$file_path=  public_path('/uploads/profile_ads/'.$data->selfie_2);
				unlink($file_path);
			}
			if(!empty($data->selfie_3) && file_exists( public_path().'/uploads/profile_ads/'.$data->selfie_3)){
				$file_path=  public_path('/uploads/profile_ads/'.$data->selfie_3);
				unlink($file_path);
			}
			if(!empty($data->selfie_4) && file_exists( public_path().'/uploads/profile_ads/'.$data->selfie_4)){
				$file_path=  public_path('/uploads/profile_ads/'.$data->selfie_4);
				unlink($file_path);
			}
			if(!empty($data->video_1) && file_exists( public_path().'/uploads/profile_ads/'.$data->video_1)){
				$file_path=  public_path('/uploads/profile_ads/'.$data->video_1);
				unlink($file_path);
			}
			if(!empty($data->video_2) && file_exists( public_path().'/uploads/profile_ads/'.$data->video_2)){
				$file_path=  public_path('/uploads/profile_ads/'.$data->video_2);
				unlink($file_path);
			}
			if(!empty($data->video_3) && file_exists( public_path().'/uploads/profile_ads/'.$data->video_3)){
				$file_path=  public_path('/uploads/profile_ads/'.$data->video_3);
				unlink($file_path);
			}
			if(!empty($data->video_4) && file_exists( public_path().'/uploads/profile_ads/'.$data->video_4)){
				$file_path=  public_path('/uploads/profile_ads/'.$data->video_4);
				unlink($file_path);
			}
			
			
			 DB::table('profile_ads')			
			->where('profile_ads.id', $data->id)			
			->delete(); 
			DB::table('subida_ads_seen_history')			
		->where('subida_ads_seen_history.ads_id', $data->id)			
		->delete();	
		}
		
		
		DB::table('top_subida_profile_lists')			
		->where('top_subida_profile_lists.user_id', $id)			
		->delete();	
		
		DB::table('top_subida_booking_packages')			
		->where('top_subida_booking_packages.user_id', $id)			
		->delete();	
		
			
		}
		DB::table('members')			
		->where('members.id', $id)			
		->delete();		
		 $created_at =  date('Y-m-d h:i:s');
		DB::table('member_signup_delete_history')	
		->insert([
		'type' =>'delete',		
		'created_at'=>$created_at,	
		]);
		Session::flash('message', 'Agency Successfully deleted!');
		Session::flash('alert-class', 'alert-info'); 
		return redirect('/admin/agencies');

		}
	 
 

}