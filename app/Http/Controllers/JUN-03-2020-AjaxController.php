<?php
	namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Mail;
use App\Model\Members;
use Carbon\Carbon;
use Config;

class AjaxController extends Controller {  
    
    public function __construct()
    {
        
    }
	
	public function search(Request $request){		
		$category = $request->post('category');			
		$location = $request->post('location');			
		$keywords = $request->post('keywords');			
		// created_at under by filter
		$nationality = $request->post('nationality');
		$novelty = $request->post('novelty');			
		$min_availability = str_replace('h', '', $request->post('min_availability'));;			
		$max_availability = str_replace('h', '', $request->post('max_availability'));;					
		$min_height = str_replace('cm', '', $request->post('min_height'));;			
		$max_height = str_replace('cm', '', $request->post('max_height'));;			
		$min_height = (float)$min_height;
		$max_height = (float)$max_height;
		$min_tariffs = str_replace('€', '', $request->post('min_tariffs'));;			
		$max_tariffs = str_replace('€', '', $request->post('max_tariffs'));;					
		$min_age = $request->min_age;
		$max_age = $request->max_age;
		$kind = $request->post('kind');
		
		$top_zona_query = DB::table('top_subida_profile_lists');
		$top_zona_query->leftJoin('profile_ads', 'profile_ads.id', '=', 'top_subida_profile_lists.profile_ads_id');
		$top_zona_query->leftJoin('tariffs', 'tariffs.profile_id', '=', 'profile_ads.id');
		$top_zona_query->leftJoin('schedule', 'schedule.profile_ads_id', '=', 'profile_ads.id');
		$top_zona_query->select('profile_ads.role','profile_ads.member_id','profile_ads.created_at','tariffs.tariffs_euro_price','top_subida_profile_lists.id as top_subida_profile_listsID','top_subida_profile_lists.type','top_subida_profile_lists.profile_ads_id','profile_ads.*');
		if($min_height>90){
		$top_zona_query->where('profile_ads.height', '>=',  $min_height);
		}
		if($max_height<250){
		$top_zona_query->where('profile_ads.height', '<=',  $max_height);	
		}
		if($min_tariffs>25){
		$top_zona_query->where('profile_ads.tariffs', '>=',  $min_tariffs);
		}
		if($max_tariffs<400){
		$top_zona_query->where('profile_ads.tariffs', '<=',  $max_tariffs);
		}
		
		if($min_availability>0){
		$top_zona_query->where('schedule.from_1', '>=',  $min_availability);
		}
		if($max_availability<24){
		$top_zona_query->where('schedule.unit_1', '<=',  $max_availability);
		}
		
		if($min_age>18){
		$top_zona_query->where('profile_ads.age', '>=',  $min_age);
		}
		if($max_age<60){
		$top_zona_query->where('profile_ads.age', '<=',  $max_age);
		}
			
		 if (!empty($request->services)) {
		$top_zona_services = $request->services;
		  $top_zona_query->where(function($top_zona_query) use($top_zona_services) {
                        foreach($top_zona_services as $term) {
                            $top_zona_query->orWhere('profile_ads.services', 'like', "%$term%");
                        };
                    });				
			}
			
			if (!empty($request->hair)) {
				$top_zona_hair = $request->hair;
				$top_zona_query->where(function($top_zona_query) use($top_zona_hair) {
                        foreach($top_zona_hair as $term) {
                            $top_zona_query->orWhere('profile_ads.hair', 'like', "%$term%");
                        };
                    });
			}
		
		if (!empty($request->nationality)) {
			if($nationality!='all'){	
				$top_zona_query->where('profile_ads.nationality', 'like','%' .$nationality. '%');				
			}
		}	
		$kind_services = $request->kind;
			if (!empty($request->kind)) {				
				$top_zona_query->where(function($top_zona_query) use($kind_services) {
                        foreach($kind_services as $term) {
							if($term=='individual'){
							$top_zona_query->orWhere('profile_ads.role', 'like', "%$term%");
							}
							if($term=='agency'){
							$top_zona_query->orWhere('profile_ads.role', 'like', "%$term%");
							}							
                        };
                    });
		}	
		
		if (!empty($request->novelty)) {
			if($novelty!='0'){	
			$date = \Carbon\Carbon::today()->subDays($request->novelty);				
			$top_zona_query->whereDate('profile_ads.created_at', '>=', $date);	
			}
		} 
		if (!empty($request->agenciaId)) {
			$top_zona_query->where('profile_ads.member_id', $request->agenciaId);
		} else{
		$top_zona_query->where('profile_ads.population', 'like','%' .$location. '%');
		$top_zona_query->where('profile_ads.first_name', 'like','%' .$keywords. '%')	;		
		$top_zona_query->where('profile_ads.category', $category);
		}
		
		$top_zona_query->where('top_subida_profile_lists.type', 'top');
		$top_zona_query->where('profile_ads.status', '1');		
		$top_zona_query->where('profile_ads.user_status', '1');
		
		if (!empty($request->kind)) {
				foreach($kind_services as $term2) {
					if($term2=='telephone_verify'){
						$top_zona_query->where('profile_ads.telephone_verify', 1);
					}
				if($term2=='videos'){								
					for($i=1; $i<=1; $i++) {
					$top_zona_query->whereNotNull('profile_ads.video_'.$i);
					};								
				}
				}
			}
		$top_zona_query->groupBy('top_subida_profile_lists.profile_ads_id');
		$top_zona_query->orderby('top_subida_profile_lists.id', '=', 'desc');	
		$top_zona = $top_zona_query->get();	
		
		$top_zona_count = $top_zona_query->count();
		
		
		/// search subida
		
		$subida_query = DB::table('top_subida_profile_lists');
		$subida_query->leftJoin('profile_ads', 'profile_ads.id', '=', 'top_subida_profile_lists.profile_ads_id');
		$subida_query->leftJoin('tariffs', 'tariffs.profile_id', '=', 'profile_ads.id');
		$subida_query->leftJoin('schedule', 'schedule.profile_ads_id', '=', 'profile_ads.id');
		$subida_query->select('profile_ads.role','profile_ads.member_id','profile_ads.created_at','tariffs.tariffs_euro_price','top_subida_profile_lists.id as top_subida_profile_listsID','top_subida_profile_lists.type','top_subida_profile_lists.profile_ads_id','profile_ads.*');
		if($min_height>90){
		$subida_query->where('profile_ads.height', '>=',  $min_height);
		}
		if($max_height<250){
		$subida_query->where('profile_ads.height', '<=',  $max_height);	
		}
		if($min_tariffs>25){
		$subida_query->where('profile_ads.tariffs', '>=',  $min_tariffs);
		}
		if($max_tariffs<400){
		$subida_query->where('profile_ads.tariffs', '<=',  $max_tariffs);
		}
		
		if($min_availability>0){
		$subida_query->where('schedule.from_1', '>=',  $min_availability);
		}
		if($max_availability<24){
		$subida_query->where('schedule.unit_1', '<=',  $max_availability);
		}
		
		if($min_age>18){
		$subida_query->where('profile_ads.age', '>=',  $min_age);
		}
		if($max_age<60){
		$subida_query->where('profile_ads.age', '<=',  $max_age);
		}
		 if (!empty($request->services)) {
		$subida_services = $request->services;
		  $subida_query->where(function($subida_query) use($subida_services) {
                        foreach($subida_services as $term) {
                            $subida_query->orWhere('profile_ads.services', 'like', "%$term%");
                        };
                    });				
			}
			
			if (!empty($request->hair)) {
				$subida_hair = $request->hair;
				$subida_query->where(function($subida_query) use($subida_hair) {
                        foreach($subida_hair as $term) {
                            $subida_query->orWhere('profile_ads.hair', 'like', "%$term%");
                        };
                    });
			}
		
		if (!empty($request->nationality)) {
			if($nationality!='all'){	
				$subida_query->where('profile_ads.nationality', 'like','%' .$nationality. '%');				
			}
		}	
		
		if (!empty($request->agenciaId)) {
			$subida_query->where('profile_ads.member_id', $request->agenciaId);
		} else{
		$subida_query->where('profile_ads.population', 'like','%' .$location. '%');
		$subida_query->where('profile_ads.first_name', 'like','%' .$keywords. '%')	;		
		$subida_query->where('profile_ads.category', $category);	
		}
	$kind_services = $request->kind;
			if (!empty($request->kind)) {				
				$subida_query->where(function($subida_query) use($kind_services) {
                        foreach($kind_services as $term) {
							if($term=='individual'){
							$subida_query->orWhere('profile_ads.role', 'like', "%$term%");
							}
							if($term=='agency'){
							$subida_query->orWhere('profile_ads.role', 'like', "%$term%");
							}							
                        };
                    });
		}			if (!empty($request->novelty)) {
			if($novelty!='0'){	
			$date2 = \Carbon\Carbon::today()->subDays($request->novelty);		
			
			$subida_query->whereDate('profile_ads.created_at', '>=', $date2);	
			}
		} 
		
		$subida_query->where('top_subida_profile_lists.type', 'subida');
		$subida_query->where('profile_ads.status', '1');		
		$subida_query->where('profile_ads.user_status', '1');
		 
		if (!empty($request->kind)) {
				foreach($kind_services as $term2) {
					if($term2=='telephone_verify'){
						$subida_query->where('profile_ads.telephone_verify', 1);
					}
				if($term2=='videos'){								
					for($i=1; $i<=1; $i++) {
					$subida_query->whereNotNull('profile_ads.video_'.$i);
					};								
				}
				}
			}
		$subida_query->groupBy('top_subida_profile_lists.profile_ads_id');
		$subida_query->orderby('top_subida_profile_lists.id', '=', 'desc');	
		$subida = $subida_query->get();
		$subida_count = $subida_query->count();		
		
		
		/// search subida
		
		$AutoSubidasEscortsIDS = DB::table('top_subida_profile_lists')
		->select('profile_ads.role','profile_ads.member_id','top_subida_profile_lists.profile_ads_id')
		->join('profile_ads', 'profile_ads.id', '=', 'top_subida_profile_lists.profile_ads_id')		
		->where('profile_ads.category', $category)
		 ->groupBy('top_subida_profile_lists.profile_ads_id')
		->get();
		
		$AutoSubidasEscortsIDSListStore = [];
		foreach ($AutoSubidasEscortsIDS as $AutoSubidasEscortsIDSList)
		{
		$AutoSubidasEscortsIDSListStore[] = $AutoSubidasEscortsIDSList->profile_ads_id;
		}
		
		$subida_query_free = DB::table('profile_ads');
		$subida_query_free->leftJoin('top_subida_profile_lists', 'profile_ads.id', '=', 'top_subida_profile_lists.profile_ads_id');
		$subida_query_free->leftJoin('tariffs', 'tariffs.profile_id', '=', 'profile_ads.id');
		$subida_query_free->leftJoin('schedule', 'schedule.profile_ads_id', '=', 'profile_ads.id');
		$subida_query_free->select('profile_ads.role','profile_ads.member_id','top_subida_profile_lists.id as top_subida_profile_listsID','top_subida_profile_lists.profile_ads_id',
			'profile_ads.id',
			'profile_ads.profile_pic',
			'profile_ads.title',
			'profile_ads.province',
			'profile_ads.age',
			'profile_ads.nationality',			
			'profile_ads.category'		
			);
		$subida_query_free->whereNotIn('profile_ads.id',   $AutoSubidasEscortsIDSListStore);
		if($min_height>90){
		$subida_query_free->where('profile_ads.height', '>=',  $min_height);
		}
		if($max_height<250){
		$subida_query_free->where('profile_ads.height', '<=',  $max_height);	
		}
		if($min_tariffs>25){
		$subida_query_free->where('profile_ads.tariffs', '>=',  $min_tariffs);
		}
		if($max_tariffs<400){
		$subida_query_free->where('profile_ads.tariffs', '<=',  $max_tariffs);
		}
		
		if($min_availability>0){
		$subida_query_free->where('schedule.from_1', '>=',  $min_availability);
		}
		if($max_availability<24){
		$subida_query_free->where('schedule.unit_1', '<=',  $max_availability);
		}
		
		if($min_age>18){
		$subida_query_free->where('profile_ads.age', '>=',  $min_age);
		}
		if($max_age<60){
		$subida_query_free->where('profile_ads.age', '<=',  $max_age);
		}
		 if (!empty($request->services)) {
		$subida_services = $request->services;
		  $subida_query_free->where(function($subida_query_free) use($subida_services) {
                        foreach($subida_services as $term) {
                            $subida_query_free->orWhere('profile_ads.services', 'like', "%$term%");
                        };
                    });				
			}
			
			if (!empty($request->hair)) {
				$subida_hair = $request->hair;
				$subida_query_free->where(function($subida_query_free) use($subida_hair) {
                        foreach($subida_hair as $term) {
                            $subida_query_free->orWhere('profile_ads.hair', 'like', "%$term%");
                        };
                    });
			}
		
		if (!empty($request->nationality)) {
			if($nationality!='all'){	
				$subida_query_free->where('profile_ads.nationality', 'like','%' .$nationality. '%');				
			}
		}	
		
		if (!empty($request->agenciaId)) {
			$subida_query_free->where('profile_ads.member_id', $request->agenciaId);
		} else{
		$subida_query_free->where('profile_ads.population', 'like','%' .$location. '%');
		$subida_query_free->where('profile_ads.first_name', 'like','%' .$keywords. '%')	;		
		$subida_query_free->where('profile_ads.category', $category);	
		}
	$kind_services = $request->kind;
			if (!empty($request->kind)) {				
				$subida_query_free->where(function($subida_query_free) use($kind_services) {
                        foreach($kind_services as $term) {
							if($term=='individual'){
							$subida_query_free->orWhere('profile_ads.role', 'like', "%$term%");
							}
							if($term=='agency'){
							$subida_query_free->orWhere('profile_ads.role', 'like', "%$term%");
							}							
                        };
                    });
		}			if (!empty($request->novelty)) {
			if($novelty!='0'){	
			$date2 = \Carbon\Carbon::today()->subDays($request->novelty);		
			
			$subida_query_free->whereDate('profile_ads.created_at', '>=', $date2);	
			}
		} 
		
		
		$subida_query_free->where('profile_ads.status', '1');		
		$subida_query_free->where('profile_ads.user_status_subida', '1');
		$subida_query_free->where('profile_ads.user_status', '1');
		 
		if (!empty($request->kind)) {
				foreach($kind_services as $term2) {
					if($term2=='telephone_verify'){
						$subida_query_free->where('profile_ads.telephone_verify', 1);
					}
				if($term2=='videos'){								
					for($i=1; $i<=1; $i++) {
					$subida_query_free->whereNotNull('profile_ads.video_'.$i);
					};								
				}
				}
			}
		$subida_query_free->groupBy('top_subida_profile_lists.profile_ads_id');
		$subida_query_free->orderby('profile_ads.id', '=', 'desc');	
		$get_subida_going_address = $subida_query_free->get();
		
		
	
        return view('front.ajax.search',['top_zona'=>$top_zona,'top_zona_count'=>$top_zona_count,'subida'=>$subida,'subida_count'=>$subida_count,'get_subida_going_address'=>$get_subida_going_address,'category'=>$category]);     
		}
		
	public function checkEmail(Request $request){  
	$check = Members::where('email', $request->email)->count();		       
		if($check>0){
			 echo 'false';
		}else{
			 echo 'true';
		}
    }
	
	public function checkMobile(Request $request){  
	$check = Members::where('mobile', $request->mobile)->count();		       
		if($check>0){
			 echo 'false';
		}else{
			 echo 'true';
		}
    }
	
	
	public function login(Request $request) {  		
        request()->validate([        
        'email' => 'required',
        'password' => 'required'
        ]);
       
         $password = md5($request->password);
		 $get_user = Members::where('email', $request->email)
		->where('password',$password)		
		->where('role','Individual')
		->first();
		if(!empty($get_user)){ 
		if($get_user->is_email!=1){
			echo 'Email address is not verified.';
		}else if($get_user->status!=1){
			echo 'Your account is temporarily locked contact your system administrator';			
		}else{
			 session(['user_id' => $get_user->id]);		     		    
			 echo 1;
		}
		 
		}else{
			echo 'Invalid login detail';
		}
        
       
    }
	
		public function agency_login(Request $request) {  		
        request()->validate([        
        'email' => 'required',
        'password' => 'required'
        ]);
       
         $password = md5($request->password);
		 $get_user = Members::where('email', $request->email)
		->where('password',$password)		
		->where('role','Agency')
		->first();
		if(!empty($get_user)){ 
		if($get_user->is_email!=1){
			echo 'Email address is not verified.';
		}else if($get_user->status!=1){
			echo 'Your account is temporarily locked contact your system administrator';			
		}else{
			 session(['agency_id' => $get_user->id]);		     		    
			 echo 1;
		}
		 
		}else{
			echo 'Invalid login detail';
		}
        
       
    }
	
	
	public function register(Request $request){
	$validatedData = $request->validate([
    //'name' => 'required',    
    'email' => "required|email|unique:members,email",
    //'password' => 'required',
    //'repassword' => 'required|same:password'
    
    ]);
		
	 //$mobile = $request->input('mobile');	  	 
	// $code = $request->input('code');	  	 
	// $name = $request->input('name');	  	 
	 $email = $request->input('email');	 
	 //$password = $request->input('password');
	// $mobile = rtrim('0',$mobile);
	// $mobile = rtrim('+',$mobile);
	
	 $hash = md5( rand(0,1000) );
	 $site_url_link = url('/')."/members/update-password/".$hash;
	 $created_at = date('Y-m-d h:i:s');
	  DB::table('members')
	  ->insert([
	 // 'mobile' =>$mobile,	  
	 // 'hash' =>$hash,	  
	 // 'code' =>$code,	  
	 // 'name' =>$name,	  
	  'email' =>$email,
	  'hash' =>$hash,	  
	 // 'password' =>md5($password),
	  'created_at'=>$created_at,
	  'update_at'=>$created_at
	  ]
      );	
	  	DB::table('member_signup_delete_history')	
		->insert([
		'type' =>'signup',		
		'created_at'=>$created_at,	
		]);
		//escortlisting@escortlisting.localjoy.website
		//26/143/110
		//?Fr2TvC^{V0M
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
		
       echo DB::getPdo()->lastInsertid();
		   
	}
	
		public function contact_support_agecncy(Request $request){
		
			if ( !empty( $request->except('_token') ) ){
			$agency_id = $request->input('agency_id');	  						
			$name = $request->input('name');	  						
			$type = $request->input('type');	  						
			$email = $request->input('email');	  						
			$telephone = $request->input('telephone');	  						
			$comments = $request->input('comments');			
			$created_at = date('Y-m-d h:i:s');
			DB::table('agency_contact_enquiry')
			->insert([
				'agency_id' =>$agency_id,				
				'name' =>$name,		
				'type' =>$type,	
				'email' =>$email,				
				'telephone' =>$telephone,				
				'comments' =>$comments,				
				'created_at' =>$created_at,				
			]);
			
		$hostname = getenv('HTTP_HOST');
		if($hostname=="localhost:7777"){
			
		}else{
			//$subject = $type.' Member Contact Support';
			Mail::send('front.emails.contact_support',
			     $user=array(
				 'name' => $name,				 
				 'type' => $type,				 
				 'telephone' => $telephone,				 
				 'comments' => $comments,				 
				 'email' => $email,				 
				 ), function($message) use ($user,$email){
			   $message->from('escortlisting@escortlisting.localjoy.website');
			   $message->to('escortlisting@escortlisting.localjoy.website', 'Escort')->subject('New Contact Support');
		   }); 
		}
		
			echo 1;
			
		}
		
	}
	
			public function contact_report(Request $request){
		
			if ( !empty( $request->except('_token') ) ){
			$agency_id = $request->input('agency_id');
			
			$name = $request->input('name');	  						
			$type = $request->input('type');	  						
			$email = $request->input('email');	  						
			$telephone = $request->input('telephone');	  						
			$comments = $request->input('comments');			
			$created_at = date('Y-m-d h:i:s');
			DB::table('agency_contact_enquiry')
			->insert([
				'agency_id' =>$agency_id,				
				'name' =>$name,		
				'type' =>$type,	
				'email' =>$email,				
				'telephone' =>$telephone,				
				'comments' =>$comments,				
				'created_at' =>$created_at,				
			]);
			$getAd = DB::table('profile_ads')			
			->where('id',$agency_id)			
			->select('title')
			->first();
			$title = $getAd->title;
		$hostname = getenv('HTTP_HOST');
		if($hostname=="localhost:7777"){
			
		}else{
			//$subject = $type.' Member Contact Support';
			Mail::send('front.emails.contact_report',
			     $user=array(
				 'name' => $name,				 
				 'type' => $type,				 
				 'title' => $title,				 
				 'telephone' => $telephone,
				 'comments' => $comments,				 
				 'email' => $email,				 
				 ), function($message) use ($user,$email){
			   $message->from(Config::get('constants.FROM_EMAIL'));
			   $message->to(Config::get('constants.FROM_EMAIL'), 'Escort');
			   $message->subject('Complaint From Visitor For AD Title - '.$user['title'].'');
		   }); 
		}
		
			echo 1;
			
		}
		
	}
	
	
	
	public function population(Request $request)  {  	
		$str = '';
         $id = $request->population;         
		 $population = DB::table('population')		
		->where('province_id', $id)	
		->orderby('population.name', 'asc')
		->get();	
		if(!empty($population)){
		$str .= "<option value=''>Select Population</option>";
        foreach($population as $data){
		$str .=  "<option value='".$data->name."'>".$data->name."</option>";
		}
		}else{
		$str .= "<option value=''>No Value Found</option>";
		} 
		echo $str;
    }
	
	public function populationautocomplete(Request $request)  {  	
		$search_arr=array(); 
         $population = $request->population;         
		 $population = DB::table('population')
		 ->select('population.id','population.name','population.title','population.meta_title','population.meta_description','province.name as provinceName')
		 ->leftJoin('province', 'province.id', '=', 'population.province_id')
		->where('population.name', 'like', "".$population."%")	
		->orderby('population.name', 'asc')
		->limit(10)
		->get();		
		
		foreach($population as $student){	
			//$search_arr['label'] =  $student->name;
			//$search_arr['value'] =  $student->name.', '.$student->provinceName;
			$province = DB::table('province')
			->where('province.name', 'like', "".$student->provinceName."%")			
			->count();	
			if($province>0){
			$search_arr[] = array("value"=>$student->name,"label"=>$student->name);
			}else{
			$search_arr[] = array("value"=>$student->name,"label"=>$student->name.', '.$student->provinceName);
			}
			
		}

		echo json_encode($search_arr);
		
    }
	
	public function agency_packages(Request $request){	
         $numberOfChecked = $request->numberOfChecked;		 
         $numberOfCheckedAds = $request->numberOfCheckedAds;
		 $provinces = $request->provinces;		 
         $category = $request->category;
		 $get_user = DB::table('subida_agency_packages')
		->where('advertisements',$numberOfChecked)	
		->where('category', 'like', "%".$category."%")
		->where('provinces', 'like', "%".$provinces."%")
		->get()
		->all();	
		//dd( $get_user);die;
		return view('front.ajax.agency_packages',['get_user'=>$get_user,'numberOfChecked'=>$numberOfChecked,'numberOfCheckedAds'=>$numberOfCheckedAds]);        
    }

    public function member_packages(Request $request){	
         $numberOfChecked = $request->numberOfChecked;		 
         $numberOfCheckedAds = $request->numberOfCheckedAds;
		 $provinces = strtolower($request->provinces);		 
		 $category = strtolower($request->category);		          
		 $get_user = DB::table('subida_individual_packages')
		->where('advertisements',$numberOfChecked)	
		->where('category', 'like', "%".$category."%")
		->where('provinces', 'like', "%".$provinces."%")
		->get()
		->all();	
		//dd( $get_user);die;
		return view('front.ajax.member_packages',['get_user'=>$get_user,'numberOfChecked'=>$numberOfChecked,'numberOfCheckedAds'=>$numberOfCheckedAds]);        
    }
	
	public function top_escorts_agency_packages(Request $request){
         $provinces = $request->provinces;		 
         $category = $request->category;		 
         $numberOfChecked = $request->numberOfChecked;		 
         $packageValue = $request->packageValue;		 
		 $get_user = DB::table('top_agency_packages')
		->where('advertisements',$numberOfChecked)			
		->where('category', 'like', "%".$category."%")
		->where('provinces', 'like', "%".$provinces."%")
		->where('durations',$packageValue)	
		->first();	
		
		if(!empty($get_user)){
			return $base_price = $get_user->price;	
		}else{
			return '0';
		}
		 	 
		//return view('front.ajax.top_escorts_agency_packages',['packageValue'=>$packageValue,'get_user'=>$get_user,'numberOfChecked'=>$numberOfChecked]);        
    }
	
	public function top_escorts_individual_packages(Request $request){
         $provinces = $request->provinces;		 
         $category = $request->category;		 
         $numberOfChecked = $request->numberOfChecked;		 
         $packageValue = $request->packageValue;		 
		 $get_user = DB::table('top_individual_packages')
		->where('advertisements',$numberOfChecked)			
		->where('category', 'like', "%".$category."%")
		->where('provinces', 'like', "%".$provinces."%")
		->where('durations',$packageValue)	
		->first();	
		
		if(!empty($get_user)){
			return $base_price = $get_user->price;	
		}else{
			return '0';
		}
		 	 
		//return view('front.ajax.top_escorts_agency_packages',['packageValue'=>$packageValue,'get_user'=>$get_user,'numberOfChecked'=>$numberOfChecked]);        
    }

 
	 public function next_fetch_profile(Request $request){
			
			$adsid = $request->profile_id;	
			$this->visualizacionesCount($adsid);
		//	$adsid = 113;		
		//	$ads_list_ids = $request->ads_list_ids;
		//	$array = explode(',',$ads_list_ids);
		//	$index = array_search($adsid, $array);
		//	if($index !== false && $index < count($array)-1) $next = $array[$index+1];
			//if($index !== false && $index > 0 ) $prev = $array[$index-1];

			
			$data = DB::table('profile_ads')
			//->where('type', 'top')	
			->where('id',$adsid)
			->where('status', '1')
		//	->where('user_status', '1')
			//->select('profile_ads_id')
			->first();
					
			
			return view('front.ajax.fetch_profile',['profile_ads_id'=>$adsid, 'data'=>$data]);        
		}
				public function visualizacionesCount($profile_id){
					$ip = request()->ip();
					
						$created_at = date('Y-m-d h:i:s');
						DB::table('visualizaciones')
								->insert([
								'profile_id' =>$profile_id,
								//'top_subida_profile_listsID' =>$auto_subida_profile_listsID,
								'ip' =>$ip,
								'created_at' =>$created_at,
								'type' =>'top',
								]);
					/* $topAnuncio = DB::table('top_subida_profile_lists')
							->where('profile_ads_id', $profile_id)
							->where('type', 'top')
							->select('id')
							->first();
				
						if($topAnuncio){
								$top_subida_profile_listsID = $topAnuncio->id;
								DB::table('visualizaciones')
								->insert([
								'profile_id' =>$profile_id,
								'top_subida_profile_listsID' =>$top_subida_profile_listsID,
								'ip' =>$ip,
								'created_at' =>$created_at,
								'type' =>'top',
								]);
						}else{
						$autoSubida = DB::table('top_subida_profile_lists')
							->where('profile_ads_id', $profile_id)
							->where('type', 'subida')
							->select('id')
							->first();
				
						if($autoSubida){
								$auto_subida_profile_listsID = $autoSubida->id;
								DB::table('visualizaciones')
								->insert([
								'profile_id' =>$profile_id,
								'top_subida_profile_listsID' =>$auto_subida_profile_listsID,
								'ip' =>$ip,
								'created_at' =>$created_at,
								'type' =>'subida',
								]);
						}
						}
						
						 */
						
						}
	
		public function previous_fetch_profile(Request $request){
			$adsid = $request->profile_id;
		
			$this->visualizacionesCount($adsid);
			$data = DB::table('profile_ads')
			//->where('type', 'top')	
			->where('id',$adsid)
			->where('status', '1')
			//->where('user_status', '1')
			//->select('profile_ads_id')
			->first();
			
			return view('front.ajax.fetch_profile',['profile_ads_id'=>$adsid, 'data'=>$data]);      
		}
		
		
			 public function next_fetch_profile_favoritos(Request $request){
		
			$adsid = $request->profile_id;		
		
			$data = DB::table('profile_ads')
			//->where('type', 'top')	
			->where('id',$adsid)
			->where('status', '1')
			//->where('user_status', '1')
			//->select('profile_ads_id')
			->first();
			
			
			
			return view('front.ajax.fetch_profile_favoritos',['profile_ads_id'=>$adsid, 'data'=>$data]);        
		}
		
		public function previous_fetch_profile_favoritos(Request $request){
			$adsid = $request->profile_id;
		
			
			$data = DB::table('profile_ads')
			//->where('type', 'top')	
			->where('id',$adsid)
			->where('status', '1')
			//->where('user_status', '1')
			//->select('profile_ads_id')
			->first();
			
			return view('front.ajax.fetch_profile_favoritos',['profile_ads_id'=>$adsid, 'data'=>$data]);      
		}
		
	

	public function favoritos(Request $request){	
		$profile_id = $request->get('profile_id');
		$ip = request()->ip();
		$created_at = date('Y-m-d h:i:s');	
		$favoritos = DB::table('favoritos')
		->where('ip', $ip)
		->where('profile_id', $profile_id)
		->count();
		if($favoritos>0){
			DB::table('favoritos')
			->where('ip', $ip)
			->where('profile_id', $profile_id)
			->delete();
			echo 0;
			}else{
			DB::table('favoritos')
			->insert([
			'profile_id' =>$profile_id,
			'ip' =>$ip,
			'created_at' =>$created_at,
			]);
		
			echo 1;
			}
			}
			public function favoritosLoad(Request $request){
                $ip = request()->ip();			
                
               $favoritos = DB::table('favoritos')
                        ->where('ip', $ip)			
                        ->count();
                        
                       return view('front.ajax.favoritos',['favoritos'=>$favoritos]); 
				
				}
				
					public function favoritoTotal(Request $request){
                $ip = request()->ip();			
                
               $favoritos = DB::table('favoritos')
                        ->where('ip', $ip)			
                        ->count();
                 echo $favoritos;
				
				}
				
				public function remove_favoritos(Request $request){
					$ip = request()->ip();
					DB::table('favoritos')
					->where('ip', $ip)
					->delete();
					 $favoritos = DB::table('favoritos')
                        ->where('ip', $ip)			
                        ->count();
                        
                       return view('front.ajax.favoritos',['favoritos'=>$favoritos]);
					
					}
				
				public function remove_favoritos_single(Request $request){
					$ip = request()->ip();
					$profile_id = $request->get('profile_id');
					DB::table('favoritos')
					->where('ip', $ip)
					->where('profile_id', $profile_id)
					->delete();
					 $favoritos = DB::table('favoritos')
                        ->where('ip', $ip)			
                        ->count();
                        echo $favoritos;
                       //return view('front.ajax.favoritos',['favoritos'=>$favoritos]);
					
					}
					
					// save visualizaciones
					public function visualizaciones(Request $request){
					if ( !empty(  $request->input('profile_id') ) &&  !empty(  $request->input('top_subida_profile_listsID') ) ){
						$profile_id = $request->input('profile_id');
						$top_subida_profile_listsID = $request->input('top_subida_profile_listsID');
						$type = $request->input('type');
						$ip = request()->ip();
						$created_at = date('Y-m-d h:i:s');
						DB::table('visualizaciones')
						->insert([
						'profile_id' =>$profile_id,
						'top_subida_profile_listsID' =>$top_subida_profile_listsID,
						'ip' =>$ip,
						'created_at' =>$created_at,
						'type' =>$type,
						]);
						echo 1;
						}
						}
			public function visualizacione_chart_old($profile_id){
                        $one_week_ago = Carbon::now()->subDays(30)->format('Y-m-d');
                        $dates = DB::table('visualizaciones')
                        ->where('profile_id', $profile_id)
                        ->where('created_at', '>=', $one_week_ago)
                        ->groupBy('date')
                        ->orderBy('date', 'ASC')
                        ->get(array(
                        DB::raw('Date(created_at) as date'),
                        DB::raw('COUNT(*) as "count"')
                        ));
                        $store = array();
                        foreach($dates as $data){
                         $store[] = array(
                            "x" => strtotime($data->date)*1000,
                            "y" => $data->count,
                        ); 
                        }
                        $cart = array(
                            "data"=>$store
                        );
                        echo json_encode( $cart );
					}
					
						public function visualizacione_chart($profile_id){
						 $one_week_ago = Carbon::now()->subDays(30)->format('Y-m-d');
                       
						$end =  date('Y-m-d');
						$start =  date('Y-m-d', strtotime('-30 days'));
						 $store = array();
						$dateRange = $this->dateRange($start, $end);
						foreach($dateRange as $data){
						$checkdata = DB::table('visualizaciones')
						//->where('type', 'subida')	
						 ->whereDate('created_at', '=', $data)
						 ->where('profile_id', $profile_id)
						//->where('status', 'off')						
						->count();
						$store[] = array(
                            "x" => strtotime($data)*1000,
                            "y" => $checkdata,
                        ); 
                        
                        } 					
						$cart = array(
                            "data"=>$store
                        );
                        echo json_encode( $cart );
					}
					
							public function piesepuerto_chart($profile_id){
                       $one_week_ago = Carbon::now()->subDays(30)->format('Y-m-d');
                       
						$end =  date('Y-m-d');
						$start =  date('Y-m-d', strtotime('-30 days'));
						 $store = array();
						$dateRange = $this->dateRange($start, $end);
						foreach($dateRange as $data){
						 $checkTop = DB::table('piesepuerto')
						 ->where('type', 'top')
						 ->whereDate('from_date', '=', $data)
						 ->where('profile_ads_id', $profile_id)						
						 ->where('status', 1)
						->first();
						if($checkTop !=null){
							$top[] = array(
								"x" => strtotime($data)*1000,
								"y" => $checkTop->price,
							); 
						}else{
						$top[] = array(
                           "x" => strtotime($data)*1000,
                            "y" => 0,
                        ); 
						}
						
                         $checkSubida = DB::table('piesepuerto')
						 ->where('type', 'subida')
						 ->whereDate('from_date', '=', $data)
						 ->where('profile_ads_id', $profile_id)		
						 ->where('status', 1)
						->first();
						if($checkSubida !=null){
							$subida[] = array(
								"x" => strtotime($data)*1000,
								"y" => $checkSubida->price,
							); 
						}else{
						$subida[] = array(
                           "x" => strtotime($data)*1000,
                            "y" => 0,
                        ); 
						}
						
						
                        } 					
					 $cart = array(
                            "top"=>$top,
                            "subida"=>$subida,
                        );
                        echo json_encode( $cart );
					}
					
					public function piesepuerto_chart1($profile_id){
							$toptotalanuncio = DB::table('top_subida_profile_lists')
							->where('profile_ads_id', $profile_id)
							->where('type', 'top')
							->sum('price');
							
							
							$package_seen = DB::table('top_subida_profile_lists')
							->where('profile_ads_id', $profile_id)
							->where('type', 'top')
							->select('seen_days');
							
							$perdatecharge=($toptotalanuncio/$package_seen);
							
							$enddate =  date('Y-m-d');
							$startdate =  date('Y-m-d', strtotime('-30 days'));
							$topdata = array();
							$subidadata=array();
							$dateRange = $this->dateRange($startdate, $enddate);

							foreach($dateRange as $Cdata){
							
							//->where('status', 'off')						
							//->count();
							$topdata[] = array(
							"x" => strtotime($Cdata)*1000,
							"y" => 20,
							);

							}

							 $cart = array(
							"top"=>$topdata,
							"subida"=>$subidadata,
							);
							echo json_encode( $cart );


					}

					
						public function piesepuerto_chart_old07_05($profile_id){
                        $one_week_ago = Carbon::now()->subDays(30)->format('Y-m-d');
						
						/*$toptotalanuncio = DB::table('top_subida_profile_lists')
						->where('profile_ads_id', $id)
						->where('type', 'top')
						->sum('price');*/
						
						$topdates = DB::table('top_subida_profile_lists')
                        ->where('profile_ads_id', $profile_id)
                        ->where('type', 'top')
                       ->whereDate('created_at', '>=', $one_week_ago)
                        ->groupBy('date')
                        ->orderBy('date', 'ASC')
                        ->get(array(
                        DB::raw('Date(created_at) as date'),
						 DB::raw('sum(price) as count')                        
                        ));
                       $date30 =  date('Y-m-d', strtotime('-31 days'));
                        $top = array();
                         $top[] = array(
                            "x" => strtotime($date30)*1000,
                            "y" => 0,
                        ); 
                        foreach($topdates as $data){
						
                         $top[] = array(
                            "x" => strtotime($data->date)*1000,
                            "y" => $data->count,
                        ); 
                        }
						//subida
						$subidadates = DB::table('top_subida_profile_lists')
                        ->where('profile_ads_id', $profile_id)
                        ->where('type', 'subida')
                      ->whereDate('created_at', '>=', $one_week_ago)
                        ->groupBy('date')
                        ->orderBy('date', 'ASC')
                        ->get(array(
                        DB::raw('Date(created_at) as date'),
						 DB::raw('sum(price) as count')                        
                        ));
                        $subida = array();
                        $subida[] = array(
                            "x" => strtotime($date30)*1000,
                            "y" => 0,
                        ); 
                        foreach($subidadates as $data){
                         $subida[] = array(
                            "x" => strtotime($data->date)*1000,
                            "y" => $data->count,
                        ); 
                        }
						
                        $cart = array(
                            "top"=>$top,
                            "subida"=>$subida,
                        );
                        echo json_encode( $cart );
					}
					
					
						function dateRange( $first, $last, $step = '+1 day', $format = 'Y-m-d' ) {
						$dates = [];
						$current = strtotime( $first );
						$last = strtotime( $last );
						while( $current <= $last ) {
						$dates[] = date( $format, $current );
						$current = strtotime( $step, $current );
						}

						return $dates;
						}
					public function top_anuncios_chart($profile_id){
						$end =  date('Y-m-d');
						$start =  date('Y-m-d', strtotime('-30 days'));
						 $store = array();
						$dateRange = $this->dateRange($start, $end);
						foreach($dateRange as $data){
						 $checkTop = DB::table('piesepuerto')
						 ->where('type', 'top')
						 ->whereDate('from_date', '=', $data)
						 ->where('profile_ads_id', $profile_id)						
						 ->where('status', 1)
						->first();
						
				    	if($checkTop){
                        $store[] = array(
                            "name" => date('l d F' ,strtotime($data)),
                            "y" => '1',
                        ); 
						}else{
                        $store[] = array(
                            "name" => date('l d F' ,strtotime($data)),
                            "y" => '0',
                        ); 
						}
                        
                        } 					
						
                        echo json_encode( $store );
					}
						public function top_anuncios_chart_old_07_05($profile_id){
						$end =  date('Y-m-d');
						$start =  date('Y-m-d', strtotime('-30 days'));
						 $store = array();
						$dateRange = $this->dateRange($start, $end);
						foreach($dateRange as $data){
						$checkdata = DB::table('top_subida_profile_on_off_status')
						->where('type', 'top')	
						 ->whereDate('created_at', '=', $data)
						 ->where('profile_ads_id', $profile_id)
						->where('status', 'off')						
						->first();
				    	if($checkdata){
						/*	 $store[] = array(
                          '"' .date('l d F' ,strtotime($data)). '"' => '0'
                            
                        ); */
                        $store[] = array(
                            "name" => date('l d F' ,strtotime($data)),
                            "y" => '0',
                        ); 
						}else{
						    /*
							 $store[] = array(
                           '"' .date('l d F' ,strtotime($data)). '"' => '1'
                        ); */
                        $store[] = array(
                            "name" => date('l d F' ,strtotime($data)),
                            "y" => '1',
                        ); 
						}
                        
                        } 					
						
                        echo json_encode( $store );
					}
					
					public function subida_zone_chart_old($profile_id){
						$end =  date('Y-m-d');
						$start =  date('Y-m-d', strtotime('-30 days'));
						 $store = array();
						$dateRange = $this->dateRange($start, $end);
						foreach($dateRange as $data){
						$subida = DB::table('top_subida_profile_on_off_status')
						->where('type', 'subida')	
						 ->whereDate('created_at', '=', $data)
						 ->where('profile_ads_id', $profile_id)
						->where('status', 'off')						
						->first();
						if($subida){
							 $store[] = array(
                            "x" => strtotime($data)*1000,
                           "y" => '0',
                        ); 
						}else{
						$subidadates = DB::table('top_subida_profile_lists')
                        ->where('profile_ads_id', $profile_id)
                        ->where('type', 'subida')
                       // ->whereDate('created_at', '>=', $one_week_ago)
                        //->groupBy('date')
                        ->first();
						if($subidadates){
						 $store[] = array(
                            "x" => strtotime($data)*1000,
                            "y" => $subidadates->seen_days,
                        ); 
						}else{
						 $store[] = array(
                            "x" => strtotime($data)*1000,
                            "y" => '0',
                        ); 
						}
							
						}
                        
                        } 					
						$cart = array(
                            "data"=>$store
                        );
                        echo json_encode( $cart );
					}
						public function subida_zone_chart($profile_id){
						$end =  date('Y-m-d');
						$start =  date('Y-m-d', strtotime('-30 days'));
						 $store = array();
						$dateRange = $this->dateRange($start, $end);
						foreach($dateRange as $data){
						 $checkTop = DB::table('piesepuerto')
						 ->where('type', 'subida')
						 ->where('from_date', '=', $data)
						 ->where('profile_ads_id', $profile_id)						
						 ->where('status', 1)
						->first();
						
				    	if($checkTop){
						$top_subida_profile =  DB::table('top_subida_profile_lists')		
		->where('profile_ads_id',$profile_id)
		 ->where('type', 'subida')
		->select('seen_daily')
		->first();
                        $store[] = array(
                          "x" => strtotime($data)*1000,
                            "y" => $top_subida_profile->seen_daily
                        ); 
						}else{
                        $store[] = array(
                          "x" => strtotime($data)*1000,
                            "y" => '0',
                        ); 
						}
                        
                        } 					
						
                     $cart = array(
                            "data"=>$store
                        );
                        echo json_encode( $cart );
					}
					
					
					public function conversion(){                                              
							
							$Paying = DB::table('top_subida_profile_lists')
							->whereYear('created_at', date('Y'))				
							//->groupBy('profile_ads_id')
							->count();
							
							$Signup = DB::table('member_signup_delete_history')
							->whereYear('created_at', date('Y'))			
							
							->where('type', 'signup')											
							->count();
							$Delete = DB::table('member_signup_delete_history')
							->whereYear('created_at', date('Y'))							
							->where('type', 'delete')							
							->count();
					
							$payingRate[] = array(
								"x" => '2020',
								"y" => $Paying,
							); 
							$deleteRate[] = array(
								"x" => '2020',
								"y" => $Delete,
							); 
							$signupRate[] = array(
								"x" => '2020',
								"y" => $Signup,
							); 
					

									
					 $cart = array(
                            "pay"=>$payingRate,
                            "signup"=>$signupRate,
                            "delete"=>$deleteRate,
                        );
                        echo json_encode( $cart );
					}
					
 }
 ?>