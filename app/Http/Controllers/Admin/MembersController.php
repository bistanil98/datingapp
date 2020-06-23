<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Middleware\SuperAdmin;
use App\Model\Members;
use Session;

class MembersController extends Controller {
	
	
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
		public function index(){
		$title = "Members";        
		$members = DB::select('select * from members');		 		 
		 return view('admin.members.index',['members'=>$members,'title'=>$title]);

		}

		// @ add records function
		public function add(Request $request){
			$title = "Add new course";    
			
			if(!empty( $request->except('_token') ) ){			
			$request->validate([		
			'name' => 'required|unique:members',
			],
			[
			'name.required' => 'The name is required.',
			'name.unique' => 'The name is already exists!.',		
			]);
		
			$name = $request->input('name');		
			
			DB::table('members')->insert(
			[
			'name' =>$name,
			'status' =>1
			]);
			Session::flash('message', 'Members Successfully Added!');
			Session::flash('alert-class', 'alert-info'); 
			return redirect('/admin/members');			
		}else{
		
			return view('admin.members.add',['title'=>$title]);
		}


		}
		
		// @ add records function
		public function edit(Request $request,$id){
			$title = "Edit new course";    
			
			if(!empty( $request->except('_token') ) ){			
			$request->validate([		
			'name' => 'required|unique:members,name,'.$id,
			],
			[
			'name.required' => 'The name is required.',
			'name.unique' => 'The name is already exists!.',		
			]);
		
			$name = $request->input('name');		
			
			DB::table('members')
			->where('id', $id)				
			->update(
			[
			'name' =>$name,
			'status' =>1
			]);
			Session::flash('message', 'Members Successfully Updated!');
			Session::flash('alert-class', 'alert-info'); 
			return redirect('/admin/members');			
		}else{
		$members = Members::where('id',$id)->first();
		return view('admin.members.edit',['members'=>$members, 'title'=>$title]);
			
		}


		}
		
	// @ add records function
		public function registration(Request $request,$id){
			$title = "Registration";    
			
			if(!empty( $request->except('_token') ) ){			
			$request->validate([		
			'name' => 'required|unique:members,name,'.$id,
			],
			[
			'name.required' => 'The name is required.',
			'name.unique' => 'The name is already exists!.',		
			]);
		
			$name = $request->input('name');		
			
			DB::table('members')
			->where('id', $id)				
			->update(
			[
			'name' =>$name,
			'status' =>1
			]);
			Session::flash('message', 'Members Successfully Updated!');
			Session::flash('alert-class', 'alert-info'); 
			return redirect('/admin/members');			
		}else{
		$members = Members::where('id',$id)->first();
		return view('admin.members.registration',['members'=>$members, 'title'=>$title]);
			
		}


		}
		


		// @ delete records function
			public function delete($id){
		$agencies = DB::table('members')			
		->where('members.id', $id)			
		->first();
		if(!empty($agencies->upload_logo)){
		$file_path=  public_path('/uploads/profile_logo/'.$agencies->upload_logo);
			unlink($file_path);
		}
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
		Session::flash('message', 'Members Successfully deleted!');
		Session::flash('alert-class', 'alert-info'); 
		return redirect('/admin/members');

		}
	 
		public function delete_old($id){
		$members = Members::where('id', $id)->first();
		$profile = DB::table('profile_ads')			
		->where('profile_ads.member_id', $id);
		if($profile->count()>0){
			foreach($profile->get() as $data){
					
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
			if(!empty($profile_ads->profile_pic)){
				$file_path=  public_path('/uploads/profile_ads/'.$profile_ads->profile_pic);
				unlink($file_path);
			}
			for($i=1; $i<=4;$i++){
				$gallery = 'gallery_'.$i;
				$selfie = 'selfie_'.$i;
				$video = 'video_'.$i;
				if(!empty($profile_ads->$gallery)){
					$file_path=  public_path('/uploads/profile_ads/'.$profile_ads->$gallery);
					unlink($file_path);
				}
				if(!empty($profile_ads->$selfie)){
					$file_path=  public_path('/uploads/profile_ads/'.$profile_ads->$selfie);
					unlink($file_path);
				}
				if(!empty($profile_ads->$video)){
					$file_path=  public_path('/uploads/profile_ads/'.$profile_ads->$video);
					unlink($file_path);
				}
			}
			DB::table('profile_ads')			
			->where('profile_ads.id', $data->id)			
			->delete();
				}
		}
		Members::where('id', $id)->delete();
		Session::flash('message', 'Members Successfully deleted!');
		Session::flash('alert-class', 'alert-info'); 
		return redirect('/admin/members');

		}
	 
 

}