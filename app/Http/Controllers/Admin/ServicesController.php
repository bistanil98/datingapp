<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Middleware\SuperAdmin;
use App\Model\Services;
use Session;

class ServicesController extends Controller {
	
	
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
			$categories=  DB::table('categories')
	//->orderby('name','asc')
	->where('status','1')
	->get();
		$title = "Services";        
		$services = DB::select('select * from services');		 		 
		 return view('admin.services.index',['services'=>$services,'title'=>$title]);

		}

		// @ add records function
		public function add(Request $request){
			$categories=  DB::table('categories')
	//->orderby('name','asc')
	->where('status','1')
	->get();
			$title = "Add new course";    
			
			if(!empty( $request->except('_token') ) ){			
			$request->validate([		
			'category' => 'required',
			'name' => 'required|unique:services',
			],
			[
			'category.required' => 'The category is required.',
			'name.required' => 'The name is required.',
			'name.unique' => 'The name is already exists!.',		
			]);
		
			$name = $request->input('name');		
				 if(!empty($request->input('category'))){
	$category = $request->input('category');
	$category = implode(',', $category);
	}else{
	$category = '';
	}
			DB::table('services')->insert(
			[
			'category' =>$category,
			'name' =>$name,
			'status' =>1
			]);
			Session::flash('message', 'Services Successfully Added!');
			Session::flash('alert-class', 'alert-info'); 
			return redirect('/admin/services');			
		}else{
		
			return view('admin.services.add',['title'=>$title,'categories'=>$categories]);
		}


		}
		
		// @ add records function
		public function edit(Request $request,$id){
			$title = "Edit new course";    
				$categories=  DB::table('categories')
	//->orderby('name','asc')
	->where('status','1')
	->get();
			if(!empty( $request->except('_token') ) ){			
			$request->validate([		
			'category' => 'required',
			'name' => 'required|unique:services,name,'.$id,
			],
			[
			'category.required' => 'The category is required.',
			'name.required' => 'The name is required.',
			'name.unique' => 'The name is already exists!.',		
			]);
		
			$name = $request->input('name');		
						 if(!empty($request->input('category'))){
	$category = $request->input('category');
	$category = implode(',', $category);
	}else{
	$category = '';
	}
			DB::table('services')
			->where('id', $id)				
			->update(
			[
			'category' =>$category,
			'name' =>$name,
			'status' =>1
			]);
			Session::flash('message', 'Services Successfully Updated!');
			Session::flash('alert-class', 'alert-info'); 
			return redirect('/admin/services');			
		}else{
		$services = Services::where('id',$id)->first();
		return view('admin.services.edit',['services'=>$services, 'title'=>$title,'categories'=>$categories]);
			
		}


		}
		


		// @ delete records function
		public function delete($id){
		$services = Services::where('id', $id)->first();
		Services::where('id', $id)->delete();
		Session::flash('message', 'Services Successfully deleted!');
		Session::flash('alert-class', 'alert-info'); 
		return redirect('/admin/services');

		}
	 
 

}