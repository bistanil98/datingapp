<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Middleware\SuperAdmin;
use App\Model\OverYou;
use Session;

class OverYouController extends Controller {
	
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
		$title = "OverYou";        
		$over_you = DB::select('select * from over_you');		 		 
		 return view('admin.over_you.index',['over_you'=>$over_you,'title'=>$title]);

		}

		// @ add records function
		public function add(Request $request){
			$title = "Add new course";    
				$categories=  DB::table('categories')
	//->orderby('name','asc')
	->where('status','1')
	->get();
			if(!empty( $request->except('_token') ) ){			
			$request->validate([		
			'category' => 'required',
			
			'name' => 'required|unique:over_you',
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
			DB::table('over_you')->insert(
			[
			'name' =>$name,
				'category' =>$category,
			'status' =>1
			]);
			Session::flash('message', 'OverYou Successfully Added!');
			Session::flash('alert-class', 'alert-info'); 
			return redirect('/admin/over_you');			
		}else{
		
			return view('admin.over_you.add',['title'=>$title,'categories'=>$categories]);
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
			'name' => 'required|unique:over_you,name,'.$id,
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
			DB::table('over_you')
			->where('id', $id)				
			->update(
			[
			'name' =>$name,
				'category' =>$category,
			'status' =>1
			]);
			Session::flash('message', 'OverYou Successfully Updated!');
			Session::flash('alert-class', 'alert-info'); 
			return redirect('/admin/over_you');			
		}else{
		$over_you = OverYou::where('id',$id)->first();
		return view('admin.over_you.edit',['over_you'=>$over_you, 'title'=>$title,'categories'=>$categories]);
			
		}


		}
		


		// @ delete records function
		public function delete($id){
		$over_you = OverYou::where('id', $id)->first();
		OverYou::where('id', $id)->delete();
		Session::flash('message', 'OverYou Successfully deleted!');
		Session::flash('alert-class', 'alert-info'); 
		return redirect('/admin/over_you');

		}
	 
 

}