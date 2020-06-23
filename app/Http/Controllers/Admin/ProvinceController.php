<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Middleware\SuperAdmin;
use App\Model\Province;
use Session;

class ProvinceController extends Controller {
	
	
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
		$title = "Province";        
		$province = DB::select('select * from province');		 		 
		 return view('admin.province.index',['province'=>$province,'title'=>$title]);

		}

		// @ add records function
		public function add(Request $request){
			$title = "Add new course";    
			
			if(!empty( $request->except('_token') ) ){			
			$request->validate([		
			'name' => 'required|unique:province',
			],
			[
			'name.required' => 'The name is required.',
			'name.unique' => 'The name is already exists!.',		
			]);
		
			$name = $request->input('name');		
			$title = $request->input('title');		
			$meta_title = $request->input('meta_title');		
			$meta_description = $request->input('meta_description');		
			DB::table('province')->insert(
			[
			'title' =>$title,
			'meta_title' =>$meta_title,
			'meta_description' =>$meta_description,
			'name' =>$name,
			'status' =>1
			]);
			Session::flash('message', 'Province Successfully Added!');
			Session::flash('alert-class', 'alert-info'); 
			return redirect('/admin/province');			
		}else{
		
			return view('admin.province.add',['title'=>$title]);
		}


		}
		
		// @ add records function
		public function edit(Request $request,$id){
			$title = "Edit new course";    
			
			if(!empty( $request->except('_token') ) ){			
			$request->validate([		
			'name' => 'required|unique:province,name,'.$id,
			],
			[
			'name.required' => 'The name is required.',
			'name.unique' => 'The name is already exists!.',		
			]);
		
			$name = $request->input('name');		
			$title = $request->input('title');		
			$meta_title = $request->input('meta_title');		
			$meta_description = $request->input('meta_description');		
			DB::table('province')
			->where('id', $id)				
			->update(
			[
			'title' =>$title,
			'meta_title' =>$meta_title,
			'meta_description' =>$meta_description,	
			'name' =>$name,
			'status' =>1
			]);
			Session::flash('message', 'Province Successfully Updated!');
			Session::flash('alert-class', 'alert-info'); 
			return redirect('/admin/province');			
		}else{
		$province = Province::where('id',$id)->first();
		return view('admin.province.edit',['province'=>$province, 'title'=>$title]);
			
		}


		}
		


		// @ delete records function
		public function delete($id){
		$province = Province::where('id', $id)->first();
		Province::where('id', $id)->delete();
		Session::flash('message', 'Province Successfully deleted!');
		Session::flash('alert-class', 'alert-info'); 
		return redirect('/admin/province');

		}
	 
 

}