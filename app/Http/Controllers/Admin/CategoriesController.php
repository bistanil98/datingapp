<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Middleware\SuperAdmin;
use App\Model\Categories;
use Session;

class CategoriesController extends Controller {
	
	
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
		$title = "Categories";        
		$categories = DB::select('select * from categories');		 		 
		 return view('admin.categories.index',['categories'=>$categories,'title'=>$title]);

		}

		// @ add records function
		public function add(Request $request){
			$title = "Add new course";    
			
			if(!empty( $request->except('_token') ) ){			
			$request->validate([		
			'name' => 'required|unique:categories',
			],
			[
			'name.required' => 'The name is required.',
			'name.unique' => 'The name is already exists!.',		
			]);
		
			$name = $request->input('name');		
			
			DB::table('categories')->insert(
			[
			'name' =>$name,
			'status' =>1
			]);
			Session::flash('message', 'Categories Successfully Added!');
			Session::flash('alert-class', 'alert-info'); 
			return redirect('/admin/categories');			
		}else{
		
			return view('admin.categories.add',['title'=>$title]);
		}


		}
		
		// @ add records function
		public function edit(Request $request,$id){
			$title = "Edit new course";    
			
			if(!empty( $request->except('_token') ) ){			
			$request->validate([		
			'name' => 'required|unique:categories,name,'.$id,
			],
			[
			'name.required' => 'The name is required.',
			'name.unique' => 'The name is already exists!.',		
			]);
		
			$name = $request->input('name');		
			
			DB::table('categories')
			->where('id', $id)				
			->update(
			[
			'name' =>$name,
			'status' =>1
			]);
			Session::flash('message', 'Categories Successfully Updated!');
			Session::flash('alert-class', 'alert-info'); 
			return redirect('/admin/categories');			
		}else{
		$categories = Categories::where('id',$id)->first();
		return view('admin.categories.edit',['categories'=>$categories, 'title'=>$title]);
			
		}


		}
		


		// @ delete records function
		public function delete($id){
		$categories = Categories::where('id', $id)->first();
		Categories::where('id', $id)->delete();
		Session::flash('message', 'Categories Successfully deleted!');
		Session::flash('alert-class', 'alert-info'); 
		return redirect('/admin/categories');

		}
	 
 

}