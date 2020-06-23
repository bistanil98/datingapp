<?php	
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

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
		
		function get_tariffs_list($id=null){	
		$profile_ads = DB::table('tariffs')
			->orderBy('id','asc')
		->where('profile_id', $id)->get();
		$data = collect($profile_ads)->map(function($x){ return (array) $x; })->toArray(); 
		 	if(!empty($data)){			
			 return $data;
			}else{
				return '';
			} 
		
		}
		
		function get_tariffs_update($id=null,$nunber){	
			
		$profile_ads = DB::table('tariffs')
			->orderBy('id','asc')
		->where('profile_id', $id)->get();
		$data = collect($profile_ads)->map(function($x){ return (array) $x; })->toArray(); 
		 	if(!empty($data[$nunber])){
			
			 return $data[$nunber];
			}else{
				return '';
			} 
		
		}
		
			function get_schedule_list($id=null){	
			
		$profile_ads = DB::table('schedule')
			->orderBy('id','asc')
		->where('profile_ads_id', $id)->get();
		$data = collect($profile_ads)->map(function($x){ return (array) $x; })->toArray(); 
		 	if(!empty($data)){
			
			 return $data;
			}else{
				return '';
			} 
		
		}
		
		function get_schedule_update($id=null,$nunber){				
		$profile_ads = DB::table('schedule')
		->orderBy('id','asc')
		->where('profile_ads_id', $id)->get();
		$data = collect($profile_ads)->map(function($x){ return (array) $x; })->toArray(); 		
		 	if(!empty($data[$nunber])){			
			 return $data[$nunber];
			}else{
				return '';
			} 		
		}
			function get_schedule_update_2($id=null,$days){				
		$profile_ads = DB::table('schedule')
		->orderBy('id','asc')
		->where('profile_ads_id', $id)
		->where('days', $days)
		->first();
		//$data = collect($profile_ads)->map(function($x){ return (array) $x; })->toArray(); 		
		 	if(!empty($profile_ads)){			
			 return (array)$profile_ads;
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
		
		 function check_ad_member_type($member_id){		 
			 $profile = DB::table('members')
			 ->select('role','upload_logo')
			 ->where('id',  $member_id)
			 ->first();		
			 return $profile;
		} 
		 function check_ad_member_role($member_id,$role){		 
			 $profile = DB::table('members')
			 ->select('role','upload_logo')
			 ->where('id',  $member_id)
			 ->where('role',  $role)
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
		//$now =  date('Y-m-d'); 
		
		$top_zona = DB::table('profile_ads');
			$top_zona->leftJoin('top_subida_profile_lists', 'top_subida_profile_lists.profile_ads_id', '=', 'profile_ads.id');
			//->join('profile_ads', 'profile_ads.member_id', '=', 'members.id');
			$top_zona->where('profile_ads.status', '1');
			/* if(!empty($category)){
			$top_zona->where('profile_ads.category', $category);
			} */
			//$top_zona->where('profile_ads.user_status', '1');			
			$top_zona->select('profile_ads.id','profile_ads.nationality','top_subida_profile_lists.profile_ads_id');
			//$top_zona->where('top_subida_profile_lists.from_date', '<=', $now);
			//$top_zona->where('top_subida_profile_lists.to_date', '>=', $now);
			//->groupBy('profile_ads.nationality')
			$top_zona2 = $top_zona->get();
			$not_ids = [];
			foreach ($top_zona2 as $plocations)
			{
			$not_ids[] = $plocations->nationality;
			}
			//return ($not_ids);die;
			return  DB::table('countries')->select('nationality','alpha_2_code')->whereIn('nationality',   $not_ids)->orderby('nationality','asc')->get();
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
			if($profile_ads){
				return $profile_ads->tariffs;
			}else{
				return 0;
			}
		
		}
		
		function tariffs_price_old11_($id=null){	
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
		function return_free_profile_ads_type($profile_ads_id,$type){
			$profile_ads = DB::table('top_subida_profile_lists')
			->where('profile_ads_id', $profile_ads_id)			
			->where('type', $type)			
			->select('id')			
			->first();
			return $profile_ads->id;
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
		
		function top_agency_packages_provinces_check($id,$name){		 
			 $profile = DB::table('top_agency_packages')		
			 ->where('provinces',  'like', '%' .$name. '%')
			 ->where('id', $id)
			 ->count();					
			 return $profile;
		}
		
		function subida_agency_packages_provinces_check($id,$name){		 
			 $profile = DB::table('subida_agency_packages')		
			 ->where('provinces',  'like', '%' .$name. '%')
			 ->where('id', $id)
			 ->count();					
			 return $profile;
		}	
		
		function top_individual_packages_provinces_check($id,$name){		 
			 $profile = DB::table('top_agency_packages')		
			 ->where('provinces',  'like', '%' .$name. '%')
			 ->where('id', $id)
			 ->count();					
			 return $profile;
		}
		
		function subida_individual_packages_provinces_check($id,$name){		 
			 $profile = DB::table('subida_agency_packages')		
			 ->where('provinces',  'like', '%' .$name. '%')
			 ->where('id', $id)
			 ->count();					
			 return $profile;
		}
		
		function get_provinceId($name){
		
			$profile_ads = DB::table('province')
			->where('name', $name)			
			->first();
			if($profile_ads==null){
				return '';
			}else{
			return $profile_ads->id;
				}
		}
		
		// check profile ads top and subida
		function getuserprovinceprofiles($member_id,$category){
			$name = array();
			$profile_ads=  DB::table('profile_ads')->select('province')->where('category', $category)->where(['member_id' =>$member_id])->groupBy('province')->get();			
			foreach($profile_ads as $data){				
				$province = DB::table('province')
				->where('id', $data->province)		
						
				->first();
				$name[] = array('name'=>$province->name);
			}
			return ($name);			
		} 
		
		
		function checkmemberCategory($member_id,$agency_category){
			$profile = DB::table('members')				
				 ->where('agency_category',  'like', '%' .$agency_category. '%')
			 ->where('id', $member_id)
			 ->count();					
			 return $profile;
			
		}
		
		function agency_contact_enquiry(){
			$profile = DB::table('agency_contact_enquiry')
			 ->where('seen', 0)
			 ->limit(5)
			 ->get();					
			 return $profile;
			
		}
		
		
		function AgencyLogo($member_id){
			$profile = DB::table('members')	
			->select('upload_logo')
			 ->where('id', $member_id)
			 ->first();
			 
			 if($profile){			
			  return $profile->upload_logo;			
			
				}else{
					 return '';
					 
				}
			
		}
		
		function individualLogo($member_id){
			$profile_ads = DB::table('profile_ads')
			->where('member_id', $member_id)
			->select('id','first_name','profile_pic')
			 ->first();
			 if($profile_ads){
				return $profile_ads->profile_pic;		
				}else{
				  return ''; 
				}
			
		}
		
			function favoritos_count(){
			$ip = request()->ip();			
			
			$favoritos = DB::table('favoritos')
			->where('ip', $ip)			
			 ->count();
			 return $favoritos;
		}

		function favoritos_check($profile_id){
			$ip = request()->ip();
			$favoritos = DB::table('favoritos')
			->where('ip', $ip)			
			->where('profile_id', $profile_id)			
			 ->count();
			 return $favoritos;
		}
		
		
		 function favoritos_list(){
			$ip = request()->ip();
			$favoritos = DB::table('favoritos')
			->leftJoin('profile_ads', 'profile_ads.id', '=', 'favoritos.profile_id')
			->select('profile_ads.id',	'profile_ads.profile_pic',	'profile_ads.population',	'profile_ads.first_name',	'profile_ads.province')	
			->where('ip', $ip)			
			 ->get();
			 return $favoritos;
		} 
		
		function createSlug($name=null){				
		$name = strtolower($name);		
		$search_string = trim($name);
		$search_string = preg_replace('/[^A-Za-z0-9-]+/', '-', $search_string);	
		return $search_string;
		}
		
		function visualizacionesTotal($profile_id){			
			$data = DB::table('visualizaciones')
			->where('profile_id', $profile_id)					
			->count();	
			return $data;
		}
		
		function piesepuertoTotal($profile_id){			
			$data = DB::table('top_subida_profile_lists')
			->where('profile_ads_id', $profile_id)					
			->sum('price');
			return $data;
		}
		
		function piesepuertoTotalTop($profile_id){			
			$data = DB::table('top_subida_profile_lists')
			->where('profile_ads_id', $profile_id)	
			->where('type', 'top')	
			->sum('price');	
			return $data;
		}
		
		function piesepuertoTotalSubida($profile_id){			
			$data = DB::table('top_subida_profile_lists')
			->where('profile_ads_id', $profile_id)	
			->where('type', 'subida')
			->sum('price');
			return $data;
		}
		
	/* 	function registrationAfterActiveTopAnuncio($profile_id){			
			$data = DB::table('top_subida_profile_on_off_status')
			->where('profile_ads_id', $profile_id)
			->where('type', 'top')
			->where('status', 'on')
			->count();
			return $data;
		}
		
		function registrationAfterGoneAutoSubida($profile_id){
		$data = DB::table('top_subida_profile_on_off_status')
		->where('profile_ads_id', $profile_id)
		->where('type', 'subida')
		->where('status', 'off')
		->count();
		return $data;
		} */
		function  registrationAfterActiveTopAnuncio_old($profile_id){	
			$today = date('Y-m-d');	
		$data = DB::table('piesepuerto')
		->where('type', 'top')
		
		->where('from_date', '<=', $today)
		->where('profile_ads_id', $profile_id)						
		->where('status', 1)
		->count();
		return $data;
		}
		function  registrationAfterActiveTopAnuncio($profile_id){	
		$top_subida_profile_lists = DB::table('top_subida_profile_lists')
		->where('profile_ads_id', $profile_id)
		->where('type', 'top')	
		->select('hours')
		->first();
		
		$top_zona_hours =  DB::table('top_zona_hours')
		->where('profile_ads_id',$profile_id)
		->select('hours')
		->first(); 
		if($top_zona_hours){
		$total = (int)($top_subida_profile_lists->hours/24);
		$leftHour = (int)($top_zona_hours->hours/24);
		$number = $total-$leftHour;
		return (int)$number;
		}else{
		return 0;
		}
		
		}
		
		function registrationAfterGoneAutoSubida($profile_id){
			$today = date('Y-m-d');
		 $sum = 0;
		 $data = DB::table('piesepuerto')
						 ->where('type', 'subida')
					
						->where('from_date', '<=', $today)
						 ->where('profile_ads_id', $profile_id)						
						 ->where('status', 1)
						->get();
						
				if($data){
					foreach($data as $value){
						$top_subida_profile =  DB::table('top_subida_profile_lists')		
						->where('profile_ads_id',$profile_id)
						->where('type', 'subida')
						->select('seen_daily')
						->first();
						 $sum+=  $top_subida_profile->seen_daily;
						}
				}
		return  $sum;
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
						
						function leadingZero($string){
								if (strlen($string)<2) {
									$length = 1;	
								return	'0'.$string;
								}else{
								return $string;
								}
						}
						
						// check profile ads top and subida
		function population($name){						
				$population = DB::table('population');
				$population->select('population.id','population.name','population.title','population.meta_title','population.meta_description','province.name as provinceName');
				$population ->leftJoin('province', 'province.id', '=', 'population.province_id');
				$population->where('population.name',  'like', '%' .$name. '%'); 		 
				$data =  $population->first();
				if($data){
				return $data->provinceName;
				}else{
				return '';
				}
		}		
		
		function seo($category){			
			$profile_ads=  DB::table('seo')->where('category', $category)->first();
			return  $profile_ads;
		}		
		
		// check profile ads top and subida
		function city_subcity_seo($city){			
			$profile_ads=  DB::table('province')
			 ->where('name',  'like', '%' .$city. '%')
			->first();
			if($profile_ads){
			return  $profile_ads;
			}else{
				$profile_ads=  DB::table('population')
			 ->where('name',  'like', '%' .$city. '%')
			->first();
			return  $profile_ads;
			}
			
		}
		
		function watermark($profile){			
			$stamp = imagecreatefrompng(public_path().'/front/images/watermark/watermark.png');
						$extension = strtolower(substr($profile, strrpos($profile, ".") + 1));
						switch ($extension)
						{
						case 'jpg':
						$im = imagecreatefromjpeg(public_path().'/uploads/profile_ads/'.$profile);
						break;
						case 'jpeg':
						$im = imagecreatefromjpeg(public_path().'/uploads/profile_ads/'.$profile);
						break;
						case 'png':
						$im = imagecreatefrompng(public_path().'/uploads/profile_ads/'.$profile);
						break;
						case 'gif':
						$im = imagecreatefromgif(public_path().'/uploads/profile_ads/'.$profile);
						break;
						default:
						die("Image is of unsupported type.");
						}
						
						// Set the margins for the stamp and get the height/width of the stamp image
						$marge_right = 10;
						$marge_bottom = 10;
						$sx = imagesx($stamp);
						$sy = imagesy($stamp);
						$imgx = imagesx($im);
						$imgy = imagesy($im);
						$img_w = imagesx($im);
						$img_h = imagesy($im);
						$wtrmrk_w = imagesx($stamp);
						$wtrmrk_h = imagesy($stamp);
						$centerX=round($imgx/2);
						$centerY=round($imgy/2);
					//	imagecopymerge($im, $stamp, (imagesx($im) - $sx)/2, (imagesy($im) - $sy)/2, 0, 0, imagesx($stamp), imagesy($stamp), 100);
						imagecopy($im, $stamp, (imagesx($im) - $sx)/2, (imagesy($im) - $sy)/2, 0, 0, imagesx($stamp), imagesy($stamp));
						$filename=  public_path().'/uploads/profile_ads/'.$profile;	
						switch ($extension)
						{
						case 'jpg':
						$im = imagejpeg($im, $filename);
						//imagedestroy($im); 
						break;
						case 'jpeg':
						$im = imagejpeg($im, $filename);
						//imagedestroy($im); 
						break;
						case 'png':
						$im = imagepng($im, $filename);
						//imagedestroy($im); 
						break;
						case 'gif':
						$im = imagegif($im, $filename);
						//imagedestroy($im); 
						break;
						default:
						die("Image is of unsupported type.");
						}			
		} 
		
		function utf_8($string){
		$replace = [
    '&lt;' => '', '&gt;' => '', '&#039;' => '', '&amp;' => '',
    '&quot;' => '', 'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'Ae',
    '&Auml;' => 'A', 'Å' => 'A', 'Ā' => 'A', 'Ą' => 'A', 'Ă' => 'A', 'Æ' => 'Ae',
    'Ç' => 'C', 'Ć' => 'C', 'Č' => 'C', 'Ĉ' => 'C', 'Ċ' => 'C', 'Ď' => 'D', 'Đ' => 'D',
    'Ð' => 'D', 'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E', 'Ē' => 'E',
    'Ę' => 'E', 'Ě' => 'E', 'Ĕ' => 'E', 'Ė' => 'E', 'Ĝ' => 'G', 'Ğ' => 'G',
    'Ġ' => 'G', 'Ģ' => 'G', 'Ĥ' => 'H', 'Ħ' => 'H', 'Ì' => 'I', 'Í' => 'I',
    'Î' => 'I', 'Ï' => 'I', 'Ī' => 'I', 'Ĩ' => 'I', 'Ĭ' => 'I', 'Į' => 'I',
    'İ' => 'I', 'Ĳ' => 'IJ', 'Ĵ' => 'J', 'Ķ' => 'K', 'Ł' => 'K', 'Ľ' => 'K',
    'Ĺ' => 'K', 'Ļ' => 'K', 'Ŀ' => 'K', 'Ñ' => 'N', 'Ń' => 'N', 'Ň' => 'N',
    'Ņ' => 'N', 'Ŋ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O',
    'Ö' => 'Oe', '&Ouml;' => 'Oe', 'Ø' => 'O', 'Ō' => 'O', 'Ő' => 'O', 'Ŏ' => 'O',
    'Œ' => 'OE', 'Ŕ' => 'R', 'Ř' => 'R', 'Ŗ' => 'R', 'Ś' => 'S', 'Š' => 'S',
    'Ş' => 'S', 'Ŝ' => 'S', 'Ș' => 'S', 'Ť' => 'T', 'Ţ' => 'T', 'Ŧ' => 'T',
    'Ț' => 'T', 'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'Ue', 'Ū' => 'U',
    '&Uuml;' => 'Ue', 'Ů' => 'U', 'Ű' => 'U', 'Ŭ' => 'U', 'Ũ' => 'U', 'Ų' => 'U',
    'Ŵ' => 'W', 'Ý' => 'Y', 'Ŷ' => 'Y', 'Ÿ' => 'Y', 'Ź' => 'Z', 'Ž' => 'Z',
    'Ż' => 'Z', 'Þ' => 'T', 'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a',
    'ä' => 'ae', '&auml;' => 'ae', 'å' => 'a', 'ā' => 'a', 'ą' => 'a', 'ă' => 'a',
    'æ' => 'ae', 'ç' => 'c', 'ć' => 'c', 'č' => 'c', 'ĉ' => 'c', 'ċ' => 'c',
    'ď' => 'd', 'đ' => 'd', 'ð' => 'd', 'è' => 'e', 'é' => 'e', 'ê' => 'e',
    'ë' => 'e', 'ē' => 'e', 'ę' => 'e', 'ě' => 'e', 'ĕ' => 'e', 'ė' => 'e',
    'ƒ' => 'f', 'ĝ' => 'g', 'ğ' => 'g', 'ġ' => 'g', 'ģ' => 'g', 'ĥ' => 'h',
    'ħ' => 'h', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i', 'ī' => 'i',
    'ĩ' => 'i', 'ĭ' => 'i', 'į' => 'i', 'ı' => 'i', 'ĳ' => 'ij', 'ĵ' => 'j',
    'ķ' => 'k', 'ĸ' => 'k', 'ł' => 'l', 'ľ' => 'l', 'ĺ' => 'l', 'ļ' => 'l',
    'ŀ' => 'l', 'ñ' => 'n', 'ń' => 'n', 'ň' => 'n', 'ņ' => 'n', 'ŉ' => 'n',
    'ŋ' => 'n', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o', 'ö' => 'oe',
    '&ouml;' => 'oe', 'ø' => 'o', 'ō' => 'o', 'ő' => 'o', 'ŏ' => 'o', 'œ' => 'oe',
    'ŕ' => 'r', 'ř' => 'r', 'ŗ' => 'r', 'š' => 's', 'ù' => 'u', 'ú' => 'u',
    'û' => 'u', 'ü' => 'ue', 'ū' => 'u', '&uuml;' => 'ue', 'ů' => 'u', 'ű' => 'u',
    'ŭ' => 'u', 'ũ' => 'u', 'ų' => 'u', 'ŵ' => 'w', 'ý' => 'y', 'ÿ' => 'y',
    'ŷ' => 'y', 'ž' => 'z', 'ż' => 'z', 'ź' => 'z', 'þ' => 't', 'ß' => 'ss',
    'ſ' => 'ss', 'ый' => 'iy', 'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G',
    'Д' => 'D', 'Е' => 'E', 'Ё' => 'YO', 'Ж' => 'ZH', 'З' => 'Z', 'И' => 'I',
    'Й' => 'Y', 'К' => 'K', 'Л' => 'L', 'М' => 'M', 'Н' => 'N', 'О' => 'O',
    'П' => 'P', 'Р' => 'R', 'С' => 'S', 'Т' => 'T', 'У' => 'U', 'Ф' => 'F',
    'Х' => 'H', 'Ц' => 'C', 'Ч' => 'CH', 'Ш' => 'SH', 'Щ' => 'SCH', 'Ъ' => '',
    'Ы' => 'Y', 'Ь' => '', 'Э' => 'E', 'Ю' => 'YU', 'Я' => 'YA', 'а' => 'a',
    'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo',
    'ж' => 'zh', 'з' => 'z', 'и' => 'i', 'й' => 'y', 'к' => 'k', 'л' => 'l',
    'м' => 'm', 'н' => 'n', 'о' => 'o', 'п' => 'p', 'р' => 'r', 'с' => 's',
    'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c', 'ч' => 'ch',
    'ш' => 'sh', 'щ' => 'sch', 'ъ' => '', 'ы' => 'y', 'ь' => '', 'э' => 'e',
    'ю' => 'yu', 'я' => 'ya'
];

return  str_replace(array_keys($replace), $replace, $string);  
			}
			
			
?>