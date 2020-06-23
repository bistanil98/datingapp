<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Middleware\SuperAdmin;
use App\Model\Province;
use Session;

class PrifilesController extends Controller {
	
	
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


		// @ listing function
		public function index($category){
		$title = $category;   
		$profile = DB::table('profile_ads')		
		->where('category',  'like', '%' .$category. '%')
		->get();
		//$profile = DB::select('select * from profile_ads order by id desc');				
		 return view('admin.profile.index',['profile'=>$profile,'title'=>$title]);

		}

		// @ add records function
		public function add(Request $request){     
	
	/* $user_id= $request->session()->get('user_id');
	$members=  DB::table('members')
	->where(['id' =>$user_id])
	->first(); */
	$user_id = 1;
	$categories=  DB::table('categories')
	->orderby('name','asc')
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
	
	$first_name = $request->input('first_name');	  
	$telephone = $request->input('telephone');	  
	$category = $request->input('category');
	$province = $request->input('province');
	$population = $request->input('population');
	$zone = $request->input('zone');
	$nationality = $request->input('nationality');
	$age = $request->input('age');
	$height = $request->input('height');
	$weight = $request->input('weight');
	$chest = $request->input('chest');
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
	'first_name' =>$first_name,	
	'telephone' =>$telephone,	
	'category' =>$category,	
	'province' =>$province,	
	'population' =>$population,	
	'zone' =>$zone,	
	'nationality' =>$nationality,	
	'age' =>$age,	
	'height' =>$height,	
	'weight' =>$weight,	
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
		$profile = '';
		if($request->hasFile('profile')){
		$image = $request->file('profile');										
		$destinationPath = public_path('/uploads/profile_ads/');
		$profile=$image->getClientOriginalName();
		$profile = time().$profile;           
		$image->move($destinationPath, $profile);
		$image_path= public_path('/uploads/profile_ads/');
		DB::table('profile_ads_files')					
		->insert([
		'profile_ads_id' => $profile_ads_id,
		'upload_file' => $profile,
		'type' => 'profile',					
		]);
		}
		//End Photo
		
		// Tarifas
		foreach($request->input('tariffs_description') as $key=>$data){	
		if(!empty($data)){
			DB::table('profile_tariffs')					
			->insert([
			'profile_ads_id' => $profile_ads_id,
			'tariffs_description' => $data,
			'tariffs_euro_price' => $request->input('tariffs_euro_price')[$key],					
			]);
		}
		
		}
		// END Tarifas
		
		// schedule
		foreach($request->input('days') as $key=>$data){	
			if(!empty($data)){
			DB::table('profile_schedule')					
			->insert([
			'profile_ads_id' => $profile_ads_id,
			'days' => $data,
			'from_1' => $request->input('from_1')[$key],					
			'from_2' => $request->input('from_2')[$key],					
			'unit_1' => $request->input('unit_1')[$key],					
			'unit_2' => $request->input('unit_2')[$key],					
			]);
		}
		
		}
		// END schedule
		
		
		// START profile_ads_files gallery
		if($request->hasfile('gallery')){
			foreach($request->file('gallery') as $key=>$image){		
				if(!empty($image)){
				$destinationPath = public_path('/uploads/profile_ads/');
				$gallery=$image->getClientOriginalName();
				$gallery = time().$gallery;               
				$image->move($destinationPath, $gallery);
				$image_path= public_path('/uploads/profile_ads/');
				DB::table('profile_ads_files')					
				->insert([
				'profile_ads_id' => $profile_ads_id,
				'upload_file' => $gallery,
				'type' => 'gallery',					
				]);
				
			 }		
		  }
		}
		// END profile_ads_files gallery
		
		// START profile_ads_files selfie
		if($request->hasfile('selfie')){
			foreach($request->file('selfie') as $key=>$image){		
				if(!empty($image)){
				$destinationPath = public_path('/uploads/profile_ads/');
				$selfie=$image->getClientOriginalName();
				$selfie = time().$selfie;               
				$image->move($destinationPath, $selfie);
				$image_path= public_path('/uploads/profile_ads/');
				DB::table('profile_ads_files')					
				->insert([
				'profile_ads_id' => $profile_ads_id,
				'upload_file' => $selfie,
				'type' => 'selfie',					
				]);
				
			 }		
		  }
		}
		// END profile_ads_files selfie
		
		// START profile_ads_files videos
		if($request->hasfile('videos')){
			foreach($request->file('videos') as $key=>$image){		
				if(!empty($image)){
				$destinationPath = public_path('/uploads/profile_ads/');
				$videos=$image->getClientOriginalName();
				$videos = time().$videos;               
				$image->move($destinationPath, $videos);
				$image_path= public_path('/uploads/profile_ads/');
				DB::table('profile_ads_files')					
				->insert([
				'profile_ads_id' => $profile_ads_id,
				'upload_file' => $videos,
				'type' => 'videos',					
				]);
				
			 }		
		  }
		}
		// END profile_ads_files videos
				
		Session::flash('message', 'Profile Update Successfully'); 
		Session::flash('alert-class', 'alert-success');	
		return redirect('/admin/profile/index/'.strtolower($category).''); 
	}

		return view('admin.profile.add',[
		'categories'=>$categories,
		'over_you'=>$over_you,
		'province'=>$province,		
		'countries'=>$countries,
		'services'=>$services,
		'title'=>$title]);		
		
	}
	
		
			// @ edit records function
			public function edit(Request $request,$id){
			$profile_ads =  DB::table('profile_ads')
			->where('id',$id)	
			->first();
			$profile_ads_id = $id;
	/* $user_id= $request->session()->get('user_id');
	$members=  DB::table('members')
	->where(['id' =>$user_id])
	->first(); */
	$user_id = 1;
	$categories=  DB::table('categories')
	->orderby('name','asc')
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
	
	$first_name = $request->input('first_name');	  
	$telephone = $request->input('telephone');	  
	$category = $request->input('category');
	$province = $request->input('province');
	$population = $request->input('population');
	$zone = $request->input('zone');
	$nationality = $request->input('nationality');
	$age = $request->input('age');
	$height = $request->input('height');
	$weight = $request->input('weight');
	$chest = $request->input('chest');
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
	->where('id', $id)
	->update(
	[
	'first_name' =>$first_name,	
	'telephone' =>$telephone,	
	'category' =>$category,	
	'province' =>$province,	
	'population' =>$population,	
	'zone' =>$zone,	
	'nationality' =>$nationality,	
	'age' =>$age,	
	'height' =>$height,	
	'weight' =>$weight,	
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
	
	'update_at'=>$update_at,
	]
	);
	// insert id 
	
        
		/* // upload profile photo
		$profile = '';
		if($request->hasFile('profile')){
		$image = $request->file('profile');										
		$destinationPath = public_path('/uploads/profile_ads/');
		$profile=$image->getClientOriginalName();
		$profile = time().$profile;           
		$image->move($destinationPath, $profile);
		$image_path= public_path('/uploads/profile_ads/');
		DB::table('profile_ads_files')					
		->insert([
		'profile_ads_id' => $profile_ads_id,
		'upload_file' => $profile,
		'type' => 'profile',					
		]);
		}
		//End Photo
		
		// Tarifas
		foreach($request->input('tariffs_description') as $key=>$data){	
		if(!empty($data)){
			DB::table('profile_tariffs')					
			->insert([
			'profile_ads_id' => $profile_ads_id,
			'tariffs_description' => $data,
			'tariffs_euro_price' => $request->input('tariffs_euro_price')[$key],					
			]);
		}
		
		}
		// END Tarifas
		
		// schedule
		foreach($request->input('days') as $key=>$data){	
			if(!empty($data)){
			DB::table('profile_schedule')					
			->insert([
			'profile_ads_id' => $profile_ads_id,
			'days' => $data,
			'from_1' => $request->input('from_1')[$key],					
			'from_2' => $request->input('from_2')[$key],					
			'unit_1' => $request->input('unit_1')[$key],					
			'unit_2' => $request->input('unit_2')[$key],					
			]);
		}
		
		}
		// END schedule
		
		
		// START profile_ads_files gallery
		if($request->hasfile('gallery')){
			foreach($request->file('gallery') as $key=>$image){		
				if(!empty($image)){
				$destinationPath = public_path('/uploads/profile_ads/');
				$gallery=$image->getClientOriginalName();
				$gallery = time().$gallery;               
				$image->move($destinationPath, $gallery);
				$image_path= public_path('/uploads/profile_ads/');
				DB::table('profile_ads_files')					
				->insert([
				'profile_ads_id' => $profile_ads_id,
				'upload_file' => $gallery,
				'type' => 'gallery',					
				]);
				
			 }		
		  }
		}
		// END profile_ads_files gallery
		
		// START profile_ads_files selfie
		if($request->hasfile('selfie')){
			foreach($request->file('selfie') as $key=>$image){		
				if(!empty($image)){
				$destinationPath = public_path('/uploads/profile_ads/');
				$selfie=$image->getClientOriginalName();
				$selfie = time().$selfie;               
				$image->move($destinationPath, $selfie);
				$image_path= public_path('/uploads/profile_ads/');
				DB::table('profile_ads_files')					
				->insert([
				'profile_ads_id' => $profile_ads_id,
				'upload_file' => $selfie,
				'type' => 'selfie',					
				]);
				
			 }		
		  }
		}
		// END profile_ads_files selfie
		
		// START profile_ads_files videos
		if($request->hasfile('videos')){
			foreach($request->file('videos') as $key=>$image){		
				if(!empty($image)){
				$destinationPath = public_path('/uploads/profile_ads/');
				$videos=$image->getClientOriginalName();
				$videos = time().$videos;               
				$image->move($destinationPath, $videos);
				$image_path= public_path('/uploads/profile_ads/');
				DB::table('profile_ads_files')					
				->insert([
				'profile_ads_id' => $profile_ads_id,
				'upload_file' => $videos,
				'type' => 'videos',					
				]);
				
			 }		
		  }
		}
		// END profile_ads_files videos */
				
		Session::flash('message', 'Profile Update Successfully'); 
		Session::flash('alert-class', 'alert-success');	
		return redirect('/admin/profile/index/'.strtolower($category).''); 
	}
		$selfie_photo = DB::table('profile_ads_files')
		->where('profile_ads_id', '=', $id)
		->where('type', '=', 'selfie')
		->get()
		->all();
		
		$videos_photo = DB::table('profile_ads_files')
		->where('profile_ads_id', '=', $id)
		->where('type', '=', 'videos')
		->get()
		->all();
		
		$gallery_photo = DB::table('profile_ads_files')
		->where('profile_ads_id', '=', $id)
		->where('type', '=', 'gallery')
		->get()
		->all();
		
		$population = DB::table('population')
		->where('province_id', '=', $profile_ads->province)		
		->get();
		
		$profile_tariffs = DB::table('profile_tariffs')
		->where('profile_ads_id', '=', $id)		
		->get()
		->all();
		
		return view('admin.profile.edit',[
		'profile_tariffs'=>$profile_tariffs,
		'population'=>$population,
		'gallery_photo'=>$gallery_photo,
		'selfie_photo'=>$selfie_photo,
		'videos_photo'=>$videos_photo,
		'profile_ads'=>$profile_ads,
		'categories'=>$categories,
		'over_you'=>$over_you,
		'province'=>$province,		
		'countries'=>$countries,
		'services'=>$services,
		'title'=>$title]);		
		
	}
	
		
		// @ view records function
		public function view($id){
			$profile = DB::table('profile_ads')
			//->leftJoin('subject', 'subject.id', '=', 'application.subject_id')
			//->select('application.*', 'subject.name')			
			->where('profile_ads.id', $id)			
			->first();
			
			$profile_tariffs = DB::table('profile_tariffs')			
			->where('profile_tariffs.profile_ads_id', $id)			
			->get();	
			$profile_ads_files = DB::table('profile_ads_files')			
			->where('profile_ads_files.profile_ads_id', $id)			
			->where('profile_ads_files.type', 'gallery')			
			->orWhere('profile_ads_files.type', 'selfie')			
			->get();
			
			// Get videos
			$profile_ads_files_videos = DB::table('profile_ads_files')			
			->where('profile_ads_files.profile_ads_id', $id)			
			->where('profile_ads_files.type', 'videos')						
			->get();
			
			
			return view('admin.profile.view',['data'=>$profile,'profile_tariffs'=>$profile_tariffs,'profile_ads_files'=>$profile_ads_files,'profile_ads_files_videos'=>$profile_ads_files_videos]);
		}
		
		// @ delete records function
		public function delete($id){
		$province = Province::where('id', $id)->first();
		Province::where('id', $id)->delete();
		Session::flash('message', 'Province Successfully deleted!');
		Session::flash('alert-class', 'alert-info'); 
		return redirect('/admin/province');

		}
	 
 

}