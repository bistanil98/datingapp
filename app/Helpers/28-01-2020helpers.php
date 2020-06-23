<?php
function chaeckParentId($id=null){	
		$users_count = DB::table('categories')
		->where('parent', '=', $id)
		->count();
		return $users_count;
		}
	
	
		
		
		function edit_tariffs($id=null,$nunber){	
		$profile_ads = DB::table('profile_ads')
		->where('id', $id)
		->select('tariffs')
		->first();
		
		if(!empty($profile_ads->tariffs)){
			$count = count(json_decode($profile_ads->tariffs));	
			if($count>$nunber){
			 return json_decode($profile_ads->tariffs,true)[$nunber];
			}else{
				return '';
			}
			
		}else{
			return '';
		}
		
		}
		
		function edit_schedule($id=null,$day){	
		
		$profile_ads = DB::table('profile_ads')
		->where('id', $id)
		->select('schedule')
		->first();
		
		if(!empty($profile_ads->schedule)){
			$check  = json_decode($profile_ads->schedule,true);
			foreach($check as $data){
				if($data['days']==$day){
					return $data;
				}
			}
			 //return json_decode($profile_ads->schedule,true);
			
		}else{
			return '';
		}
		
		}
		
		
		
		
		 function checkover_you($id,$name){		 
			 $profile = DB::table('profile_ads')		
			 ->where('over_you',  'like', '%' .$name. '%')
			 ->where('id', $id)
			 ->count();		
			// dd($profile);die;
			 return $profile;
		}
		
		function check_services($id,$name){	 
		 $profile = DB::table('profile_ads')		
		 ->where('services',  'like', '%' .$name. '%')
		 ->where('id', $id)
		 ->count();		
		  return $profile;
		}
		
		 function get_anuncios($member_id){		 
			 $profile = DB::table('profile_ads')		
			 ->where('member_id',  $member_id)
			 ->count();		
			 return $profile;
		}
		
		
		function edit_profile($agency_id=null,$nunber){
			$profile_ads = DB::table('profile_ads')
			->where('member_id', $agency_id)
			->select('id','first_name','profile_pic')
			->get()
			->all();
			//dd($profile_ads[0]->first_name);die;
				if (array_key_exists($nunber,$profile_ads))
				{
				 return $profile_ads[$nunber];
				}
				else
				{
				return '';
				}
			
		}
		
		function get_email($member_id){
			$profile_ads = DB::table('members')
			->where('id', $member_id)
			->select('email')
			->first();
			
				if (!empty($profile_ads)){				
					return $profile_ads->email;
				}else{
					return '';
				}
			
		}
		
		// check profile ads top and subida
		function check_top_subida_profile_lists($profile_ads_id){
			$profile_ads = DB::table('top_subida_profile_lists')
			->where('profile_ads_id', $profile_ads_id)			
			->first();
			return $profile_ads;
		}
		
		// check profile ads top and subida
		function check_top_subida_profile_lists_sub($profile_ads_id){
			$profile_ads = DB::table('top_subida_profile_lists')
			->where('profile_ads_id', $profile_ads_id)	
			->where('type', 'subida')	
			->first();
			return $profile_ads;
		}
		
		// check profile ads top and subida
		function check_top_subida_profile_lists_top($profile_ads_id){
			$profile_ads = DB::table('top_subida_profile_lists')
			->where('profile_ads_id', $profile_ads_id)			
			->where('type', 'top')			
			->first();
			return $profile_ads;
		}
		
		function profile($profile_ads_id,$category=null){
		
			$profile_ads = DB::table('profile_ads')
			->where('id', $profile_ads_id)			
			->where('category', $category)			
			->first();
			if($profile_ads==null){
			return '';
			}else{
			return $profile_ads;
			}
			
		}
		
		function profile_popup($profile_ads_id){		
			$profile_ads = DB::table('profile_ads')
			->where('id', $profile_ads_id)				
			->first();
			if($profile_ads==null){
			return '';
			}else{
			return $profile_ads;
			}
			
		}
		
		function province($id){
		
			$profile_ads = DB::table('province')
			->where('id', $id)			
			->first();
			if($profile_ads==null){
				return '';
			}else{
			return $profile_ads->name;
				}
			
			
		}
		
		
		function top_previous_profile($id){
			$top_zona = DB::table('profile_ads')			
			->where('id', '<', $id)	
			->where('status', '1')
			->where('user_status', '1')
			->select('id')
			->orderBy('id', 'desc')
			->first();
			
			if(!empty($top_zona)){
				return $top_zona->id;
			}else{
				return '';
			}
			
		}
		
		function top_next_profile($id){		
			$top_zona = DB::table('profile_ads')			
			->where('id', '>', $id)
			->where('status', '1')
			->where('user_status', '1')
			->select('id')
			->first();
			
			if(!empty($top_zona)){
				return $top_zona->id;
			}else{
				return '';
			}
			
		}
		
		function nationality($nationality){		
			$top_zona = DB::table('countries')			
			->where('nationality', $nationality)
			->select('alpha_2_code')
			->first();			
			if(!empty($top_zona)){
				return strtolower($top_zona->alpha_2_code);
			}else{
				return '';
			}
			
		}
		
		function countries(){		
			return  DB::table('countries')->select('nationality','alpha_2_code')/* ->where('status','1') */->orderby('nationality','asc')->get();
		}
		
		function workingHour($day1hours, $day2hours){
			$day1 = explode(":", $day1hours);
			$day2 = explode(":", $day2hours);

			$totalmins = 0;
			$totalmins += $day1[0] * 60;
			$totalmins += $day1[1];
			$totalmins += $day2[0] * 60;
			$totalmins += $day2[1];

			$hours = $totalmins / 60;
			//$minutes = $totalmins % 60;

			//echo $totalhours = $hours.$minutes;
			return ceil($hours);	
		}
		
		function tariffs_price($id=null){	
		$profile_ads = DB::table('profile_ads')
		->where('id', $id)
		->select('tariffs')
		->first();
		
		if(!empty($profile_ads->tariffs)){
			$count = count(json_decode($profile_ads->tariffs));	
			if($count>0){
			 return json_decode($profile_ads->tariffs,true)[0]['tariffs_euro_price'];
			}else{
				return '';
			}
			
		}else{
			return '';
		}
		
		}
	
	
		// check profile ads top and subida
		function check_free_profile_ads($profile_ads_id){
			$profile_ads = DB::table('top_subida_profile_lists')
			->where('profile_ads_id', $profile_ads_id)			
			->count();
			return $profile_ads;
		}
		
		// check profile ads top and subida
		function check_free_profile_ads_type($profile_ads_id,$type){
			$profile_ads = DB::table('top_subida_profile_lists')
			->where('profile_ads_id', $profile_ads_id)			
			->where('type', $type)			
			->count();
			return $profile_ads;
		}
		
		
		// check profile ads top and subida
		function agency_category($agency_id){			
			$agencies=  DB::table('members')->select('agency_category')->where(['id' =>$agency_id])->first();
			return $agencies->agency_category;
		} 
		
		function services(){		
			return  DB::table('services')->select('name')->orderby('name','asc')->get();
		}
		
		function self_check($profile_ads_id){		
			$profile_ads = DB::table('profile_ads')
			->where('id', $profile_ads_id)				
			->select('selfie_1', 'selfie_2','selfie_3','selfie_4')				
			->first();
			
			if(!empty($profile_ads->selfie_1) || !empty($profile_ads->selfie_2) || !empty($profile_ads->selfie_3) || !empty($profile_ads->selfie_4) ){
				return 1;
			}else{
				return 0;
			}
			
		}
		
		function video_check($profile_ads_id){		
			$profile_ads = DB::table('profile_ads')
			->where('id', $profile_ads_id)				
			->select('video_1', 'video_2','video_3','video_4')				
			->first();
			
			if(!empty($profile_ads->video_1) || !empty($profile_ads->video_2) || !empty($profile_ads->video_3) || !empty($profile_ads->video_4) ){
				return 1;
			}else{
				return 0;
			}
			
		}
		
		// get forst images
		function profile_first_img($profile_ads_id){		
			$profile_ads = DB::table('profile_ads')
			->where('id', $profile_ads_id)
			->select('profile_pic')	
			->first();		
			return $profile_ads->profile_pic;
			
		}
?>