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

class ProfilesAgencyController extends Controller {
	
	
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
		$title = 'Free AD agency';   	
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
				if (!empty($categoriesFilter)) {					
			$AutoSubidasEscortsIDS = DB::table('top_subida_profile_lists')
		->select('top_subida_profile_lists.profile_ads_id')
		->join('profile_ads', 'profile_ads.id', '=', 'top_subida_profile_lists.profile_ads_id')		
		->where('profile_ads.category',  $categoriesFilter)
		->groupBy('top_subida_profile_lists.profile_ads_id')
		->get();
		}else{
			$AutoSubidasEscortsIDS = DB::table('top_subida_profile_lists')
		->select('top_subida_profile_lists.profile_ads_id')
		->join('profile_ads', 'profile_ads.id', '=', 'top_subida_profile_lists.profile_ads_id')				
		->groupBy('top_subida_profile_lists.profile_ads_id')
		->get();
		}
	
		
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
		
		
		$search->where('profile_ads.role',  'like', '%Agency%');
		if ($request->has('email') ) {					
		$search->where('members.email', 'like','%' .$request->get('email'). '%');
		}
		$search->orderby('profile_ads.id', '=', 'desc');
		
		$profile = $search->get();
		//$profile = $search->paginate(20);
		
		
		//$profile = DB::select('select * from profile_ads order by id desc');				
		 return view('admin.profile_agency.index',['profile'=>$profile,'title'=>$title,'category'=>$category,'categories'=>$categories,'province'=>$provinceData]);

		}
		

}