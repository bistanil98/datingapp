<?php
	
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Session;
use URL;
use DB;
use Artisan;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('ClearViewCache');
		 Artisan::call('view:clear');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
	 
	 
    public function index($category='escorts')  { 	
		$title = "Locals to show around";   
		$ip = request()->ip();
	//	$ipInfo = file_get_contents('http://ip-api.com/json/' . $ip);
	//	$ipInfo = json_decode($ipInfo);
		//$timezone = $ipInfo->timezone;
		//date_default_timezone_set($timezone);
		
        $data = compact('title');	
		$topLimit = 15;
		$subidaLimit = 20;
		
		$intervelTime = 30;
		$now =  date('Y-m-d'); 
		$time =  date('H:i:s');		
		
		$start_time =  date('Y-m-d h:i:s');
		$end_time = \Carbon\Carbon::parse($start_time)->addSeconds($intervelTime)->format('Y-m-d h:i:s');
			$top_zona = DB::table('top_subida_profile_lists')
			->leftJoin('profile_ads', 'profile_ads.id', '=', 'top_subida_profile_lists.profile_ads_id')
			->select('top_subida_profile_lists.id as top_subida_profile_listsID','top_subida_profile_lists.profile_ads_id',
			'profile_ads.id',
			'profile_ads.title',
			'profile_ads.profile_pic',
			'profile_ads.province',
			'profile_ads.age',
			'profile_ads.nationality',
			
			'profile_ads.category'
			)	
				->where('top_subida_profile_lists.type', 'top')
					->where('profile_ads.status', '1')
					->where('profile_ads.user_status', '1')
			->where('profile_ads.category', $category)
			->where('top_subida_profile_lists.from_date', '<=', $now)
			->where('top_subida_profile_lists.to_date', '>=', $now)
			->orderByRaw('RAND()')
			->limit($topLimit)
			->get()
			->all();
			
			$top_zona_check = DB::table('top_subida_profile_lists')
			->leftJoin('profile_ads', 'profile_ads.id', '=', 'top_subida_profile_lists.profile_ads_id')			
				->where('top_subida_profile_lists.type', 'top')
					->where('profile_ads.status', '1')
					->where('profile_ads.user_status', '1')
			->where('profile_ads.category', $category)		
			->where('top_subida_profile_lists.from_date', '<=', $now)
			->where('top_subida_profile_lists.to_date', '>=', $now)
			->count();
			
			$top_zona_records = round($top_zona_check/$topLimit);
			
			
			$ads_id = [];
			foreach ($top_zona as $plocations)
			{
				$ads_id[] = $plocations->id;
			}
			$IDS = implode(',', $ads_id);
			
			
			
			$ads_seen_history_check = DB::table('ads_seen_history')			
			->orderby('id', '=', 'desc')
			->where('ip_address', $ip)
			->where('start_time', '<=', $start_time)
			->where('end_time', '>=', $start_time)
			->where('type', 'top')			
			->limit(1)
			->count();
			
			if($ads_seen_history_check>0){
			
			$ads_seen_history = DB::table('ads_seen_history')	
			->select('ads_id')
			->orderby('id', '=', 'desc')
			->where('ip_address', $ip)
			->where('start_time', '<=', $start_time)
			->where('end_time', '>=', $start_time)
			->where('type', 'top')
			->first();
			  $GETId = explode(',',$ads_seen_history->ads_id);			
				$top_zona = DB::table('top_subida_profile_lists')
				->leftJoin('profile_ads', 'profile_ads.id', '=', 'top_subida_profile_lists.profile_ads_id')
				->select('top_subida_profile_lists.id as top_subida_profile_listsID','top_subida_profile_lists.profile_ads_id',
			'profile_ads.id',
			'profile_ads.profile_pic',
				'profile_ads.title',
			'profile_ads.province',
			'profile_ads.age',
			'profile_ads.nationality',
			
			'profile_ads.category'
			)
					->where('top_subida_profile_lists.type', 'top')
					->where('profile_ads.status', '1')
					->where('profile_ads.user_status', '1')
				->where('profile_ads.category', $category)
				->where('top_subida_profile_lists.from_date', '<=', $now)
			->where('top_subida_profile_lists.to_date', '>=', $now)
				->whereIn('profile_ads.id',   $GETId)
					->orderByRaw('RAND()')
				->get()
				->all();
			}else{
			
			
			// check and delete every grather then total row
			$ads_seen_history_count = DB::table('ads_seen_history')	
			->select('ads_id')
			->orderby('id', '=', 'desc')
			->where('ip_address', $ip)	
			->where('type', 'top')
			->count();
			
			if($ads_seen_history_count>=$top_zona_records){			
				DB::table("ads_seen_history")
				->where('ip_address', $ip)	
				->orderby('id', '=', 'asc')			
				->delete();
			}
			
			if($ads_seen_history_count>0){
				
			
			
			// END check and delete every grather then total row
			 if($ads_seen_history_count>1){
			 
			$ads_seen_history = DB::table('ads_seen_history')	
			->select('ads_id')
			->orderby('id', '=', 'asc')
			->where('ip_address', $ip)	
			->where('type', 'top')
			->get();
			 }else{
			 	$ads_seen_history = DB::table('ads_seen_history')	
			->select('ads_id')
			->orderby('id', '=', 'asc')
			->where('ip_address', $ip)	
			->where('type', 'top')
			->get();
			 }
		
			
				$ads_id1 = [];
				foreach ($ads_seen_history as $plocations)
				{
				$ads_id1[] = $plocations->ads_id;
				}	
				
				
				$IDS = collect($ads_id1)->flatten(1)->groupBy('y')->toArray();
					$response_array = array();
					foreach ($ads_id1 as $post) {
						$response_array[] = $post;
					}
					
					$output = implode(" ", $response_array);
					$response_array2 = str_replace(' ',',',$output);
				    $GETId222 = explode(',',$response_array2);
					
					$top_zona = DB::table('top_subida_profile_lists')
					->leftJoin('profile_ads', 'profile_ads.id', '=', 'top_subida_profile_lists.profile_ads_id')
					->select('top_subida_profile_lists.id as top_subida_profile_listsID','top_subida_profile_lists.profile_ads_id',
			'profile_ads.id',
			'profile_ads.profile_pic',
				'profile_ads.title',
			'profile_ads.province',
			'profile_ads.age',
			'profile_ads.nationality',
			
			'profile_ads.category'
			)
					->where('top_subida_profile_lists.type', 'top')
					->where('profile_ads.status', '1')
					->where('profile_ads.user_status', '1')
					->where('profile_ads.category', $category)
					->where('top_subida_profile_lists.from_date', '<=', $now)
					->where('top_subida_profile_lists.to_date', '>=', $now)
					->whereNotIn('profile_ads.id',   $GETId222)				
					->limit($topLimit)
						->orderByRaw('RAND()')
					->get()
					->all();
					
					
				$ads_id3 = [];
					foreach ($top_zona as $plocations)
					{
					$ads_id3[] = $plocations->id;
					}
					$IDS2 = implode(',', $ads_id3);
					
					$ads_seen_history_count = DB::table('ads_seen_history')	
					->select('ads_id')
					->orderby('id', '=', 'desc')
					->where('ip_address', $ip)		
					->where('type', 'top')
					->count();
					// INSERT LOG
					if(!empty($IDS2)){
					DB::table('ads_seen_history')	
					->insert(
					[
					'type' =>'top',	
					'ip_address' =>$ip,	
					'ads_id' =>$IDS2,	
					'start_time' =>$start_time,	
					'end_time' =>$end_time,	
					'created_at'=>$start_time			
					]);
					}
					// END
					
				}else{
				
					// INSERT LOG
					if(!empty($IDS)){
					
						DB::table('ads_seen_history')	
						->insert(
						[
						'type' =>'top',	
						'ip_address' =>$ip,	
						'ads_id' =>$IDS,	
						'start_time' =>$start_time,	
						'end_time' =>$end_time,	
						'created_at'=>$start_time			
						]);
					}
						// END
					
				}
			}
			
			//// subida
			
			$subida  = DB::table('top_subida_profile_lists')
			->leftJoin('profile_ads', 'profile_ads.id', '=', 'top_subida_profile_lists.profile_ads_id')
			->leftJoin('subida_ads_seen_history', 'top_subida_profile_lists.profile_ads_id', '=', 'subida_ads_seen_history.ads_id')
			->select('top_subida_profile_lists.id as top_subida_profile_listsID','top_subida_profile_lists.profile_ads_id',
			'profile_ads.id',
			'profile_ads.profile_pic',
			'profile_ads.title',
			'profile_ads.province',
			'profile_ads.age',
			'profile_ads.nationality',			
			'profile_ads.category',
			'top_subida_profile_lists.seen_daily',
			DB::raw('IFNULL(COUNT(subida_ads_seen_history.id),0) AS balance')			
			)
			->where('top_subida_profile_lists.type', 'subida')
			->where('profile_ads.status', '1')
			->where('profile_ads.user_status', '1')
			->where('profile_ads.category', $category)
		    ->where('top_subida_profile_lists.from_date', '<=', $now)
			->where('top_subida_profile_lists.to_date', '>=', $now)
			->where('top_subida_profile_lists.from_date_time', '<=', $time)
			->where('top_subida_profile_lists.to_date_time', '>=', $time)
			//->whereRaw('subida_ads_seen_history.created_at < (NOW() - INTERVAL 30 MINUTE)')	
			->groupBy('profile_ads_id')			
			 ->having("balance","<",DB::raw("top_subida_profile_lists.seen_daily"))
			//->orderByRaw('RAND()')
			->limit($subidaLimit)
			->get()
			->all();
		/* 	foreach($subida as $data){
			$timeslot  = DB::table('top_subida_profile_lists')
			->select('from_date_time','to_date_time','seen_daily')												
			->where('profile_ads_id', $data->profile_ads_id)
			->first();	
		//	$a = \DateTime::createFromFormat('H:i', $timeslot->from_date_time);
		//	$b = \DateTime::createFromFormat('H:i', $timeslot->to_date_time);
			$ts1 = strtotime($timeslot->from_date_time);
$ts2 = strtotime($timeslot->to_date_time);
$diff = abs($ts1 - $ts2) / 3600;


		//	$interval = $a->diff($b);
		//	$hours    = ($interval->days * 24) + $interval->h
		//	+ ($interval->i / 60) + ($interval->s / 3600);
echo $data->profile_ads_id;
			var_dump($diff/$timeslot->seen_daily); // float(42.633333333333)
				dd($timeslot);
			}die;
			echo "<pre>";
			var_dump($subida);die; */
			
			$subida_check  = DB::table('top_subida_profile_lists')
			->leftJoin('profile_ads', 'profile_ads.id', '=', 'top_subida_profile_lists.profile_ads_id')
			->leftJoin('subida_ads_seen_history', 'top_subida_profile_lists.profile_ads_id', '=', 'subida_ads_seen_history.ads_id')
			->select('top_subida_profile_lists.id as top_subida_profile_listsID','top_subida_profile_lists.profile_ads_id',
			'profile_ads.id',
			'profile_ads.profile_pic',
			'profile_ads.title',
			'profile_ads.province',
			'profile_ads.age',
			'profile_ads.nationality',
			
			'profile_ads.category',
		  'top_subida_profile_lists.seen_daily',
			DB::raw('IFNULL(COUNT(subida_ads_seen_history.id),0) AS balance')
			)
			->where('top_subida_profile_lists.type', 'subida')
			->where('profile_ads.status', '1')
			->where('profile_ads.user_status', '1')
			->where('profile_ads.category', $category)
		    ->where('top_subida_profile_lists.from_date', '<=', $now)
			->where('top_subida_profile_lists.to_date', '>=', $now)
			->where('top_subida_profile_lists.from_date_time', '<=', $time)
			->where('top_subida_profile_lists.to_date_time', '>=', $time)
			//->whereRaw('subida_ads_seen_history.created_at < (NOW() - INTERVAL 30 MINUTE)')	
			->groupBy('profile_ads_id')
			->having("balance","<",DB::raw("top_subida_profile_lists.seen_daily"))
			->orderByRaw('RAND()')
			->limit($subidaLimit)
			->get()
			->count();
			
			$subida_records = round($subida_check/$subidaLimit);
			
		
			$ads_id = [];
			foreach ($subida as $plocations)
			{
				$ads_id[] = $plocations->id;
			}
			$IDS = implode(',', $ads_id);
			
			$subida_ads_seen_history_check = DB::table('ads_seen_history')			
			->orderby('id', '=', 'desc')
			->where('ip_address', $ip)
			->where('start_time', '<=', $start_time)
			->where('end_time', '>=', $start_time)
			->where('type', 'subida')
			->limit(1)
			->count();
			
			if($subida_ads_seen_history_check>0){
			
			$subida_ads_seen_history = DB::table('ads_seen_history')	
			->select('ads_id')
			->orderby('id', '=', 'desc')
			->where('ip_address', $ip)
			->where('start_time', '<=', $start_time)
			->where('end_time', '>=', $start_time)
			->where('type', 'subida')
			->first();
			  $GETId = explode(',',$subida_ads_seen_history->ads_id);			
				$subida = DB::table('top_subida_profile_lists')
				->leftJoin('profile_ads', 'profile_ads.id', '=', 'top_subida_profile_lists.profile_ads_id')
				->select('top_subida_profile_lists.id as top_subida_profile_listsID','top_subida_profile_lists.profile_ads_id',
				'profile_ads.id',
				'profile_ads.title',
				'profile_ads.profile_pic',
				'profile_ads.province',
				'profile_ads.age',
				'profile_ads.nationality',				
				'profile_ads.category'
				)	
				->where('top_subida_profile_lists.type', 'subida')
				->where('profile_ads.status', '1')
				->where('profile_ads.user_status', '1')
				->where('profile_ads.category', $category)
				->where('top_subida_profile_lists.from_date', '<=', $now)
				->where('top_subida_profile_lists.to_date', '>=', $now)
				->where('top_subida_profile_lists.from_date_time', '<=', $time)
				->where('top_subida_profile_lists.to_date_time', '>=', $time)
				->whereIn('profile_ads.id',   $GETId)
				//->orderByRaw('RAND()')
				->get()
				->all();
			}else{
			
			
			// check and delete every grather then total row
			$subida_ads_seen_history_count = DB::table('ads_seen_history')	
			->select('ads_id')
			->orderby('id', '=', 'desc')
			->where('ip_address', $ip)	
			->where('type', 'subida')
			->count();
			if($subida_ads_seen_history_count>=$subida_records){			
				 DB::table("ads_seen_history")
				->where('ip_address', $ip)	
				->orderby('id', '=', 'asc')	
				->where('type', 'subida')
				->delete(); 
			}
			
			if($subida_ads_seen_history_count>0){
				
			
			
			// END check and delete every grather then total row
			 if($subida_ads_seen_history_count>1){
			 
			$subida_ads_seen_history = DB::table('ads_seen_history')	
			->select('ads_id')
			->orderby('id', '=', 'asc')
			->where('ip_address', $ip)	
			->where('type', 'subida')
			->get();
			 }else{
			 	$subida_ads_seen_history = DB::table('ads_seen_history')	
			->select('ads_id')
			->orderby('id', '=', 'asc')
			->where('ip_address', $ip)
			->where('type', 'subida')
			->get();
			 }
		
			
				$ads_id1 = [];
				foreach ($subida_ads_seen_history as $plocations)
				{
				$ads_id1[] = $plocations->ads_id;
				}	
				
				
				$IDS = collect($ads_id1)->flatten(1)->groupBy('y')->toArray();
					$response_array = array();
					foreach ($ads_id1 as $post) {
						$response_array[] = $post;
					}
					
					$output = implode(" ", $response_array);
					$response_array2 = str_replace(' ',',',$output);
				    $GETId222 = explode(',',$response_array2);
					
					
					
					$subida  = DB::table('top_subida_profile_lists')
			->leftJoin('profile_ads', 'profile_ads.id', '=', 'top_subida_profile_lists.profile_ads_id')
			->leftJoin('subida_ads_seen_history', 'top_subida_profile_lists.profile_ads_id', '=', 'subida_ads_seen_history.ads_id')
			->select('top_subida_profile_lists.id as top_subida_profile_listsID','top_subida_profile_lists.profile_ads_id',
			'profile_ads.id',
			'profile_ads.profile_pic',
			'profile_ads.title',
			'profile_ads.province',
			'profile_ads.age',
			'profile_ads.nationality',
			
			'profile_ads.category',
			'top_subida_profile_lists.seen_daily',
			DB::raw('IFNULL(COUNT(subida_ads_seen_history.id),0) AS balance')
			)
			->where('top_subida_profile_lists.type', 'subida')
			->where('profile_ads.status', '1')
			->where('profile_ads.user_status', '1')
			->where('profile_ads.category', $category)
		    ->where('top_subida_profile_lists.from_date', '<=', $now)
			->where('top_subida_profile_lists.to_date', '>=', $now)
			->where('top_subida_profile_lists.from_date_time', '<=', $time)
			->where('top_subida_profile_lists.to_date_time', '>=', $time)
			->whereNotIn('profile_ads.id',   $GETId222)		
			//->whereRaw('subida_ads_seen_history.created_at < (NOW() - INTERVAL 30 MINUTE)')	
			->groupBy('profile_ads_id')
			->having("balance","<",DB::raw("top_subida_profile_lists.seen_daily"))
			//->orderByRaw('RAND()')
			->limit($subidaLimit)
			->get()
			->all();
					
					
				$ads_id3 = [];
					foreach ($subida as $plocations)
					{
					$ads_id3[] = $plocations->id;
					}
					$IDS2 = implode(',', $ads_id3);
					
					$subida_ads_seen_history_count = DB::table('ads_seen_history')	
					->select('ads_id')
					->orderby('id', '=', 'desc')
					->where('ip_address', $ip)				
					->where('type', 'subida')		
					->where('type', 'subida')
					->count();
					// INSERT LOG
					if(!empty($IDS2)){
					DB::table('ads_seen_history')	
					->insert(
					[
					'type' =>'subida',	
					'ip_address' =>$ip,	
					'ads_id' =>$IDS2,	
					'start_time' =>$start_time,	
					'end_time' =>$end_time,	
					'created_at'=>$start_time			
					]);
						foreach(explode(',',$IDS2) as $ads_id){
									DB::table('subida_ads_seen_history')	
									->insert(
									[									
									'ip_address' =>$ip,	
									'ads_id' =>$ads_id,																			
									'created_at'=>$start_time			
									]);
						}

					}
					// END
					
				}else{
				
					// INSERT LOG
					if(!empty($IDS)){
					
						DB::table('ads_seen_history')	
						->insert(
						[
						'type' =>'subida',	
						'ip_address' =>$ip,	
						'ads_id' =>$IDS,	
						'start_time' =>$start_time,	
						'end_time' =>$end_time,	
						'created_at'=>$start_time			
						]);
							
							foreach(explode(',',$IDS) as $ads_id){
								DB::table('subida_ads_seen_history')	
							->insert(
							[									
								'ip_address' =>$ip,	
								'ads_id' =>$ads_id,																			
								'created_at'=>$start_time			
							]);
							}
					}
						// END
					
				}
			}

	
        return view('front.search.index',['top_zona'=>$top_zona,'subida'=>$subida,'category'=>$category],$data); 
    }
	public function setLocale($locale=null){	
		Session::put('lang', $locale);	
		return redirect(url(URL::previous()));
    }
}
