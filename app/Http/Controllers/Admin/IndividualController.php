<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Middleware\SuperAdmin;
use Session;

class IndividualController extends Controller {
	
	
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


		
		
			public function index(Request $request){
		
			$title = 'Individual';   
			$name = $request->get('name');
			$email = $request->get('email');
			$mobile = $request->get('mobile');
			$status = $request->get('status');
			
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
			
			$search = DB::table('members');
			$search->where('role',  'Individual');
			$search->whereNotIn('members.id',   $not_ids);
			if (!empty($name)) {					
			$search->where('members.name', 'like','%' .$name. '%');
			}
			
			
			if (!empty($status)) {	
				if($status=='all'){
				}else if($status=='2'){	
					$search->where('members.status', 0);	
				}else{
					$search->where('members.status', 1);		
				}
				
			}

			if (!empty($email)) {					
			$search->where('members.email', 'like','%' .$email. '%');
			}

			if (!empty($mobile)) {					
			$search->where('members.mobile', 'like','%' .$mobile. '%');
			}
			$search->orderby('members.id', '=', 'desc');
			$individual = $search->get();


			 return view('admin.individual.index',['individual'=>$individual,'title'=>$title]);

		}
		
		// @ status records function
		public function status($id){			
		// update STATUS
		$members =  DB::table('members')
		->where('id',$id)			
		->select('status')
		->first();
		if($members->status==1){
			$status = 0;
		}else{
			$status = 1;
		}
		DB::table('members')
		->where('id',$id)	
		->update(['status'=>$status]);
		// end  update  STATUS
		
		/* $profile_ads =  DB::table('profile_ads')
		->where('member_id',$agency_id)	
		->where('id',$id)
		->select('user_status')
		->first();
		if($profile_ads->user_status==1){
			$status = 0;
		}else{
			$status = 1;
		}
		DB::table('profile_ads')
		->where('member_id',$agency_id)	
		->where('id',$id)	
		->update(['user_status'=>$status]); */
		Session::flash('message', 'Individual Status Changed');
		Session::flash('alert-class', 'alert-info'); 
		return redirect('/admin/individual'); 

		}


		// @ add records function


			// @ edit records function

		// @ view records function
		public function view($id){
			$individual = DB::table('members')
			->where('members.id', $id)			
			->first();
			return view('admin.individual.view',['individual'=>$individual]);
		}
		
		// @ delete records function
		public function delete($id){
		$individual = DB::table('members')			
		->where('members.id', $id)			
		->first();
		if(!empty($individual->upload_logo)){
		$file_path=  public_path('/uploads/profile_logo/'.$individual->upload_logo);
			unlink($file_path);
		}
		DB::table('members')			
		->where('members.id', $id)			
		->delete();		
		Session::flash('message', 'Individual Successfully deleted!');
		Session::flash('alert-class', 'alert-info'); 
		return redirect('/admin/individual');

		}
	 
 

}