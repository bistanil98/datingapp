<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\UsersTable;
use Session;use App\Http\Middleware\SuperAdmin;

class HomeController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return View
     */
	 
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
	
    public function home()  {
		$ActiveEscorts = DB::table('profile_ads')		
		->where('category',  'like', '%escorts%')
		->where('role',  'like', '%Individual%')
		//->where('status',  '1')
		->where('status',  '1')
		->count();
		
		// get 
		$TodayEscorts = DB::table('profile_ads')
		->where('category',  'like', '%escorts%')
		->where('role',  'like', '%Individual%')
		->where('status',  '1')
		->whereDate('created_at',  \Carbon\Carbon::today())		
		->count();
		
			if($TodayEscorts>0){
		$ActiveEscortsAddedd =  (round(($TodayEscorts/$ActiveEscorts),2)*100);
		}else{
		$ActiveEscortsAddedd =  0;
		}
		$LastEscorts = DB::table('profile_ads')
		->where('category',  'like', '%escorts%')
		->where('role',  'like', '%Individual%')
		->where('status',  '1')
		->where('created_at', '>=',  \Carbon\Carbon::now()->subDays(30)->toDateTimeString())		
		->count();		
		
			if($LastEscorts>0){
		$ActiveEscortsLastAddedd =  (round(($LastEscorts/$ActiveEscorts),2)*100);
		}else{
		$ActiveEscortsLastAddedd =  0;
		}
		// end
		
		
		$ActiveAgencies = DB::table('members')
		->where('role',  'Agency')
		->where('status',  '1')
		->where('is_email',  '1')
		->count();
		// get 
		$TodayAgencies = DB::table('members')
		->where('role',  'Agency')
		->where('status',  '1')		
		->whereDate('created_at',  \Carbon\Carbon::today())
		->where('is_email',  '1')
		->count();
		if($TodayAgencies>0){
		$ActiveAgenciesAddedd =  (round(($TodayAgencies/$ActiveAgencies),2)*100);
		}else{
		$ActiveAgenciesAddedd =  0;
		}
		
		
		$LastAgencies = DB::table('members')
		->where('role',  'Agency')
		->where('status',  '1')		
		->where('created_at', '>=',  \Carbon\Carbon::now()->subDays(30)->toDateTimeString())
		->where('is_email',  '1')
		->count();		
		if($LastAgencies>0){
		$ActiveAgenciesLastAddedd =  (round(($LastAgencies/$ActiveAgencies),2)*100);
		}else{
		$ActiveAgenciesLastAddedd =  0;
		}
		
		// end
	
		$BlockedAgencies = DB::table('members')
		->where('role',  'Agency')
		->where('status',  '0')
		->count();
		
		$PendingAgencies = DB::table('members')
		->where('role',  'Agency')		
		->where('is_email',  '0')
		->where('status',  '1')
		
		->count();
		
		// check multiple ids
		$checkMembers = DB::table('members');
		$checkMembers->select('members.id');
		$checkMembers->join('profile_ads', 'profile_ads.member_id', '=', 'members.id');
		$checkMembers->where('members.role',  'Individual');
		$getcheckMembers =  $checkMembers->get();
		$not_ids = [];
		foreach ($getcheckMembers as $plocations)
		{
		$not_ids[] = $plocations->id;
		}
		// end check multiple ids

		$PendingIndividuals = DB::table('members')
		->whereNotIn('members.id',   $not_ids)
		->where('members.role',  'Individual')		
		->count();		
		
		$ActiveChaperos = DB::table('profile_ads')		
		->where('category',  'like', '%chaperos%')
		->where('role',  'like', '%Individual%')
		->where('status',  '1')
		->count();
		
		// get 
		$TodayChaperos = DB::table('profile_ads')
		->where('category',  'like', '%chaperos%')
		->where('role',  'like', '%Individual%')
		->where('status',  '1')
		->whereDate('created_at',  \Carbon\Carbon::today())		
		->count();
			if($TodayChaperos>0){
		$ActiveChaperosAddedd = (round(($TodayChaperos/$ActiveChaperos),2)*100);
		}else{
		$ActiveChaperosAddedd =  0;
		}
		
		
		$LastChaperos = DB::table('profile_ads')
		->where('category',  'like', '%chaperos%')
		->where('role',  'like', '%Individual%')
		->where('status',  '1')
		->where('created_at', '>=',  \Carbon\Carbon::now()->subDays(30)->toDateTimeString())		
		->count();		
			if($LastChaperos>0){
		$ActiveChaperosLastAddedd =(round(($LastChaperos/$ActiveChaperos),2)*100);
		}else{
		$ActiveChaperosLastAddedd =  0;
		}
		
		
		// end
		
		$FreeAds = DB::table('profile_ads')		
		->where('role',  'Individual')
		->where('status',  '1')
		->count();
		
		$ActiveTravestis = DB::table('profile_ads')		
		->where('category',  'like', '%travestis%')
		->where('role',  'like', '%Individual%')
		->where('status',  '1')
		->count();
		
		// get 
		$TodayTravestis = DB::table('profile_ads')
		->where('category',  'like', '%travestis%')
		->where('role',  'like', '%Individual%')
		->where('status',  '1')
		->whereDate('created_at',  \Carbon\Carbon::today())		
		->count();
			if($TodayTravestis>0){
		$ActiveTravestisAddedd =  (round(($TodayTravestis/$ActiveTravestis),2)*100);
		}else{
		$ActiveTravestisAddedd =  0;
		}
		
		
		
		$LastTravestis = DB::table('profile_ads')
		->where('category',  'like', '%travestis%')
		->where('role',  'like', '%Individual%')
		->where('status',  '1')
		->where('created_at', '>=',  \Carbon\Carbon::now()->subDays(30)->toDateTimeString())		
		->count();	
		if($LastTravestis>0){
		$ActiveTravestisLastAddedd =  (round(($LastTravestis/$ActiveTravestis),2)*100);
		}else{
		$ActiveTravestisLastAddedd =  0;
		}
		
		// end
		
		
		$BlockedAnuncios = DB::table('profile_ads')
		->where('status',  '0')
		->count();
		
		$TopAnuncios = DB::table('top_subida_profile_lists')
		->where('type',  'top')
		->count();
		
		$TopAnunciosEscorts = DB::table('top_subida_profile_lists')
		->select('top_subida_profile_lists.*','profile_ads.category')
		->join('profile_ads', 'profile_ads.id', '=', 'top_subida_profile_lists.profile_ads_id')
		->where('top_subida_profile_lists.type',  'top')
		->where('role',  'like', '%Individual%')
		->where('profile_ads.category',  'escorts')
		->count();
		
		
		$TopAnunciosChaperos = DB::table('top_subida_profile_lists')
		->select('top_subida_profile_lists.*','profile_ads.category')
		->join('profile_ads', 'profile_ads.id', '=', 'top_subida_profile_lists.profile_ads_id')
		->where('top_subida_profile_lists.type',  'top')
		->where('role',  'like', '%Individual%')
		->where('profile_ads.category',  'chaperos')
		->count();
		
		$TopAnunciosTravestis = DB::table('top_subida_profile_lists')
		->select('top_subida_profile_lists.*','profile_ads.category')
		->join('profile_ads', 'profile_ads.id', '=', 'top_subida_profile_lists.profile_ads_id')
		->where('top_subida_profile_lists.type',  'top')
		->where('role',  'like', '%Individual%')
		->where('profile_ads.category',  'travestis')
		->count();
		
		
		$AutoSubidas = DB::table('top_subida_profile_lists')
		->where('type',  'subida')
		->count();
		
		$AutoSubidasEscorts = DB::table('top_subida_profile_lists')
		->select('top_subida_profile_lists.*','profile_ads.category')
		->join('profile_ads', 'profile_ads.id', '=', 'top_subida_profile_lists.profile_ads_id')
		->where('role',  'like', '%Individual%')
		->where('top_subida_profile_lists.type',  'subida')
		->where('profile_ads.category',  'escorts')
		->count();
		
		
		$AutoSubidasChaperos = DB::table('top_subida_profile_lists')
		->select('top_subida_profile_lists.*','profile_ads.category')
		->join('profile_ads', 'profile_ads.id', '=', 'top_subida_profile_lists.profile_ads_id')
		->where('top_subida_profile_lists.type',  'subida')
		->where('role',  'like', '%Individual%')
		->where('profile_ads.category',  'chaperos')
		->count();
		
		$AutoSubidasTravestis = DB::table('top_subida_profile_lists')
		->select('top_subida_profile_lists.*','profile_ads.category')
		->join('profile_ads', 'profile_ads.id', '=', 'top_subida_profile_lists.profile_ads_id')
		->where('top_subida_profile_lists.type',  'subida')
		->where('role',  'like', '%Individual%')
		->where('profile_ads.category',  'travestis')
		->count();
		
		
		$SelfiesCheck = DB::table('profile_ads')	
		->select('id')
		->get();
		$Selfies = 0;
		foreach($SelfiesCheck as $checkSelfi){
			$self_check  = self_check($checkSelfi->id);
			if($self_check>0){
				$Selfies +=$self_check;
			}
		}
		
		$EscortsSelfiesCheck = DB::table('profile_ads')
		->where('profile_ads.category',  'escorts')
		->select('id')
		->get();
		$SelfiesEscorts = 0;
		foreach($EscortsSelfiesCheck as $checkSelfi){
			$self_check  = self_check($checkSelfi->id);
			if($self_check>0){
				$SelfiesEscorts +=$self_check;
			}
			}
		
		$ChaperosSelfiesCheck = DB::table('profile_ads')	
		->where('profile_ads.category',  'chaperos')		
		->select('id')
		->get();
		$SelfiesChaperos = 0;
		foreach($ChaperosSelfiesCheck as $checkSelfi){
			$self_check  = self_check($checkSelfi->id);
			if($self_check>0){
				$SelfiesChaperos +=$self_check;
			}
		}
		
		$TravestisSelfiesCheck = DB::table('profile_ads')
		->where('profile_ads.category',  'travestis')
		->select('id')
		->get();
		$SelfiesTravestis = 0;
		foreach($TravestisSelfiesCheck as $checkSelfi){
			$self_check  = self_check($checkSelfi->id);
			if($self_check>0){
				$SelfiesTravestis +=$self_check;
			}
		}
		
		
	
		
		
		//////////ESCORT FREEEEEE
		$AutoSubidasEscortsIDS = DB::table('top_subida_profile_lists')
		->select('top_subida_profile_lists.profile_ads_id')
		->join('profile_ads', 'profile_ads.id', '=', 'top_subida_profile_lists.profile_ads_id')		
		->where('profile_ads.category',  'escorts')
		  ->groupBy('top_subida_profile_lists.profile_ads_id')
		->get();
		
		$AutoSubidasEscortsIDSListStore = [];
		foreach ($AutoSubidasEscortsIDS as $AutoSubidasEscortsIDSList)
		{
		$AutoSubidasEscortsIDSListStore[] = $AutoSubidasEscortsIDSList->profile_ads_id;
		}
		
		$FreeEscorts = DB::table('profile_ads')
		->where('profile_ads.category',  'escorts')
			->where('profile_ads.role',  'like', '%Individual%')
		->whereNotIn('profile_ads.id',   $AutoSubidasEscortsIDSListStore)
		->count();	
		//END ESCORT FREEE
		
		//////////Chaperos FREEEEEE
		$AutoSubidasChaperosIDS = DB::table('top_subida_profile_lists')
		->select('top_subida_profile_lists.profile_ads_id')
		->join('profile_ads', 'profile_ads.id', '=', 'top_subida_profile_lists.profile_ads_id')		
		->where('profile_ads.category',  'chaperos')
		  ->groupBy('top_subida_profile_lists.profile_ads_id')
		->get();
		
		$AutoSubidasChaperosIDSListStore = [];
		foreach ($AutoSubidasChaperosIDS as $AutoSubidasChaperosIDSList)
		{
		$AutoSubidasChaperosIDSListStore[] = $AutoSubidasChaperosIDSList->profile_ads_id;
		}
		
		$FreeChaperos = DB::table('profile_ads')
		->where('profile_ads.category',  'chaperos')
			->where('profile_ads.role',  'like', '%Individual%')
		->whereNotIn('profile_ads.id',   $AutoSubidasChaperosIDSListStore)
		->count();	
		//END Chaperos FREEE
		
		//////////Travestis FREEEEEE
		$AutoSubidasTravestisIDS = DB::table('top_subida_profile_lists')
		->select('top_subida_profile_lists.profile_ads_id')
		->join('profile_ads', 'profile_ads.id', '=', 'top_subida_profile_lists.profile_ads_id')
		
		->where('profile_ads.category',  'travestis')
		  ->groupBy('top_subida_profile_lists.profile_ads_id')
		->get();
		
		$AutoSubidasTravestisIDSListStore = [];
		foreach ($AutoSubidasTravestisIDS as $AutoSubidasTravestisIDSList)
		{
		$AutoSubidasTravestisIDSListStore[] = $AutoSubidasTravestisIDSList->profile_ads_id;
		}
		
		$FreeTravestis = DB::table('profile_ads')
		->where('profile_ads.category',  'travestis')
			->where('profile_ads.role',  'like', '%Individual%')
		->whereNotIn('profile_ads.id',   $AutoSubidasTravestisIDSListStore)
		->count();	
		//END travestis FREEE
		
		
		
		
		$PendingChaperos = DB::table('profile_ads')		
		->where('category',  'like', '%chaperos%')
		->where('status',  '0')
		->count();
		
		$PendingEscorts = DB::table('profile_ads')		
		->where('category',  'like', '%escorts%')
		->where('status',  '0')
		->count();
	
		
		$PendingTravestis = DB::table('profile_ads')		
		->where('category',  'like', '%travestis%')
		->where('status',  '0')
		->count();
		
		$EmailAccounts = DB::table('members')		
		->count();
		
		$TotalPieEscorts = DB::table('profile_ads')	
		//->where('status',  '1')
		->count();
		
		$PieEscorts = DB::table('profile_ads')		
		->where('category',  'like', '%escorts%')
		//->where('status',  '1')
		->count();
		
		$PieChaperos = DB::table('profile_ads')		
		->where('category',  'like', '%chaperos%')
		//->where('status',  '1')
		->count();
		
		$PieTravestis = DB::table('profile_ads')		
		->where('category',  'like', '%travestis%')
		//->where('status',  '1')
		->count();
		if($PieEscorts>0){
		$PieEscortsCount =  round ((($PieEscorts/$TotalPieEscorts)*100),2);
		}else{
		$PieEscortsCount =  0;
		}
		if($PieChaperos>0){
		$PieChaperosCount =  round ((($PieChaperos/$TotalPieEscorts)*100),2);
		}else{
		$PieChaperosCount =  0;
		}
		if($PieTravestis>0){
		$PieTravestisCount =  round ((($PieTravestis/$TotalPieEscorts)*100),2);
		}else{
		$PieTravestisCount =  0;
		}
		
		
		
		//////////
		$TotalPaying =  DB::table('top_subida_profile_lists')
		->whereYear('created_at', date('Y'))
		->count();		
		$Last60Paying =  DB::table('top_subida_profile_lists')		
		->where('created_at', '<=',  \Carbon\Carbon::now()->subDays(30)->toDateTimeString())		
		->where('created_at', '>=',  \Carbon\Carbon::now()->subDays(60)->toDateTimeString())		
		->count();	
		$Last30Paying =  DB::table('top_subida_profile_lists')				
		->where('created_at', '>=',  \Carbon\Carbon::now()->subDays(30)->toDateTimeString())	
		->count();		
		if($Last60Paying>0){
		$Last60PayingRate =  (round(($Last60Paying/$TotalPaying),2)*100);				
		}else{
		$Last60PayingRate =  0;
		}
		
		if($Last30Paying>0){
		$Last30PayingRate =  (round(($Last30Paying/$TotalPaying),2)*100);	
		}else{
		$Last30PayingRate =  0;
		}
			
			
		
		// end
		
		
			//////////
		$TotalSignup =  DB::table('member_signup_delete_history')
		->whereYear('created_at', date('Y'))
		->where('type', 'signup')
		->count();		
		$Last60Signup =  DB::table('member_signup_delete_history')		
		->where('type', 'signup')
		->where('created_at', '<=',  \Carbon\Carbon::now()->subDays(30)->toDateTimeString())		
		->where('created_at', '>=',  \Carbon\Carbon::now()->subDays(60)->toDateTimeString())		
		->count();	
		$Last30Signup =  DB::table('member_signup_delete_history')	
		->where('type', 'signup')
		->where('created_at', '>=',  \Carbon\Carbon::now()->subDays(30)->toDateTimeString())	
		->count();		
		if($Last60Signup>0){
		$Last60SignupRate =   (round(($Last60Signup/$TotalSignup),2)*100);	
		}else{
		$Last60SignupRate =  0;
		}
		
		if($Last30Signup>0){
		$Last30SignupRate =  (round(($Last30Signup/$TotalSignup),2)*100);	
		}else{
		$Last30SignupRate =  0;
		}
	
		
		// end
		
			//////////
		$TotalDelete =  DB::table('member_signup_delete_history')
		->whereYear('created_at', date('Y'))
		->where('type', 'delete')
		->count();		
		$Last60Delete =  DB::table('member_signup_delete_history')		
		->where('type', 'delete')
		->where('created_at', '<=',  \Carbon\Carbon::now()->subDays(30)->toDateTimeString())		
		->where('created_at', '>=',  \Carbon\Carbon::now()->subDays(60)->toDateTimeString())		
		->count();	
		$Last30Delete =  DB::table('member_signup_delete_history')	
		->where('type', 'delete')
		->where('created_at', '>=',  \Carbon\Carbon::now()->subDays(30)->toDateTimeString())	
		->count();		
		if($Last60Delete>0){
		$Last60DeleteRate =  (round(($Last60Delete/$TotalDelete),2)*100);	
		}else{
		$Last60DeleteRate =  0;
		}
		
		if($Last30Delete>0){
		$Last30DeleteRate =  (round(($Last30Delete/$TotalDelete),2)*100);	
		}else{
		$Last30DeleteRate =  0;
		}
	
		// end
		
		/////////only agaency add
		
			$AgencyTopAd = DB::table('top_subida_profile_lists')
			->select('top_subida_profile_lists.*','profile_ads.category')
			->join('profile_ads', 'profile_ads.id', '=', 'top_subida_profile_lists.profile_ads_id')
			->where('top_subida_profile_lists.type',  'top')
			//	->where('top_subida_profile_lists.type',  'subida')
			->where('profile_ads.role',  'like', '%Agency%')		
			->count();

			$TodayAgencyTopAd = DB::table('top_subida_profile_lists')
			->select('top_subida_profile_lists.*','profile_ads.category')
			->join('profile_ads', 'profile_ads.id', '=', 'top_subida_profile_lists.profile_ads_id')
			->where('top_subida_profile_lists.type',  'top')
			->whereDate('top_subida_profile_lists.created_at',  \Carbon\Carbon::today())		
			//	->where('top_subida_profile_lists.type',  'subida')
			->where('profile_ads.role',  'like', '%Agency%')		
			->count();

			$LastTodayAgencyTopAd = DB::table('top_subida_profile_lists')
			->select('top_subida_profile_lists.*','profile_ads.category')
			->join('profile_ads', 'profile_ads.id', '=', 'top_subida_profile_lists.profile_ads_id')
			->where('top_subida_profile_lists.type',  'top')
			->where('top_subida_profile_lists.created_at', '>=',  \Carbon\Carbon::now()->subDays(30)->toDateTimeString())		
			//	->where('top_subida_profile_lists.type',  'subida')
			->where('profile_ads.role',  'like', '%Agency%')		
			->count();
		if($TodayAgencyTopAd>0){
		$AgencyTopAdAddedd =   (round(($TodayAgencyTopAd/$AgencyTopAd),2)*100);	
		}else{
		$AgencyTopAdAddedd =  0;
		}
		
		if($LastTodayAgencyTopAd>0){
		$AgencyTopAdLastAddedd =  (round(($LastTodayAgencyTopAd/$AgencyTopAd),2)*100);
		}else{
		$AgencyTopAdLastAddedd =  0;
		}
		
		
		$AgencySubidaAd = DB::table('top_subida_profile_lists')
			->select('top_subida_profile_lists.*','profile_ads.category')
			->join('profile_ads', 'profile_ads.id', '=', 'top_subida_profile_lists.profile_ads_id')			
				->where('top_subida_profile_lists.type',  'subida')
			->where('profile_ads.role',  'like', '%Agency%')		
			->count();

			$TodayAgencySubidaAd = DB::table('top_subida_profile_lists')
			->select('top_subida_profile_lists.*','profile_ads.category')
			->join('profile_ads', 'profile_ads.id', '=', 'top_subida_profile_lists.profile_ads_id')
				->where('top_subida_profile_lists.type',  'subida')
			->whereDate('top_subida_profile_lists.created_at',  \Carbon\Carbon::today())	
			->where('profile_ads.role',  'like', '%Agency%')		
			->count();

			$LastTodayAgencySubidaAd = DB::table('top_subida_profile_lists')
			->select('top_subida_profile_lists.*','profile_ads.category')
			->join('profile_ads', 'profile_ads.id', '=', 'top_subida_profile_lists.profile_ads_id')
				->where('top_subida_profile_lists.type',  'subida')
			->where('top_subida_profile_lists.created_at', '>=',  \Carbon\Carbon::now()->subDays(30)->toDateTimeString())					
			->where('profile_ads.role',  'like', '%Agency%')		
			->count();
		if($TodayAgencySubidaAd>0){
		$AgencySubidaAdAddedd =  (round(($TodayAgencySubidaAd/$AgencySubidaAd),2)*100);
		}else{
		$AgencySubidaAdAddedd =  0;
		}
		
		if($LastTodayAgencySubidaAd>0){
		$AgencySubidaAdLastAddedd =  (round(($LastTodayAgencySubidaAd/$AgencySubidaAd),2)*100);
		}else{
		$AgencySubidaAdLastAddedd =  0;
		}
		
		
		
		
		//////////ESCORT FREEEEEE
		$AutoSubidasEscortsIDS22 = DB::table('top_subida_profile_lists')
		->select('top_subida_profile_lists.profile_ads_id')
		->join('profile_ads', 'profile_ads.id', '=', 'top_subida_profile_lists.profile_ads_id')		
		->where('profile_ads.role',  'like', '%Agency%')
		  ->groupBy('top_subida_profile_lists.profile_ads_id')
		->get();
		
		$AutoSubidasEscortsIDSListStore22 = [];
		foreach ($AutoSubidasEscortsIDS22 as $AutoSubidasEscortsIDSList22)
		{
		$AutoSubidasEscortsIDSListStore22[] = $AutoSubidasEscortsIDSList22->profile_ads_id;
		}
		
		$FreeAdAgency = DB::table('profile_ads')		
		->where('profile_ads.role',  'like', '%Agency%')		
		->whereNotIn('profile_ads.id',   $AutoSubidasEscortsIDSListStore22)
		->count();	
		
		$TodayAgencyFreeAd = DB::table('profile_ads')
			->whereNotIn('profile_ads.id',   $AutoSubidasEscortsIDSListStore22)
			->whereDate('profile_ads.created_at',  \Carbon\Carbon::today())	
			->where('profile_ads.role',  'like', '%Agency%')		
			->count();
			$LastTodayAgencyFreeAd = DB::table('profile_ads')
			->whereNotIn('profile_ads.id',   $AutoSubidasEscortsIDSListStore22)
			->where('profile_ads.created_at', '>=',  \Carbon\Carbon::now()->subDays(30)->toDateTimeString())					
			->where('profile_ads.role',  'like', '%Agency%')		
			->count();

		
		
		
		if($TodayAgencyFreeAd>0){
		$AgencyFreeAdAddedd =  (round(($TodayAgencyFreeAd/$FreeAdAgency),2)*100);
		}else{
		$AgencyFreeAdAddedd =  0;
		}
		
		if($LastTodayAgencyFreeAd>0){
		$AgencyFreeAdLastAddedd =  (round(($LastTodayAgencyFreeAd/$FreeAdAgency),2)*100);
		}else{
		$AgencyFreeAdLastAddedd =  0;
		}
		//END ESCORT FREEE
		
			return view('admin.dashboard.index'
			,
			[
			'FreeAdAgency'=>$FreeAdAgency,
			'AgencyFreeAdAddedd'=>$AgencyFreeAdAddedd,
			'AgencyFreeAdLastAddedd'=>$AgencyFreeAdLastAddedd,
			'AgencySubidaAd'=>$AgencySubidaAd,
			'AgencySubidaAdAddedd'=>$AgencySubidaAdAddedd,
			'AgencySubidaAdLastAddedd'=>$AgencySubidaAdLastAddedd,
			'AgencyTopAd'=>$AgencyTopAd,
			'AgencyTopAdAddedd'=>$AgencyTopAdAddedd,
			'AgencyTopAdLastAddedd'=>$AgencyTopAdLastAddedd,
			'Last60Delete'=>$Last60Delete,
			'TotalDelete'=>$TotalDelete,
			'Last30DeleteRate'=>$Last30DeleteRate,
			'Last30Delete'=>$Last30Delete,
			'Last60Signup'=>$Last60Signup,
			'TotalSignup'=>$TotalSignup,
			'Last30SignupRate'=>$Last30SignupRate,
			'Last30Signup'=>$Last30Signup,
			'Last60Paying'=>$Last60Paying,
			'TotalPaying'=>$TotalPaying,
			'Last30PayingRate'=>$Last30PayingRate,
			'Last30Paying'=>$Last30Paying,
			'PieEscortsCount'=>$PieEscortsCount,
			'PieChaperosCount'=>$PieChaperosCount,
			'PieTravestisCount'=>$PieTravestisCount,
			'FreeEscorts'=>$FreeEscorts,
			'FreeChaperos'=>$FreeChaperos,
			'FreeTravestis'=>$FreeTravestis,
			'ActiveEscorts'=>$ActiveEscorts,
			'ActiveChaperos'=>$ActiveChaperos,
			'ActiveTravestis'=>$ActiveTravestis,			
			'PendingEscorts'=>$PendingEscorts,
			'PendingChaperos'=>$PendingChaperos,
			'PendingTravestis'=>$PendingTravestis,
			'ActiveAgencies'=>$ActiveAgencies,
			'BlockedAgencies'=>$BlockedAgencies,
			'PendingIndividuals'=>$PendingIndividuals,
			'BlockedAnuncios'=>$BlockedAnuncios,
			'TopAnuncios'=>$TopAnuncios,
			'TopAnunciosEscorts'=>$TopAnunciosEscorts,
			'TopAnunciosChaperos'=>$TopAnunciosChaperos,
			'TopAnunciosTravestis'=>$TopAnunciosTravestis,
			'AutoSubidas'=>$AutoSubidas,
			'AutoSubidasEscorts'=>$AutoSubidasEscorts,
			'AutoSubidasChaperos'=>$AutoSubidasChaperos,
			'AutoSubidasTravestis'=>$AutoSubidasTravestis,
			'Selfies'=>$Selfies,
			'SelfiesEscorts'=>$SelfiesEscorts,
			'SelfiesChaperos'=>$SelfiesChaperos,
			'SelfiesTravestis'=>$SelfiesTravestis,
			'PendingAgencies'=>$PendingAgencies,
			'FreeAds'=>$FreeAds,
			'EmailAccounts'=>$EmailAccounts,
			'ActiveAgenciesAddedd'=>$ActiveAgenciesAddedd,
			'ActiveAgenciesLastAddedd'=>$ActiveAgenciesLastAddedd,
			'ActiveEscortsAddedd'=>$ActiveEscortsAddedd,
			'ActiveEscortsLastAddedd'=>$ActiveEscortsLastAddedd,
			'ActiveChaperosAddedd'=>$ActiveChaperosAddedd,
			'ActiveChaperosLastAddedd'=>$ActiveChaperosLastAddedd,
			'ActiveTravestisAddedd'=>$ActiveTravestisAddedd,
			'ActiveTravestisLastAddedd'=>$ActiveTravestisLastAddedd,
			]
			);
    }
    
    // @fun update admin password
	 public function password()    {
       return view('admin.dashboard.password');
    }
	
	public function update_password(Request $request){
	
		$this->validate($request, [		
		'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
		'password_confirmation' => 'min:6'
		]);

		$password = md5($request->input('password'));	  				
		DB::update('update admininfo set userpassword = ?',[$password]);
		 session()->flush();
		 Session::flash('message', 'Password  Successfully Updated!');
		 return redirect('/admin-login');	
	}
	
	
	
		public function terms(Request $request){     	        
			$tearms = DB::table('settings')			
			->select('id','tearms')
			->first();			
			$title = "Terms And Conditions"; 
		$data = compact('title');
		return view('admin.dashboard.tearms',['tearms'=>$tearms,'id'=>''],$data);  
	}

	public function update_terms(Request $request){     
	  
		if ( !empty( $request->except('_token') ) ){	
			$tearms = $request->input('tearms');			
			 DB::table('settings')
			->update([							
				'tearms' =>$tearms							
			]);
			Session::flash('message', 'The term and condition updated'); 
			Session::flash('alert-class', 'alert-success');					
			return redirect('/admin/terms-and-conditions');
			
		}else{
			Session::flash('message', 'The term and condition updated'); 
			Session::flash('alert-class', 'alert-success');					
			return redirect('/admin/terms-and-conditions');
		}
		
	}
	
		public function seo(Request $request){     	        
			$tearms = DB::table('seo')			
			
			->get();			
			$title = "Meta Seo"; 
		$data = compact('title');
		return view('admin.dashboard.seo',['tearms'=>$tearms,'id'=>''],$data);  
	}

	public function update_seo(Request $request){     
	  
		if ( !empty( $request->except('_token') ) ){	
		foreach($request->input('category') as $key=>$data){	
			 DB::table('seo')
			 ->where('category', $data	)
			->update([							
				'title' => $request->input('title')[$key],	
				'meta_title' => $request->input('meta_title')[$key],
				'meta_description' =>$request->input('meta_description')[$key],
				'h1_title' => $request->input('h1_title')[$key],
				'upper_description' => $request->input('upper_description')[$key],
				'lower_description' => $request->input('lower_description')[$key]
			]);
		
		}
			
			Session::flash('message', 'The meta updated'); 
			Session::flash('alert-class', 'alert-success');					
			return redirect('/admin/meta-seo');
			
		}else{
			Session::flash('message', 'The meta updated'); 
			Session::flash('alert-class', 'alert-success');					
			return redirect('/admin/meta-seo');
		}
		
	}
	

}

?>
