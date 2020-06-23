<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use DB;
use Mail;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Middleware\SuperAdmin;
use App\Model\Province;
use Session;

class ProfilesController extends Controller {
	
	
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
		public function index(Request $request,$category){
		
		if($category=='selfies'){
			$title = 'Ads with Selfies';   			
		}else if($category=='blocked'){
		$title = 'Blocked Ads';   			
		}else if($category=='free'){
		$title = 'Free Ads';   	
		}else{
			$title = $category;
		}
		
		$provinceData=  DB::table('province')
			//->orderby('name','asc')
			->where('status','1')
			->get();
		$name = $request->get('name');
		$province = $request->get('province');
		
		$mobile = $request->get('mobile');
		$categoriesFilter = $request->get('category');
		
		$categories =  DB::table('categories')
		//->orderby('name','asc')
		->where('status','1')
		->get();
		//$profile = DB::table('profile_ads')
		$search = DB::table('profile_ads');
		
		$search->select('profile_ads.*', 'members.email', 'members.is_email');
		$search->leftJoin('members', 'members.id', '=', 'profile_ads.member_id');
		if($category=='blocked'){
		$search->where('profile_ads.status',  '0');
		if (!empty($categoriesFilter)) {					
			$search->where('profile_ads.category', 'like','%' .$categoriesFilter. '%');
		}
		}else if($category=='selfies'){			
			$search->where('profile_ads.status',  '1');
			if (!empty($categoriesFilter)) {					
				$search->where('profile_ads.category', 'like','%' .$categoriesFilter. '%');
			}
			$search->whereNotNull('selfie_1');
		}else if($category=='free'){
			if (!empty($categoriesFilter)) {					
				$search->where('profile_ads.category', 'like','%' .$categoriesFilter. '%');
			}
			
		$AutoSubidasEscortsIDS = DB::table('top_subida_profile_lists')
		->select('top_subida_profile_lists.profile_ads_id')
		->join('profile_ads', 'profile_ads.id', '=', 'top_subida_profile_lists.profile_ads_id')		
		->where('profile_ads.category',  $categoriesFilter)
		->groupBy('top_subida_profile_lists.profile_ads_id')
		->get();
		
		$AutoSubidasEscortsIDSListStore = [];
		foreach ($AutoSubidasEscortsIDS as $AutoSubidasEscortsIDSList)
		{
		$AutoSubidasEscortsIDSListStore[] = $AutoSubidasEscortsIDSList->profile_ads_id;
		}
			$search->whereNotIn('profile_ads.id',   $AutoSubidasEscortsIDSListStore);
		}else{
			$search->where('profile_ads.category',  'like', '%' .$category. '%');
				$search->where('profile_ads.status',  '1');		
			}
		if (!empty($name)) {					
		$search->where('profile_ads.first_name', 'like','%' .$name. '%');
		}

		if (!empty($province)) {					
		$search->where('profile_ads.province', 'like','%' .$province. '%');
		}

		if (!empty($mobile)) {					
		$search->where('profile_ads.telephone', 'like','%' .$mobile. '%');
		}	
		
		if (!empty($role)) {					
		$search->where('profile_ads.role', 'like','%' .$role. '%');
		}
		$search->where('profile_ads.role',  'like', '%Individual%');
		if ($request->has('email') ) {					
		$search->where('members.email', 'like','%' .$request->get('email'). '%');
		}
		$search->orderby('profile_ads.id', '=', 'desc');
		
		$profile = $search->get();
		//$profile = $search->paginate(20);
		
		
		//$profile = DB::select('select * from profile_ads order by id desc');				
		 return view('admin.profile.index',['profile'=>$profile,'title'=>$title,'category'=>$category,'categories'=>$categories,'province'=>$provinceData]);

		}

		// @ status records function
		
		public function status($id,$category){	
		// update STATUS
		$profile_ads =  DB::table('profile_ads')
		->where('id',$id)			
		->select('status')
		->first();
		if($profile_ads->status==1){
			DB::table('favoritos')
			->where('profile_id', $id)
			->delete();
			$status = 0;
		}else{
			$status = 1;
		}
		DB::table('profile_ads')
		->where('id',$id)	
		->update(['status'=>$status]);
		
		Session::flash('message', 'Ads Status Changed');
		Session::flash('alert-class', 'alert-info'); 
		return redirect('/admin/profile/index/'.$category.'');

		}

		
		// @ add records function
		public function add(Request $request,$category){     
	
	/* $user_id= $request->session()->get('user_id');
	$members=  DB::table('members')
	->where(['id' =>$user_id])
	->first(); */
	$user_id = 1;
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
	$email = $request->input('email');
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
	
	$created_at =  date('Y-m-d h:i:s');
	$update_at =  date('Y-m-d h:i:s');
	
	// new user create
	 $hash = md5( rand(0,1000) );
	 $site_url_link = url('/')."/members/update-password/".$hash;
	 $created_at = date('Y-m-d h:i:s');
	  DB::table('members')
	  ->insert([  
	  'email' =>$email,
	  'hash' =>$hash,
	  'created_at'=>$created_at,
	  'update_at'=>$created_at
	  ]
      );	
	
		$hostname = getenv('HTTP_HOST');
		if($hostname=="localhost:7777"){
			
		}else{
			
			Mail::send('front.emails.register',
			     $user=array(
				 'email' => $email,
				 'site_url_link' => $site_url_link,
				 ), function($message) use ($user,$email){
			   $message->from('escortlisting@escortlisting.localjoy.website');
			   $message->to($email, 'Escort')->subject('Thanks For Register On Escort');
		   }); 
		}
	$member_id = DB::getPdo()->lastInsertid();;
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
			// start thumb
			/* $destinationPathThumb = public_path().'/uploads/profile_ads/thumb';
			$img = Image::make($image->getRealPath(),array('width' => 228,'height' => 342,'grayscale' => false));
			$img->save($destinationPathThumb.'/'.$profile); */
			// end thumb	
			$image->move($destinationPath, $profile);
			// core php jpg
			watermark($profile);	
			// core php jpg
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
				// core php jpg
				watermark($pic1);	
				// core php jpg
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
			// core php jpg
			watermark($pic2);	
			// core php jpg

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
			// core php jpg
			watermark($pic3);	
			// core php jpg
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
			// core php jpg
			watermark($pic4);	
			// core php jpg
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
			// core php jpg
			watermark($pic5);	
			// core php jpg
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
			// core php jpg
			watermark($pic6);	
			// core php jpg
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
			// core php jpg
			watermark($pic7);	
			// core php jpg
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
			// core php jpg
			watermark($pic8);	
			// core php jpg
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
			// core php jpg
			watermark($selfie1);	
			// core php jpg
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
				// core php jpg
			watermark($selfie2);	
			// core php jpg
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
				// core php jpg
			watermark($selfie3);	
			// core php jpg
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
				// core php jpg
			watermark($selfie4);	
			// core php jpg
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
		/* if(!empty($tariffs)){
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
		// END schedule */
		
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
		$tariffscount = 0; 
		foreach($tariffs as $tariffsData){
			DB::table('tariffs')			
			->insert([		
			'profile_id' => $profile_ads_id,		
			'tariffs_description' => $tariffsData['tariffs_description'],		
			'tariffs_euro_price' => $tariffsData['tariffs_euro_price']
			]);
			if($tariffscount==0){
			DB::table('profile_ads')
			->where('profile_ads.id', $profile_ads_id)
			->update([
				'tariffs' => $tariffsData['tariffs_euro_price'],		
			]); 
			}
			$tariffscount++;
		}
		/* $tariffsJSON = json_encode($tariffs);
		   DB::table('profile_ads')
			->where('profile_ads.id', $profile_ads_id)
			->update([
			
			'tariffs' => $tariffsJSON,		
			]); */
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
		foreach($schedule as $scheduleData){
			DB::table('schedule')			
			->insert([		
			'profile_ads_id' => $profile_ads_id,		
			'days' => $scheduleData['days'],		
			'from_1' => $scheduleData['from_1'],		
			'from_2' => $scheduleData['from_2'],	
			'unit_1' => $scheduleData['unit_1'],
			'unit_2' => $scheduleData['unit_2'],
			]);
		}
		/* $scheduleJSON = json_encode($schedule);
		   DB::table('profile_ads')
			->where('profile_ads.id', $profile_ads_id)
			->update([
			
			'schedule' => $scheduleJSON,		
			]); */
		}
				
		Session::flash('message', 'Actualización de perfil exitosa'); 
		Session::flash('alert-class', 'alert-success');	
		return redirect('/admin/profile/index/'.strtolower($category).''); 
	}

		return view('admin.profile.add',[
		'categories'=>$categories,
		'over_you'=>$over_you,
		'province'=>$province,		
		'countries'=>$countries,
		'services'=>$services,
		'title'=>$title,
		'category'=>$category
		]);		
		
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
	//$user_id = 1;
	$categories=  DB::table('categories')
	//->orderby('name','asc')
	->where('status','1')
	->get();
		$over_you=  DB::table('over_you')
	->whereRaw("find_in_set('$profile_ads->category',category)")
	->orderby('name','asc')
	->where('status','1')
	->get();
	
	$services=  DB::table('services')
	->whereRaw("find_in_set('$profile_ads->category',category)")
	->orderby('name','asc')
	->where('status','1')
	->get();
	
	$countries=  DB::table('countries')->select('nationality')->get();
	$province=  DB::table('province')
	->orderby('name','asc')
	->where('status','1')
	->get();   
	$title = "Edit Profile";
	
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
	//$role = 'Individual';
	//$member_id = $user_id;
	$created_at =  date('Y-m-d h:i:s');
	$update_at =  date('Y-m-d h:i:s');
	
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
	///'role'=>$role,
	//'member_id'=>$member_id,	
	//'created_at'=>$created_at,
	'update_at'=>$update_at,
	]
	);
	
       
		// upload profile photo		
		if($request->hasFile('profile')){
			$image = $request->file('profile');
			if(!empty($profile_ads->profile_pic) && file_exists( public_path().'/uploads/profile_ads/'.$profile_ads->profile_pic)){
			 $file_path=  public_path('/uploads/profile_ads/'.$profile_ads->profile_pic);
			 $file_path_thumb=  public_path('/uploads/profile_ads/thumb/'.$profile_ads->profile_pic);
			 unlink($file_path);
			// unlink($file_path_thumb);
			}
			$destinationPath = public_path('/uploads/profile_ads/');
			$profile=$image->getClientOriginalName();
			$profile = time().$profile;  
			// start thumb
		/* 	$destinationPathThumb = public_path().'/uploads/profile_ads/thumb';
			$img = Image::make($image->getRealPath(),array('width' => 300,'height' => 400,'grayscale' => false));
			$img->save($destinationPathThumb.'/'.$profile); */
			// end thumb	
			$image->move($destinationPath, $profile);
			// core php jpg
			watermark($profile);	
			// core php jpg
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
			if(!empty($profile_ads->gallery_1) && file_exists( public_path().'/uploads/profile_ads/'.$profile_ads->gallery_1)){
			 $file_path=  public_path('/uploads/profile_ads/'.$profile_ads->gallery_1);
			 unlink($file_path);
			}
			$destinationPath = public_path('/uploads/profile_ads/');
			$pic1=$image->getClientOriginalName();
			$pic1 = time().$pic1;           
			$image->move($destinationPath, $pic1);
				// core php jpg
				watermark($pic1);	
				// core php jpg
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
			if(!empty($profile_ads->gallery_2) && file_exists( public_path().'/uploads/profile_ads/'.$profile_ads->gallery_2)){
			 $file_path=  public_path('/uploads/profile_ads/'.$profile_ads->gallery_2);
			 unlink($file_path);
			}
			$destinationPath = public_path('/uploads/profile_ads/');
			$pic2=$image->getClientOriginalName();
			$pic2 = time().$pic2;           
			$image->move($destinationPath, $pic2);
			// core php jpg
			watermark($pic2);	
			// core php jpg
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
		if(!empty($profile_ads->gallery_3) && file_exists( public_path().'/uploads/profile_ads/'.$profile_ads->gallery_3)){
			 $file_path=  public_path('/uploads/profile_ads/'.$profile_ads->gallery_3);
			 unlink($file_path);
			}
			$destinationPath = public_path('/uploads/profile_ads/');
			$pic3=$image->getClientOriginalName();
			$pic3 = time().$pic3;           
			$image->move($destinationPath, $pic3);
						// core php jpg
			watermark($pic3);	
			// core php jpg

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
		if(!empty($profile_ads->gallery_4) && file_exists( public_path().'/uploads/profile_ads/'.$profile_ads->gallery_4)){
			 $file_path=  public_path('/uploads/profile_ads/'.$profile_ads->gallery_4);
			 unlink($file_path);
			}
			$destinationPath = public_path('/uploads/profile_ads/');
			$pic4=$image->getClientOriginalName();
			$pic4 = time().$pic4;           
			$image->move($destinationPath, $pic4);
						// core php jpg
			watermark($pic4);	
			// core php jpg

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
			if(!empty($profile_ads->gallery_5) && file_exists( public_path().'/uploads/profile_ads/'.$profile_ads->gallery_5)){
			 $file_path=  public_path('/uploads/profile_ads/'.$profile_ads->gallery_5);
			 unlink($file_path);
			}
			$destinationPath = public_path('/uploads/profile_ads/');
			$pic5=$image->getClientOriginalName();
			$pic5 = time().$pic5;           
			$image->move($destinationPath, $pic5);
						// core php jpg
			watermark($pic5);	
			// core php jpg

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
			if(!empty($profile_ads->gallery_6) && file_exists( public_path().'/uploads/profile_ads/'.$profile_ads->gallery_6)){
			 $file_path=  public_path('/uploads/profile_ads/'.$profile_ads->gallery_6);
			 unlink($file_path);
			}
			$destinationPath = public_path('/uploads/profile_ads/');
			$pic6=$image->getClientOriginalName();
			$pic6 = time().$pic6;           
			$image->move($destinationPath, $pic6);
					// core php jpg
			watermark($pic6);	
			// core php jpg

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
			if(!empty($profile_ads->gallery_7) && file_exists( public_path().'/uploads/profile_ads/'.$profile_ads->gallery_7)){
			 $file_path=  public_path('/uploads/profile_ads/'.$profile_ads->gallery_7);
			 unlink($file_path);
			}
			$destinationPath = public_path('/uploads/profile_ads/');
			$pic7=$image->getClientOriginalName();
			$pic7 = time().$pic7;           
			$image->move($destinationPath, $pic7);
						// core php jpg
			watermark($pic7);	
			// core php jpg

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
			if(!empty($profile_ads->gallery_8) && file_exists( public_path().'/uploads/profile_ads/'.$profile_ads->gallery_8)){
			 $file_path=  public_path('/uploads/profile_ads/'.$profile_ads->gallery_8);
			 unlink($file_path);
			}
			$destinationPath = public_path('/uploads/profile_ads/');
			$pic8=$image->getClientOriginalName();
			$pic8 = time().$pic8;           
			$image->move($destinationPath, $pic8);
						// core php jpg
			watermark($pic8);	
			// core php jpg

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
		if(!empty($profile_ads->selfie_1) && file_exists( public_path().'/uploads/profile_ads/'.$profile_ads->selfie_1)){
			 $file_path=  public_path('/uploads/profile_ads/'.$profile_ads->selfie_1);
			 unlink($file_path);
			}
			$destinationPath = public_path('/uploads/profile_ads/');
			$selfie1=$image->getClientOriginalName();
			$selfie1 = time().$selfie1;           
			$image->move($destinationPath, $selfie1);
						// core php jpg
			watermark($selfie1);	
			// core php jpg

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
			if(!empty($profile_ads->selfie_2) && file_exists( public_path().'/uploads/profile_ads/'.$profile_ads->selfie_2)){
			 $file_path=  public_path('/uploads/profile_ads/'.$profile_ads->selfie_2);
			 unlink($file_path);
			}
			$destinationPath = public_path('/uploads/profile_ads/');
			$selfie2=$image->getClientOriginalName();
			$selfie2 = time().$selfie2;           
			$image->move($destinationPath, $selfie2);
						// core php jpg
			watermark($selfie2);	
			// core php jpg

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
			if(!empty($profile_ads->selfie_3) && file_exists( public_path().'/uploads/profile_ads/'.$profile_ads->selfie_3)){
			 $file_path=  public_path('/uploads/profile_ads/'.$profile_ads->selfie_3);
			 unlink($file_path);
			}
			$destinationPath = public_path('/uploads/profile_ads/');
			$selfie3=$image->getClientOriginalName();
			$selfie3 = time().$selfie3;           
			$image->move($destinationPath, $selfie3);
						// core php jpg
			watermark($selfie3);	
			// core php jpg

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
			if(!empty($profile_ads->selfie_4) && file_exists( public_path().'/uploads/profile_ads/'.$profile_ads->selfie_4)){
			 $file_path=  public_path('/uploads/profile_ads/'.$profile_ads->selfie_4);
			 unlink($file_path);
			}
			$destinationPath = public_path('/uploads/profile_ads/');
			$selfie4=$image->getClientOriginalName();
			$selfie4 = time().$selfie4;           
			$image->move($destinationPath, $selfie4);
						// core php jpg
			watermark($selfie4);	
			// core php jpg

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
		
		
		/* // Tarifas
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
		// END schedule */
		
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
		DB::table('tariffs')->where('profile_id', $profile_ads_id)->delete();
		$tariffscount = 0; 
		foreach($tariffs as $tariffsData){
			DB::table('tariffs')			
			->insert([		
			'profile_id' => $profile_ads_id,		
			'tariffs_description' => $tariffsData['tariffs_description'],		
			'tariffs_euro_price' => $tariffsData['tariffs_euro_price']
			]);
			if($tariffscount==0){
			DB::table('profile_ads')
			->where('profile_ads.id', $profile_ads_id)
			->update([
				'tariffs' => $tariffsData['tariffs_euro_price'],		
			]); 
			}
			$tariffscount++;
		}
		/* $tariffsJSON = json_encode($tariffs);
		   DB::table('profile_ads')
			->where('profile_ads.id', $profile_ads_id)
			->update([
			
			'tariffs' => $tariffsJSON,		
			]); */
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
		DB::table('schedule')->where('profile_ads_id', $profile_ads_id)->delete();
		foreach($schedule as $scheduleData){
			DB::table('schedule')			
			->insert([
			'profile_ads_id' => $profile_ads_id,		
			'days' => $scheduleData['days'],		
			'from_1' => $scheduleData['from_1'],		
			'from_2' => $scheduleData['from_2'],	
			'unit_1' => $scheduleData['unit_1'],
			'unit_2' => $scheduleData['unit_2'],
			]);
		}
		/* $scheduleJSON = json_encode($schedule);
		   DB::table('profile_ads')
			->where('profile_ads.id', $profile_ads_id)
			->update([
			
			'schedule' => $scheduleJSON,		
			]); */
		}
				
		Session::flash('message', 'Actualización de perfil exitosa'); 
		Session::flash('alert-class', 'alert-success');	
		return redirect('/admin/profile/index/'.strtolower($category).''); 
	}
		
		$population = DB::table('population')
		->where('province_id', '=', $profile_ads->province)		
		->get();
		return view('admin.profile.edit',[		
		'profile_ads'=>$profile_ads,
		'population'=>$population,
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
			->where('profile_ads.id', $id)			
			->first();
					
			
			return view('admin.profile.view',['data'=>$profile]);
		}
		
		// @ delete records function
		public function delete($id,$category){
			
		$profile = DB::table('profile_ads')			
		->where('profile_ads.id', $id)			
		->first();
		
		
		DB::table('favoritos')
			->where('profile_id', $id)
			->delete();
		DB::table('schedule')			
		->where('profile_ads_id', $id)			
		->delete();
		
		DB::table('tariffs')			
		->where('profile_id', $id)			
		->delete();
		DB::table('visualizaciones')			
		->where('profile_id', $id)			
		->delete();
		
		DB::table('piesepuerto')			
		->where('profile_ads_id', $id)			
		->delete();
			if(!empty($profile_ads->profile_pic)){
				$file_path=  public_path('/uploads/profile_ads/'.$profile_ads->profile_pic);
				unlink($file_path);
			}
			for($i=1; $i<=4;$i++){
				$gallery = 'gallery_'.$i;
				$selfie = 'selfie_'.$i;
				$video = 'video_'.$i;
				if(!empty($profile_ads->$gallery)){
					$file_path=  public_path('/uploads/profile_ads/'.$profile_ads->$gallery);
					unlink($file_path);
				}
				if(!empty($profile_ads->$selfie)){
					$file_path=  public_path('/uploads/profile_ads/'.$profile_ads->$selfie);
					unlink($file_path);
				}
				if(!empty($profile_ads->$video)){
					$file_path=  public_path('/uploads/profile_ads/'.$profile_ads->$video);
					unlink($file_path);
				}
			}
		DB::table('profile_ads')			
		->where('profile_ads.id', $id)			
		->delete();
		
		Session::flash('message', 'Province Successfully deleted!');
		Session::flash('alert-class', 'alert-info'); 
		return redirect('/admin/profile/index/'.$category.'');

		}
	 
 

}