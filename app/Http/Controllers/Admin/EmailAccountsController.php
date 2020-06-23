<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Middleware\SuperAdmin;
use Session;

class EmailAccountsController extends Controller {
	
	
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
		
			$title = 'Agencies';   
			
			
			$search = DB::table('members');
			/* $search->where('role',  'Agency');
			
			if (!empty($name)) {					
			$search->where('members.name', 'like','%' .$name. '%');
			}
			
			if (!empty($status)) {	
				if($status=='all'){
				}else if($status=='2'){	
					$search->where('members.status', 0);	
				}else{
					$search->where('members.status', 1);	
					$search->where('members.is_email',  '1');
				}
				
			}else{
				$search->where('members.status', 1);
				
			}

			if (!empty($email)) {					
			$search->where('members.email', 'like','%' .$email. '%');
			}
			
			if ($request->has('pending') && $request->has('pending')==1) {
			$search->where('members.is_email', 0);
			$search->where('members.status', '1');
			}
			if (!empty($category)) {					
				$search->where('members.agency_category', 'like','%' .$category. '%');
			}
			if (!empty($provinces)) {					
				$search->where('members.provincia', 'like','%' .$provinces. '%');
			}
			if (!empty($mobile)) {					
				$search->where('members.mobile', 'like','%' .$mobile. '%');
			} */
			$search->orderby('members.id', '=', 'desc');
			$agencies = $search->get();
			
			
			return view('admin.email_accounts.index',['agencies'=>$agencies,'title'=>$title]);

		}
		
	
		// @ delete records function
		public function delete($id){
		
		/* $agencies = DB::table('members')			
		->where('members.id', $id)			
		->first();
		if(!empty($agencies->upload_logo)){
		$file_path=  public_path('/uploads/profile_logo/'.$agencies->upload_logo);
			unlink($file_path);
		}
		DB::table('members')			
		->where('members.id', $id)			
		->delete();		 */
		
		
		//ads_seen_history
		
		//subida_ads_seen_history = ads_id
		//top_subida_booking_packages = user_id
		//top_subida_profile_lists = user_id
		//profile_ads  =  member_id
		//members
	
		
		
		
		
		
		 $ads = DB::table('profile_ads')			 
		->where('profile_ads.member_id', $id)
		->get();
		
		foreach($ads as $data){		
			DB::table('visualizaciones')			
	->where('profile_id', $data->id)
		->delete();
		DB::table('favoritos')
			->where('profile_id', $data->id)
			->delete();
		DB::table('schedule')			
		->where('profile_ads_id', $data->id)			
		->delete();
		
		DB::table('tariffs')			
		->where('profile_id', $data->id)			
		->delete();
		
		DB::table('piesepuerto')			
		->where('profile_ads_id', $data->id)			
		->delete();
			
			if(!empty($data->profile_pic) && file_exists( public_path().'/uploads/profile_ads/'.$data->profile_pic)){
				$file_path=  public_path('/uploads/profile_ads/'.$data->profile_pic);
				unlink($file_path);
			}
			if(!empty($data->gallery_1) && file_exists( public_path().'/uploads/profile_ads/'.$data->gallery_1)){
				$file_path=  public_path('/uploads/profile_ads/'.$data->gallery_1);
				unlink($file_path);
			}
			if(!empty($data->gallery_2) && file_exists( public_path().'/uploads/profile_ads/'.$data->gallery_2)){
				$file_path=  public_path('/uploads/profile_ads/'.$data->gallery_2);
				unlink($file_path);
			}
			if(!empty($data->gallery_3) && file_exists( public_path().'/uploads/profile_ads/'.$data->gallery_3)){
				$file_path=  public_path('/uploads/profile_ads/'.$data->gallery_3);
				unlink($file_path);
			}
			if(!empty($data->gallery_4) && file_exists( public_path().'/uploads/profile_ads/'.$data->gallery_4)){
				$file_path=  public_path('/uploads/profile_ads/'.$data->gallery_4);
				unlink($file_path);
			}
			if(!empty($data->gallery_5) && file_exists( public_path().'/uploads/profile_ads/'.$data->gallery_5)){
				$file_path=  public_path('/uploads/profile_ads/'.$data->gallery_5);
				unlink($file_path);
			}
			if(!empty($data->gallery_6) && file_exists( public_path().'/uploads/profile_ads/'.$data->gallery_6)){
				$file_path=  public_path('/uploads/profile_ads/'.$data->gallery_6);
				unlink($file_path);
			}
			if(!empty($data->gallery_7) && file_exists( public_path().'/uploads/profile_ads/'.$data->gallery_7)){
				$file_path=  public_path('/uploads/profile_ads/'.$data->gallery_7);
				unlink($file_path);
			}
			if(!empty($data->gallery_8) && file_exists( public_path().'/uploads/profile_ads/'.$data->gallery_8)){
				$file_path=  public_path('/uploads/profile_ads/'.$data->gallery_8);
				unlink($file_path);
			}
			if(!empty($data->selfie_1) && file_exists( public_path().'/uploads/profile_ads/'.$data->selfie_1)){
				$file_path=  public_path('/uploads/profile_ads/'.$data->selfie_1);
				unlink($file_path);
			}
			if(!empty($data->selfie_2) && file_exists( public_path().'/uploads/profile_ads/'.$data->selfie_2)){
				$file_path=  public_path('/uploads/profile_ads/'.$data->selfie_2);
				unlink($file_path);
			}
			if(!empty($data->selfie_3) && file_exists( public_path().'/uploads/profile_ads/'.$data->selfie_3)){
				$file_path=  public_path('/uploads/profile_ads/'.$data->selfie_3);
				unlink($file_path);
			}
			if(!empty($data->selfie_4) && file_exists( public_path().'/uploads/profile_ads/'.$data->selfie_4)){
				$file_path=  public_path('/uploads/profile_ads/'.$data->selfie_4);
				unlink($file_path);
			}
			if(!empty($data->video_1) && file_exists( public_path().'/uploads/profile_ads/'.$data->video_1)){
				$file_path=  public_path('/uploads/profile_ads/'.$data->video_1);
				unlink($file_path);
			}
			if(!empty($data->video_2) && file_exists( public_path().'/uploads/profile_ads/'.$data->video_2)){
				$file_path=  public_path('/uploads/profile_ads/'.$data->video_2);
				unlink($file_path);
			}
			if(!empty($data->video_3) && file_exists( public_path().'/uploads/profile_ads/'.$data->video_3)){
				$file_path=  public_path('/uploads/profile_ads/'.$data->video_3);
				unlink($file_path);
			}
			if(!empty($data->video_4) && file_exists( public_path().'/uploads/profile_ads/'.$data->video_4)){
				$file_path=  public_path('/uploads/profile_ads/'.$data->video_4);
				unlink($file_path);
			}
			
			
			 DB::table('profile_ads')			
			->where('profile_ads.id', $data->id)			
			->delete(); 
			DB::table('subida_ads_seen_history')			
		->where('subida_ads_seen_history.ads_id', $data->id)			
		->delete();	
		}
		
		DB::table('top_subida_profile_lists')			
		->where('top_subida_profile_lists.user_id', $id)			
		->delete();	
		
		
		DB::table('top_subida_booking_packages')			
		->where('top_subida_booking_packages.user_id', $id)			
		->delete();	
		
			DB::table('members')			
		->where('members.id', $id)			
		->delete();	
		 $created_at =  date('Y-m-d h:i:s');
		DB::table('member_signup_delete_history')	
		->insert([
		'type' =>'delete',		
		'created_at'=>$created_at,	
		]);
		Session::flash('message', 'Agency Successfully deleted!');
		Session::flash('alert-class', 'alert-info'); 
		return redirect('/admin/email-accounts');

		}
	 public function multidelete(Request $request){     
	 if(!empty($request->check)){
		 foreach($request->check as $id){
		 $profile = DB::table('profile_ads')			
		->where('profile_ads.member_id', $id)->count();
		
		if($profile>0){
		
				 $ads = DB::table('profile_ads')			 
		->where('profile_ads.member_id', $id)
		->get();
		
		foreach($ads as $data){		
			DB::table('visualizaciones')			
	->where('profile_id', $data->id)
		->delete();
		DB::table('favoritos')
			->where('profile_id', $data->id)
			->delete();
		DB::table('schedule')			
		->where('profile_ads_id', $data->id)			
		->delete();
		
		DB::table('tariffs')			
		->where('profile_id', $data->id)			
		->delete();
		
		DB::table('piesepuerto')			
		->where('profile_ads_id', $data->id)			
		->delete();
			
			if(!empty($data->profile_pic) && file_exists( public_path().'/uploads/profile_ads/'.$data->profile_pic)){
				$file_path=  public_path('/uploads/profile_ads/'.$data->profile_pic);
				unlink($file_path);
			}
			if(!empty($data->gallery_1) && file_exists( public_path().'/uploads/profile_ads/'.$data->gallery_1)){
				$file_path=  public_path('/uploads/profile_ads/'.$data->gallery_1);
				unlink($file_path);
			}
			if(!empty($data->gallery_2) && file_exists( public_path().'/uploads/profile_ads/'.$data->gallery_2)){
				$file_path=  public_path('/uploads/profile_ads/'.$data->gallery_2);
				unlink($file_path);
			}
			if(!empty($data->gallery_3) && file_exists( public_path().'/uploads/profile_ads/'.$data->gallery_3)){
				$file_path=  public_path('/uploads/profile_ads/'.$data->gallery_3);
				unlink($file_path);
			}
			if(!empty($data->gallery_4) && file_exists( public_path().'/uploads/profile_ads/'.$data->gallery_4)){
				$file_path=  public_path('/uploads/profile_ads/'.$data->gallery_4);
				unlink($file_path);
			}
			if(!empty($data->gallery_5) && file_exists( public_path().'/uploads/profile_ads/'.$data->gallery_5)){
				$file_path=  public_path('/uploads/profile_ads/'.$data->gallery_5);
				unlink($file_path);
			}
			if(!empty($data->gallery_6) && file_exists( public_path().'/uploads/profile_ads/'.$data->gallery_6)){
				$file_path=  public_path('/uploads/profile_ads/'.$data->gallery_6);
				unlink($file_path);
			}
			if(!empty($data->gallery_7) && file_exists( public_path().'/uploads/profile_ads/'.$data->gallery_7)){
				$file_path=  public_path('/uploads/profile_ads/'.$data->gallery_7);
				unlink($file_path);
			}
			if(!empty($data->gallery_8) && file_exists( public_path().'/uploads/profile_ads/'.$data->gallery_8)){
				$file_path=  public_path('/uploads/profile_ads/'.$data->gallery_8);
				unlink($file_path);
			}
			if(!empty($data->selfie_1) && file_exists( public_path().'/uploads/profile_ads/'.$data->selfie_1)){
				$file_path=  public_path('/uploads/profile_ads/'.$data->selfie_1);
				unlink($file_path);
			}
			if(!empty($data->selfie_2) && file_exists( public_path().'/uploads/profile_ads/'.$data->selfie_2)){
				$file_path=  public_path('/uploads/profile_ads/'.$data->selfie_2);
				unlink($file_path);
			}
			if(!empty($data->selfie_3) && file_exists( public_path().'/uploads/profile_ads/'.$data->selfie_3)){
				$file_path=  public_path('/uploads/profile_ads/'.$data->selfie_3);
				unlink($file_path);
			}
			if(!empty($data->selfie_4) && file_exists( public_path().'/uploads/profile_ads/'.$data->selfie_4)){
				$file_path=  public_path('/uploads/profile_ads/'.$data->selfie_4);
				unlink($file_path);
			}
			if(!empty($data->video_1) && file_exists( public_path().'/uploads/profile_ads/'.$data->video_1)){
				$file_path=  public_path('/uploads/profile_ads/'.$data->video_1);
				unlink($file_path);
			}
			if(!empty($data->video_2) && file_exists( public_path().'/uploads/profile_ads/'.$data->video_2)){
				$file_path=  public_path('/uploads/profile_ads/'.$data->video_2);
				unlink($file_path);
			}
			if(!empty($data->video_3) && file_exists( public_path().'/uploads/profile_ads/'.$data->video_3)){
				$file_path=  public_path('/uploads/profile_ads/'.$data->video_3);
				unlink($file_path);
			}
			if(!empty($data->video_4) && file_exists( public_path().'/uploads/profile_ads/'.$data->video_4)){
				$file_path=  public_path('/uploads/profile_ads/'.$data->video_4);
				unlink($file_path);
			}
			
			
			 DB::table('profile_ads')			
			->where('profile_ads.id', $data->id)			
			->delete(); 
			DB::table('subida_ads_seen_history')			
		->where('subida_ads_seen_history.ads_id', $data->id)			
		->delete();	
		}
		
		DB::table('top_subida_profile_lists')			
		->where('top_subida_profile_lists.user_id', $id)			
		->delete();	
		
		DB::table('top_subida_booking_packages')			
		->where('top_subida_booking_packages.user_id', $id)			
		->delete();	
		}
			DB::table('members')			
		->where('members.id', $id)			
		->delete();	
		 $created_at =  date('Y-m-d h:i:s');
		DB::table('member_signup_delete_history')	
		->insert([
		'type' =>'delete',		
		'created_at'=>$created_at,	
		]);
		 }
		 Session::flash('message', 'Agency Successfully deleted!');
		Session::flash('alert-class', 'alert-info'); 
		return redirect('/admin/email-accounts');
		}else{
		Session::flash('message', ' You have select one deleted!');
		Session::flash('alert-class', 'alert-info'); 
		return redirect('/admin/email-accounts');
		}
	 
	 }
 

}