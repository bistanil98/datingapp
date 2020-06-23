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

class AutoSubidasAnunciosAgencyController extends Controller {
	
	
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
		public function index(Request $request){
		
		$title = 'Auto Subidas Anuncios';   
		$provinceData=  DB::table('province')
			->orderby('name','asc')
			->where('status','1')
			->get();
		$categories =  DB::table('categories')		
		->where('status','1')
		->get();
			
		$name = $request->get('name');
		$province = $request->get('province');
		$mobile = $request->get('mobile');
		$categoriesFilter = $request->get('category');
		// filter
		$search = DB::table('top_subida_profile_lists');
		$search->select(
		'top_subida_profile_lists.from_date',
		'top_subida_profile_lists.id as top_subidaId',
		'top_subida_profile_lists.to_date',
		'top_subida_profile_lists.type',
		'top_subida_profile_lists.seen_days',
		'top_subida_profile_lists.seen_daily',
		'profile_ads.id',
		'profile_ads.category',
		'profile_ads.profile_pic',
		'profile_ads.first_name',
		'profile_ads.member_id',
		'profile_ads.telephone',
		'profile_ads.status',
		'profile_ads.province',
		'top_subida_booking_packages.total_price',
		'top_subida_booking_packages.payment_type'
		);
		$search->join('profile_ads', 'profile_ads.id', '=', 'top_subida_profile_lists.profile_ads_id');
		$search->join('top_subida_booking_packages', 'top_subida_booking_packages.id', '=', 'top_subida_profile_lists.order_id');
		$search->where('top_subida_profile_lists.type', 'subida');
		if (!empty($categoriesFilter)) {					
			$search->where('profile_ads.category', 'like','%' .$categoriesFilter. '%');
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
		$search->where('profile_ads.role',  'like', '%Agency%');
		$search->orderby('profile_ads.id', '=', 'desc');
		$profile = $search->get();
		
		 return view('admin.auto_subidas_anuncios_agency.index',['profile'=>$profile,'title'=>$title,'categories'=>$categories,'province'=>$provinceData]);

		}

		
		// @ view records function
		public function view($id){
		$search = DB::table('top_subida_profile_lists');
		$search->select(
		'top_subida_profile_lists.from_date',
		'top_subida_profile_lists.id as top_subidaId',
		'top_subida_profile_lists.to_date',
		'top_subida_profile_lists.type',
		'profile_ads.id',
		'profile_ads.category',
		'profile_ads.profile_pic',
		'profile_ads.first_name',
		'profile_ads.member_id',
		'profile_ads.telephone',
		'profile_ads.province',
		'top_subida_booking_packages.created_at',
		'top_subida_booking_packages.total_price',
		'top_subida_booking_packages.payment_type'
		);
		$search->join('profile_ads', 'profile_ads.id', '=', 'top_subida_profile_lists.profile_ads_id');
		$search->join('top_subida_booking_packages', 'top_subida_booking_packages.id', '=', 'top_subida_profile_lists.order_id');
		$search->where('top_subida_profile_lists.type', 'subida');
		$search->where('top_subida_profile_lists.id', $id);
		
		$search->orderby('profile_ads.id', '=', 'desc');
		$profile = $search->first();
		
			return view('admin.auto_subidas_anuncios.view',['data'=>$profile]);
		}
		
		

}