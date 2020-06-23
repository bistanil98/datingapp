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

class CronController  extends Controller
{
    
    public function __construct(){
        // there are only function allow same auth 		
		$this->middleware(SuperCustomer::class, ['except' => ['top_zona']]);
		// Alternativly
		//$this->middleware('auth', ['except' => ['index', 'show']]);
    }

		public function top_zona(){	
			

		$today = date('Y-m-d');
		$now = date('Y-m-d');
		
		$top_zona = DB::table('top_subida_profile_lists')
			->leftJoin('profile_ads', 'profile_ads.id', '=', 'top_subida_profile_lists.profile_ads_id')
			->leftJoin('top_zona_hours', 'top_zona_hours.profile_ads_id', '=', 'profile_ads.id')
			->select('top_subida_profile_lists.id as top_subida_profile_listsID','top_subida_profile_lists.profile_ads_id',
			'profile_ads.id',
			'profile_ads.member_id',
			'profile_ads.role',
			'profile_ads.title',
			'profile_ads.profile_pic',
			'profile_ads.province',
			'profile_ads.age',
			'profile_ads.nationality',
			'top_zona_hours.hours',
			
			'profile_ads.category'
			)	
			->where('top_subida_profile_lists.type', 'top')
			->where('top_zona_hours.hours', '>', '0')
			->where('profile_ads.status', '1')
			->where('profile_ads.user_status', '1')			
			->where('top_subida_profile_lists.from_date', '<=', $now)
			->where('top_subida_profile_lists.to_date', '>=', $now)
			->get()
			->all();
			
			if(!empty($top_zona)){
						foreach($top_zona as $profile_ads){
							// new login hour base 
							$id = $profile_ads->profile_ads_id;
						 $top_zona_hours =  DB::table('top_zona_hours')
						->where('profile_ads_id',$id)
						->first(); 
						//dd($id);die;
						 $to = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $top_zona_hours->updated_at);
						 $from = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',  date('Y-m-d H:i:s'));			
						$diff_in_hours = $to->diffInHours($from);
						if($diff_in_hours>0){
						if($diff_in_hours >=$top_zona_hours->hours){
						DB::table('top_zona_hours')
							->where('profile_ads_id',$id)
							->update([							
							'type' =>'top',	
							'updated_at' =>date('Y-m-d H:i:s'),
							'profile_ads_id' =>$id,
							'hours' =>0                      
							]);
						}else{
						DB::table('top_zona_hours')
							->where('profile_ads_id',$id)
							->update([							
							'type' =>'top',	
							'updated_at' =>date('Y-m-d H:i:s'),
							'profile_ads_id' =>$id,
							'hours' =>$top_zona_hours->hours-$diff_in_hours                      
							]);
						}
							
						}
						}
			}
			$msg = "Cron Job Tst Email";
			mail("kumharprahlad90@gmail.com","Email Check",$msg); 
			echo "ok";die;
		}
		
}
