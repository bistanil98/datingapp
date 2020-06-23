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
		/* $hostname = getenv('HTTP_HOST');
		if($hostname=="localhost:7777"){			
		}else{
		$ipInfo = file_get_contents('http://ip-api.com/json/' . $ip);
		$ipInfo = json_decode($ipInfo);
		if(!empty($ipInfo)){
			$timezone = $ipInfo->timezone;		
			//date_default_timezone_set($timezone);
		}
		} */
		
		
		
        $data = compact('title');	
		$topLimit = 15;
		$intervelTime = 10;
		$now =  date('Y-m-d'); 
		$time =  date('H:i:s');		
		
		$start_time =  date('Y-m-d h:i:s');
		$end_time = \Carbon\Carbon::parse($start_time)->addSeconds($intervelTime)->format('Y-m-d h:i:s');
	
		
		
	
			$top_zona = DB::table('top_subida_profile_lists')
			->leftJoin('profile_ads', 'profile_ads.id', '=', 'top_subida_profile_lists.profile_ads_id')
			->select('top_subida_profile_lists.id as top_subida_profile_listsID','top_subida_profile_lists.profile_ads_id',
			'profile_ads.id',
			'profile_ads.member_id',
			'profile_ads.role',
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
			'profile_ads.member_id',
			'profile_ads.role',
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
				->where('type', 'top')	
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
			'profile_ads.member_id',
			'profile_ads.role',
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
			// delete evere 2 days ago ads
			//$yesterday = date("Y-m-d", strtotime( '-2 days' ) );
			//$countYesterday = DB::table('subida_ads_seen_history')->whereDate('created_at', $yesterday )->delete();
			// end every tow days ago ads delete
			$checkTotal  = DB::table('top_subida_profile_lists')
			->leftJoin('profile_ads', 'profile_ads.id', '=', 'top_subida_profile_lists.profile_ads_id')
			->leftJoin('subida_ads_seen_history', 'top_subida_profile_lists.profile_ads_id', '=', 'subida_ads_seen_history.ads_id')
			->select('top_subida_profile_lists.id as top_subida_profile_listsID','top_subida_profile_lists.profile_ads_id',
			'profile_ads.id',
			'profile_ads.member_id',
			'profile_ads.role',
			'profile_ads.profile_pic',
			'profile_ads.title',
			'profile_ads.province',
			'profile_ads.age',
			'profile_ads.nationality',			
			'profile_ads.category',
			'top_subida_profile_lists.seen_daily',
			'top_subida_profile_lists.from_date_time',
			'top_subida_profile_lists.to_date_time',
			'top_subida_profile_lists.seen_daily'
		//	DB::raw('IFNULL(COUNT(subida_ads_seen_history.id),0) AS balance')			
			)
			->where('top_subida_profile_lists.type', 'subida')
			->where('profile_ads.status', '1')
			->where('profile_ads.user_status_subida', '1')
			->where('profile_ads.category', $category)
		    ->where('top_subida_profile_lists.from_date', '<=', $now)
			->where('top_subida_profile_lists.to_date', '>=', $now)
			->where('top_subida_profile_lists.from_date_time', '<=', $time)
			->where('top_subida_profile_lists.to_date_time', '>=', $time) 
			//->whereRaw('subida_ads_seen_history.created_at < (NOW() - INTERVAL 30 MINUTE)')	
			->groupBy('profile_ads_id')			
			// ->having('balance','<',DB::raw('top_subida_profile_lists.seen_daily'))
			//->orderby('top_subida_profile_lists.from_date', '=', 'desc')
			//->orderByRaw('RAND()')
			->get();
				$subidaLimit = $checkTotal->count()-10;
			/* if($checkTotal->count() >= 75){
					$subidaLimit = $checkTotal->count()-5;
			}else{
					$subidaLimit = $checkTotal->count()-5;
			} */
			$subida  = DB::table('top_subida_profile_lists')
			->leftJoin('profile_ads', 'profile_ads.id', '=', 'top_subida_profile_lists.profile_ads_id')
			->leftJoin('subida_ads_seen_history', 'top_subida_profile_lists.profile_ads_id', '=', 'subida_ads_seen_history.ads_id')
			->select('top_subida_profile_lists.id as top_subida_profile_listsID','top_subida_profile_lists.profile_ads_id',
			'profile_ads.id',
			'profile_ads.member_id',
			'profile_ads.role',
			'profile_ads.profile_pic',
			'profile_ads.title',
			'profile_ads.province',
			'profile_ads.age',
			'profile_ads.nationality',			
			'profile_ads.category',
			'top_subida_profile_lists.seen_daily',
			'top_subida_profile_lists.from_date_time',
			'top_subida_profile_lists.to_date_time',
			'top_subida_profile_lists.seen_daily',
			DB::raw('IFNULL(COUNT(subida_ads_seen_history.id),0) AS balance')			
			)
			->where('top_subida_profile_lists.type', 'subida')
			->where('profile_ads.status', '1')
			->where('profile_ads.user_status_subida', '1')
			->where('profile_ads.category', $category)
		    ->where('top_subida_profile_lists.from_date', '<=', $now)
			->where('top_subida_profile_lists.to_date', '>=', $now)
			->where('top_subida_profile_lists.from_date_time', '<=', $time)
			->where('top_subida_profile_lists.to_date_time', '>=', $time)
			//->whereRaw('subida_ads_seen_history.created_at < (NOW() - INTERVAL 30 MINUTE)')	
			->groupBy('profile_ads_id')			
			// ->having('balance','<',DB::raw('top_subida_profile_lists.seen_daily'))
			->orderby('top_subida_profile_lists.from_date', '=', 'desc')
			->orderByRaw('RAND()')
			->limit($subidaLimit)
			->get()
			->all();	
			
			// there are check @count 
			$subida_records = round(count($subida)/$subidaLimit);		
			// there are check already records
			$subida_ads_seen_history = DB::table('ads_seen_history')			
			->orderby('id', '=', 'desc')
			->where('ip_address', $ip)
			->where('start_time', '<=', $start_time)
			->where('end_time', '>=', $start_time)
			->where('type', 'subida')
			->limit(1)
			->first();
			
			if($subida_ads_seen_history!=null){					
			  $ads_id = explode(',',$subida_ads_seen_history->ads_id);			
			  $ads_id2 = explode(',',$subida_ads_seen_history->ads_id2);			
			  $ads_id3 = explode(',',$subida_ads_seen_history->ads_id3);			
			  $ads_id4 = explode(',',$subida_ads_seen_history->ads_id4);			
			  $GETId = array_merge($ads_id, $ads_id2, $ads_id3, $ads_id4);
				$subida = DB::table('top_subida_profile_lists')
				->leftJoin('profile_ads', 'profile_ads.id', '=', 'top_subida_profile_lists.profile_ads_id')
				->select('top_subida_profile_lists.id as top_subida_profile_listsID','top_subida_profile_lists.profile_ads_id',
				'profile_ads.id',
				'profile_ads.member_id',
				'profile_ads.role',
				'profile_ads.title',
				'profile_ads.profile_pic',
				'profile_ads.province',
				'profile_ads.age',
				'profile_ads.nationality',				
				'profile_ads.category'
				)	
				->where('top_subida_profile_lists.type', 'subida')
				->where('profile_ads.status', '1')
				->where('profile_ads.user_status_subida', '1')
				->where('profile_ads.category', $category)
				->where('top_subida_profile_lists.from_date', '<=', $now)
				->where('top_subida_profile_lists.to_date', '>=', $now)
				->where('top_subida_profile_lists.from_date_time', '<=', $time)
				->where('top_subida_profile_lists.to_date_time', '>=', $time)
				->whereIn('profile_ads.id',   $GETId)				
				->get()
				->all();
			}else{
			
			// check and delete every grather then total row
			$subida_ads_seen_history_count = DB::table('ads_seen_history')			
			->orderby('id', '=', 'desc')
			->where('ip_address', $ip)	
			->where('type', 'subida')
			->first();
			
			
			// check already have a recods
			if($subida_ads_seen_history_count!=null){
			  
			  $ads_id = array_map('intval', explode(',', $subida_ads_seen_history_count->ads_id));
			  $ads_id2 = array_map('intval', explode(',', $subida_ads_seen_history_count->ads_id2));
			  $ads_id3 = array_map('intval', explode(',', $subida_ads_seen_history_count->ads_id3));
			  $ads_id4 = array_map('intval', explode(',', $subida_ads_seen_history_count->ads_id4));
			  $ads_id5 = array_map('intval', explode(',', $subida_ads_seen_history_count->ads_id5));
			  $ads_id6 = array_map('intval', explode(',', $subida_ads_seen_history_count->ads_id6));
			  $ads_id7 = array_map('intval', explode(',', $subida_ads_seen_history_count->ads_id7));
			  $ads_id8 = array_map('intval', explode(',', $subida_ads_seen_history_count->ads_id8));
			  $ads_id9 = array_map('intval', explode(',', $subida_ads_seen_history_count->ads_id9));
			  $ads_id10 = array_map('intval', explode(',', $subida_ads_seen_history_count->ads_id10));
			  $ads_id11 = array_map('intval', explode(',', $subida_ads_seen_history_count->ads_id11));
			  $ads_id12 = array_map('intval', explode(',', $subida_ads_seen_history_count->ads_id12));
			  $ads_id13 = array_map('intval', explode(',', $subida_ads_seen_history_count->ads_id13));
			  $ads_id14 = array_map('intval', explode(',', $subida_ads_seen_history_count->ads_id14));
			  $ads_id15 = array_map('intval', explode(',', $subida_ads_seen_history_count->ads_id15));
			
			 $GETId222 = array_merge(
			 $ads_id,
			 $ads_id2, 
			 $ads_id3,
			 $ads_id4,
			 $ads_id5,
			 $ads_id6,
			 $ads_id7,
			 $ads_id8,
			 $ads_id9,
			 $ads_id10,
			 $ads_id11,
			 $ads_id12,
			 $ads_id13,
			 $ads_id14,
			 $ads_id15
			 );			 
			$subida_check  = DB::table('top_subida_profile_lists')
			->leftJoin('profile_ads', 'profile_ads.id', '=', 'top_subida_profile_lists.profile_ads_id')
			->leftJoin('subida_ads_seen_history', 'top_subida_profile_lists.profile_ads_id', '=', 'subida_ads_seen_history.ads_id')
			->select('top_subida_profile_lists.id as top_subida_profile_listsID','top_subida_profile_lists.profile_ads_id',
			'profile_ads.id',
			'profile_ads.member_id',
			'profile_ads.role',
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
			->where('profile_ads.user_status_subida', '1')
			->where('profile_ads.category', $category)
		    ->where('top_subida_profile_lists.from_date', '<=', $now)
			->where('top_subida_profile_lists.to_date', '>=', $now)
			->where('top_subida_profile_lists.from_date_time', '<=', $time)
			->where('top_subida_profile_lists.to_date_time', '>=', $time)
			//->whereNotIn('profile_ads.id',   $ads_id)				
			->whereNotIn('profile_ads.id',   $GETId222)		
			//->where('subida_ads_seen_history.created_at', '>=', $this->getHour(DB::raw('top_subida_profile_lists.profile_ads_id')))
			
			->groupBy('profile_ads_id')
			//->having('balance','<',DB::raw('top_subida_profile_lists.seen_daily'))
			->orderby('top_subida_profile_lists.from_date', '=', 'desc')
			->limit(5)
			->get()
			->all();
			
					shuffle($ads_id);
					shuffle($ads_id2);
					shuffle($ads_id3);
					shuffle($ads_id4);
					shuffle($ads_id5);
					shuffle($ads_id6);
					shuffle($ads_id7);
					shuffle($ads_id8);
					shuffle($ads_id9);
					shuffle($ads_id10);
					shuffle($ads_id11);
					shuffle($ads_id12);
					shuffle($ads_id13);
					shuffle($ads_id14);
					shuffle($ads_id15);
				
					$ads_id_first = [];
					foreach ($subida_check as $plocations)
					{
					$ads_id_first[] = $plocations->id;
					}
					$IDS2 = implode(',', $ads_id_first);
					
					// INSERT LOG
			$AginStore = array_merge(
			$ads_id_first,
			$ads_id,
			$ads_id2,
			 $ads_id3,
			 $ads_id4,
			 $ads_id5,
			 $ads_id6,
			 $ads_id7,
			 $ads_id8,
			 $ads_id9,
			 $ads_id10,
			 $ads_id11,
			 $ads_id12,
			 $ads_id13,
			 $ads_id14);		
			
			$subidaStore = array();
			foreach($AginStore as $new){
			
				$subidaStore[]  = DB::table('top_subida_profile_lists')
			->leftJoin('profile_ads', 'profile_ads.id', '=', 'top_subida_profile_lists.profile_ads_id')
			->leftJoin('subida_ads_seen_history', 'top_subida_profile_lists.profile_ads_id', '=', 'subida_ads_seen_history.ads_id')
			->select('top_subida_profile_lists.id as top_subida_profile_listsID','top_subida_profile_lists.profile_ads_id',
			'profile_ads.id',
			'profile_ads.member_id',
			'profile_ads.role',
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
			->where('profile_ads.user_status_subida', '1')
			->where('profile_ads.category', $category)
		    ->where('top_subida_profile_lists.from_date', '<=', $now)
			->where('top_subida_profile_lists.to_date', '>=', $now)
			->where('top_subida_profile_lists.from_date_time', '<=', $time)
			->where('top_subida_profile_lists.to_date_time', '>=', $time)			
			->where('profile_ads.id',   $new)				
			->groupBy('profile_ads_id')
		//	->having('balance','<',DB::raw('top_subida_profile_lists.seen_daily'))
			//->limit($subidaLimit)
			->get()
			->first();
			
			}
			$subida_first = array_filter($subidaStore);
			
			// check ads balance
			$balance = $subidaLimit - count($subida_first);
			$new_merge = array_merge($GETId222,$ads_id_first);
			
			$last_subida = DB::table('top_subida_profile_lists')
				->leftJoin('profile_ads', 'profile_ads.id', '=', 'top_subida_profile_lists.profile_ads_id')
				->select('top_subida_profile_lists.id as top_subida_profile_listsID','top_subida_profile_lists.profile_ads_id',
				'profile_ads.id',
				'profile_ads.member_id',
				'profile_ads.role',
				'profile_ads.title',
				'profile_ads.profile_pic',
				'profile_ads.province',
				'profile_ads.age',
				'profile_ads.nationality',				
				'profile_ads.category'
				)	
				->where('top_subida_profile_lists.type', 'subida')
				->where('profile_ads.status', '1')
				->where('profile_ads.user_status_subida', '1')
				->where('profile_ads.category', $category)
				->where('top_subida_profile_lists.from_date', '<=', $now)
				->where('top_subida_profile_lists.to_date', '>=', $now)
				->where('top_subida_profile_lists.from_date_time', '<=', $time)
				->where('top_subida_profile_lists.to_date_time', '>=', $time)
				->whereNotIn('profile_ads.id',   $new_merge)	
				->limit($balance)
				->get()
				->all();
				
			$subida = array_merge($subida_first,$last_subida);
			
			
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
						$ads_seen_history_id_secondTime = DB::getPdo()->lastInsertid();;
						DB::table('ads_seen_history')
						->where('id',$ads_seen_history_id_secondTime)
						->update([		
						'ads_id2' => $subida_ads_seen_history_count->ads_id,		
						'ads_id3' => $subida_ads_seen_history_count->ads_id2,		
						'ads_id4' => $subida_ads_seen_history_count->ads_id3,		
						'ads_id5' => $subida_ads_seen_history_count->ads_id4,		
						'ads_id6' => $subida_ads_seen_history_count->ads_id5,		
						'ads_id7' => $subida_ads_seen_history_count->ads_id6,		
						'ads_id8' => $subida_ads_seen_history_count->ads_id7,		
						'ads_id9' => $subida_ads_seen_history_count->ads_id8,		
						'ads_id10' => $subida_ads_seen_history_count->ads_id9,		
						'ads_id11' => $subida_ads_seen_history_count->ads_id10,		
						'ads_id12' => $subida_ads_seen_history_count->ads_id11,		
						'ads_id13' => $subida_ads_seen_history_count->ads_id12,		
						'ads_id14' => $subida_ads_seen_history_count->ads_id13,		
						'ads_id15' => $subida_ads_seen_history_count->ads_id14
						]);
						
						foreach($AginStore as $ads_id_new){
									DB::table('subida_ads_seen_history')	
									->insert([									
									'ip_address' =>$ip,	
									'ads_id' =>$ads_id_new,																			
									'created_at'=>$start_time,
									]);
									
						}

					}
					// END
					
				}else{
				// store ids with show
				$ads_id = [];
				foreach ($subida as $plocations){
				$ads_id[] = $plocations->id;
				}
				$IDS = implode(',', $ads_id);
				$idsStore = explode(',',$IDS) ;
				
				$partition = $this->partition($idsStore, 5);
				
				if(array_key_exists(0, $partition) == true){
				$ads_id1 = implode(',', $partition[0]); 
				}else{
				$ads_id1 = '';
				}
				
				if(array_key_exists(1, $partition) == true){
				$ads_id2 = implode(',', $partition[1]);
				}else{
				$ads_id2 = '';
				}
				
				if(array_key_exists(2, $partition) == true){
				$ads_id3 = implode(',', $partition[2]); 
				}else{
				$ads_id3 = '';
				}
				
				if(array_key_exists(3, $partition) == true){
				$ads_id4 = implode(',', $partition[3]); 
				}else{
				$ads_id4 = '';
				}
				
				if(array_key_exists(4, $partition) == true){
				$ads_id5 = implode(',', $partition[4]); 
				}else{
				$ads_id5 = '';
				}
				if(array_key_exists(5, $partition) == true){
				$ads_id6 = implode(',', $partition[5]); 
				}else{
				$ads_id6 = '';
				}
				
				if(array_key_exists(6, $partition) == true){
				$ads_id7 = implode(',', $partition[6]); 
				}else{
				$ads_id7 = '';
				}
				
				if(array_key_exists(7, $partition) == true){
				$ads_id8 = implode(',', $partition[7]); 
				}else{
				$ads_id8 = '';
				}
				
				if(array_key_exists(8, $partition) == true){
				$ads_id9 = implode(',', $partition[8]); 
				}else{
				$ads_id9 = '';
				}
				
				if(array_key_exists(9, $partition) == true){
				$ads_id10 = implode(',', $partition[9]); 
				}else{
				$ads_id10 = '';
				}
				
				if(array_key_exists(10, $partition) == true){
				$ads_id11 = implode(',', $partition[10]); 
				}else{
				$ads_id11 = '';
				}
					
				
				if(array_key_exists(11, $partition) == true){
				$ads_id12 = implode(',', $partition[11]); 
				}else{
				$ads_id12 = '';
				}
				
				if(array_key_exists(12, $partition) == true){
				$ads_id13 = implode(',', $partition[12]); 
				}else{
				$ads_id13 = '';
				}
				
				if(array_key_exists(13, $partition) == true){
				$ads_id14 = implode(',', $partition[13]); 
				}else{
				$ads_id14 = '';
				}
				
				if(array_key_exists(14, $partition) == true){
				$ads_id15 = implode(',', $partition[14]); 
				}else{
				$ads_id15 = '';
				}
				
			
			
					// INSERT LOG
					if(!empty($IDS)){					
						DB::table('ads_seen_history')	
						->insert(
						[
						'type' =>'subida',	
						'ip_address' =>$ip,	
						'ads_id' =>$ads_id1,	
						'start_time' =>$start_time,	
						'end_time' =>$end_time,	
						'created_at'=>$start_time			
						]);
						$ads_seen_history_id = DB::getPdo()->lastInsertid();;
						DB::table('ads_seen_history')
						->where('id',$ads_seen_history_id)
						->update([		
						'ads_id2' => $ads_id2,		
						'ads_id3' => $ads_id3,		
						'ads_id4' => $ads_id4,		
						'ads_id5' => $ads_id5,		
						'ads_id6' => $ads_id6,		
						'ads_id7' => $ads_id7,		
						'ads_id8' => $ads_id8,		
						'ads_id9' => $ads_id9,		
						'ads_id10' => $ads_id10,		
						'ads_id11' => $ads_id11,		
						'ads_id12' => $ads_id12,		
						'ads_id13' => $ads_id13,		
						'ads_id14' => $ads_id14,		
						'ads_id15' => $ads_id15
						]);
					
						foreach($idsStore as $ads_id){
									DB::table('subida_ads_seen_history')	
									->insert([									
									'ip_address' =>$ip,	
									'ads_id' =>$ads_id,																			
									'created_at'=>$start_time,
									]);
									
							}
					}
						// END
					
				}
			}
			$subidaIds = [];
			foreach ($subida as $subidaData)
			{
				$subidaIds[] = $subidaData->id;
			}
			$top_zonaIds = [];
			foreach ($top_zona as $top_zonaData)
			{
				$top_zonaIds[] = $top_zonaData->id;
			}
			
		// free ad autosubida ads and get_subida_going_address
		
			/// END Going Address
			/*-----------------start free ads----------------*/
			/* $freeAdscheck =  DB::table('top_subida_profile_lists')	
			->select('profile_ads_id')	
			->groupBy('profile_ads_id')	
			->get();
			$free_ads_id = [];
			foreach ($freeAdscheck as $free)
			{
			$free_ads_id[] = $free->profile_ads_id;
			}
			//	$storeFree = implode(',', $free_ads_id);
			$freeAds =  DB::table('profile_ads')
			->leftJoin('top_subida_profile_lists', 'profile_ads.id', '!=', 'top_subida_profile_lists.profile_ads_id')
			->select('profile_ads.id',
			'profile_ads.title',
			'profile_ads.profile_pic',
			'profile_ads.province',
			'profile_ads.age',
			'profile_ads.nationality',			
			'profile_ads.category'
			)	
			->where('profile_ads.status', '1')
			->where('profile_ads.user_status', '1')
			->where('profile_ads.category', $category)
			->whereNotIn('profile_ads.id',   $free_ads_id)		
			->orderby('profile_ads.created_at', '=', 'desc')
			->first(); */
			$FreeEscorts =  DB::table('profile_ads')
			->leftJoin('top_subida_profile_lists', 'profile_ads.id', '!=', 'top_subida_profile_lists.profile_ads_id')
			->select('profile_ads.id','top_subida_profile_lists.id as top_subida_profile_listsID',
			'profile_ads.title',
			'profile_ads.member_id',
			'profile_ads.role',
			'profile_ads.profile_pic',
			'profile_ads.province',
			'profile_ads.age',
			'profile_ads.nationality',			
			'profile_ads.category'
			)	
			//->where('top_subida_profile_lists.type', 'subida')
			->where('profile_ads.status', '1')
			->where('profile_ads.user_status_subida', '1')
			->where('profile_ads.user_status', '1')
			->where('profile_ads.category', $category)
			->whereNotIn('profile_ads.id',   $subidaIds)	
				->whereNotIn('profile_ads.id',   $top_zonaIds)	
			->orderby('profile_ads.created_at', '=', 'desc')
		//	->orderByRaw('RAND()')		
			->limit(1)
			->get()
			->all();
			
			$freeAds = [];
			foreach ($FreeEscorts as $FreeEscortsData)
			{
				$freeAds[] = $FreeEscortsData->id;
			}
			
			$get_subida_going_4Ads  = DB::table('profile_ads')
			->leftJoin('top_subida_profile_lists', 'profile_ads.id', '=', 'top_subida_profile_lists.profile_ads_id')
			//->leftJoin('subida_ads_seen_history', 'top_subida_profile_lists.profile_ads_id', '=', 'subida_ads_seen_history.ads_id')
			->select('top_subida_profile_lists.id as top_subida_profile_listsID','top_subida_profile_lists.profile_ads_id',
			'profile_ads.id',
			'profile_ads.member_id',
			'profile_ads.role',
			'profile_ads.profile_pic',
			'profile_ads.title',
			'profile_ads.province',
			'profile_ads.age',
			'profile_ads.nationality',			
			'profile_ads.category'		
			)
		//	->where('top_subida_profile_lists.type', 'subida')
			->where('profile_ads.status', '1')
			->where('profile_ads.user_status_subida', '1')
			->where('profile_ads.user_status', '1')
			->whereNotIn('profile_ads.id',   $subidaIds)	
				->whereNotIn('profile_ads.id',   $top_zonaIds)	
			->whereNotIn('profile_ads.id',   $freeAds)	
			->where('profile_ads.category', $category)
			
			->orderByRaw('RAND()')		
			->limit(4)
			->get()
			->all();
			
			$get_subida_going_4AdsIds = [];
			foreach ($get_subida_going_4Ads as $get_subida_going_4AdsData)
			{
				$get_subida_going_4AdsIds[] = $get_subida_going_4AdsData->id;
			}
				$get_subida_going_address  = DB::table('profile_ads')
			->leftJoin('top_subida_profile_lists', 'profile_ads.id', '=', 'top_subida_profile_lists.profile_ads_id')
			//->leftJoin('subida_ads_seen_history', 'top_subida_profile_lists.profile_ads_id', '=', 'subida_ads_seen_history.ads_id')
			->select('top_subida_profile_lists.id as top_subida_profile_listsID','top_subida_profile_lists.profile_ads_id',
			'profile_ads.id',
			'profile_ads.member_id',
			'profile_ads.role',
			'profile_ads.profile_pic',
			'profile_ads.title',
			'profile_ads.province',
			'profile_ads.age',
			'profile_ads.nationality',			
			'profile_ads.category'		
			)
			//->where('top_subida_profile_lists.type', 'subida')
			->where('profile_ads.status', '1')
			->whereNotIn('profile_ads.id',   $subidaIds)	
				->whereNotIn('profile_ads.id',   $top_zonaIds)	
			->whereNotIn('profile_ads.id',   $get_subida_going_4AdsIds)	
			->whereNotIn('profile_ads.id',   $freeAds)	
			->where('profile_ads.user_status_subida', '1')
			->where('profile_ads.user_status', '1')
			->where('profile_ads.category', $category)
			->orderByRaw('RAND()')	
			
			->get();		
			
			//////////ESCORT FREEEEEE
		$AutoSubidasEscortsIDS = DB::table('top_subida_profile_lists')
		->select('top_subida_profile_lists.profile_ads_id')
		->join('profile_ads', 'profile_ads.id', '=', 'top_subida_profile_lists.profile_ads_id')		
		->where('profile_ads.category', $category)
		 ->groupBy('top_subida_profile_lists.profile_ads_id')
		->get();
		
		$AutoSubidasEscortsIDSListStore = [];
		foreach ($AutoSubidasEscortsIDS as $AutoSubidasEscortsIDSList)
		{
		$AutoSubidasEscortsIDSListStore[] = $AutoSubidasEscortsIDSList->profile_ads_id;
		}
		//	dd($AutoSubidasEscortsIDSListStore);die;
		
		//	dd($FreeEscorts);die;
			$line_16_ads = array_merge($FreeEscorts, $get_subida_going_4Ads);		
			shuffle($line_16_ads); 
			//END ESCORT FREEE
			
				//dd($line_16_ads);die;
		
			//'freeAds'=>$freeAds
			/*-----------------start free ads----------------*/
        return view('front.search.index',['top_zona'=>$top_zona,'subida'=>$subida,'category'=>$category,'get_subida_going_address'=>$get_subida_going_address,'line_16_ads'=>$line_16_ads],$data); 
    }

	 public function agencia($member_id)  { 	
			
			$h1_title = "Escorts y putas agencia en España";   
			$meta_title = "Escorts y putas agencia en España";   
			$meta_description = "Escorts y putas agencia en España";  
		$title = "Escorts y putas agencia en España";   		
       $data = array(
		'title'=>rawurldecode($title),
		'h1_title'=>rawurldecode($h1_title),
		'meta_title'=>rawurldecode($meta_title),
		'meta_description'=>rawurldecode($meta_description),
		);		
		$category = '';			
		
		$top_zona_query = DB::table('top_subida_profile_lists');
		$top_zona_query->leftJoin('profile_ads', 'profile_ads.id', '=', 'top_subida_profile_lists.profile_ads_id');
		$top_zona_query->leftJoin('tariffs', 'tariffs.profile_id', '=', 'profile_ads.id');
		$top_zona_query->leftJoin('schedule', 'schedule.profile_ads_id', '=', 'profile_ads.id');
		$top_zona_query->select('profile_ads.role','profile_ads.member_id','profile_ads.created_at','tariffs.tariffs_euro_price','top_subida_profile_lists.id as top_subida_profile_listsID','top_subida_profile_lists.type','top_subida_profile_lists.profile_ads_id','profile_ads.*');
		$top_zona_query->where('top_subida_profile_lists.type', 'top');
		$top_zona_query->where('profile_ads.status', '1');		
		$top_zona_query->where('profile_ads.member_id', $member_id);	 
		$top_zona_query->where('profile_ads.user_status', '1');		
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
		
		$subida_query->where('top_subida_profile_lists.type', 'subida');
		$subida_query->where('profile_ads.status', '1');		
		$subida_query->where('profile_ads.user_status_subida', '1');
		$subida_query->where('profile_ads.member_id', $member_id);	 	
		$subida_query->groupBy('top_subida_profile_lists.profile_ads_id');
		$subida_query->orderby('top_subida_profile_lists.id', '=', 'desc');	
		$subida = $subida_query->get();
		$subida_count = $subida_query->count();	
		
		$subidaIds = [];
			foreach ($subida as $subidaData)
			{
				$subidaIds[] = $subidaData->id;
			}
			
			$top_zonaIds = [];
			foreach ($top_zona as $top_zonaData)
			{
				$top_zonaIds[] = $top_zonaData->id;
			}
			
		$top_zona_query = DB::table('profile_ads');
			$top_zona_query->leftJoin('top_subida_profile_lists', 'profile_ads.id', '=', 'top_subida_profile_lists.profile_ads_id');
			$top_zona_query->leftJoin('province', 'province.id', '=', 'profile_ads.province');
			$top_zona_query->leftJoin('tariffs', 'tariffs.profile_id', '=', 'profile_ads.id');
			$top_zona_query->leftJoin('schedule', 'schedule.profile_ads_id', '=', 'profile_ads.id');
			$top_zona_query->select('top_subida_profile_lists.id as top_subida_profile_listsID','top_subida_profile_lists.profile_ads_id',
			'profile_ads.id',
			'province.name',
			'profile_ads.member_id',
			'profile_ads.population',
			'profile_ads.role',
			'profile_ads.title',
			'profile_ads.profile_pic',
			'profile_ads.province',
			'profile_ads.age',
			'profile_ads.nationality',			
			'profile_ads.category'
			);
		$top_zona_query->whereNotIn('profile_ads.id',   $subidaIds);
		$top_zona_query->whereNotIn('profile_ads.id',   $top_zonaIds);
		$top_zona_query->where('profile_ads.member_id', $member_id);	 	
		$top_zona_query->groupBy('profile_ads.id');
			$get_subida_going_address = $top_zona_query->get()->all();
		
        return view('front.search.index',['get_subida_going_address'=>$get_subida_going_address, 'top_zona'=>$top_zona,'subida'=>$subida,'category'=>$category,'agenciaId'=>$member_id,'agenciaId'=>$member_id],$data); 
		}
	
	
	public function setLocale($locale=null){	
		Session::put('lang', $locale);	
		return redirect(url(URL::previous()));
    }
	
	function partition(Array $list, $p) {
	$partition = array_chunk($list, $p);
    return $partition;
}

	function getHour($profile_ads_id) {			 	
			$timeslot  = DB::table('top_subida_profile_lists')
			->select('from_date_time','to_date_time','seen_daily')												
			->where('profile_ads_id', $profile_ads_id)
			->first();			
			$ts1 = strtotime($timeslot->from_date_time);
			$ts2 = strtotime($timeslot->to_date_time);
			$diff = abs($ts1 - $ts2) / 3600;
			if(!empty($diff) && $diff>0 && $timeslot->seen_daily>0){			
				return $diff/$timeslot->seen_daily;
			}else{
			return 0;
			}
			
}
	
		// @ view records function
		public function view($category ,$province, $population, $title, $id){
			$profile = DB::table('profile_ads')
			->where('profile_ads.id', $id)			
			->first();		
			$data = array(
			'title'=>rawurldecode($profile->title.' - '.$profile->telephone),
			'h1_title'=>rawurldecode($profile->title.' - '.$profile->telephone),
			'meta_title'=>rawurldecode($profile->title.' - '.$profile->telephone),
			'meta_description'=>rawurldecode($profile->text.' - '.$profile->telephone),
		);		
			return view('front.search.view',['data'=>$profile,'id'=>$id],$data);
		}
		


}
