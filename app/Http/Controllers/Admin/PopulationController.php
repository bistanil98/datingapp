<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Middleware\SuperAdmin;
use App\Model\Population;
use Session;

class PopulationController extends Controller {
	
	
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
		$title = "Population";     
			$province=  DB::table('province')
			//->orderby('name','asc')
			->where('status','1')
			->get();
		$province_id = $request->get('province');
		$name = $request->get('name');
		$population = DB::table('population');
		
			if (!empty($province_id)) {		
			
			$population->where('population.province_id', $province_id);
		
		}
		if (!empty($name)) {					
				$population->where('population.name', 'like','%' .$name. '%');
		}
		
	
		
		
			$population->leftJoin('province', 'province.id', '=', 'population.province_id');
			$population->select('population.name', 'population.id',  'province.name as province_name',  'population.status',  'population.meta_title',  'population.meta_description');
			$population->orderby('population.id', '=', 'desc');
			$data = $population->get();
		 return view('admin.population.index',['population'=>$data,'province'=>$province,'title'=>$title]);

		}

		// @ add records function
		public function add(Request $request){
			$title = "Add new course";    
			
			if(!empty( $request->except('_token') ) ){			
			$request->validate([		
			'province_id' => 'required',
			'name' => 'required|unique:population',
			],
			[
			'province_id.required' => 'The province is required.',
			'name.required' => 'The name is required.',
			'name.unique' => 'The name is already exists!.',		
			]);
		
			$name = $request->input('name');		
			$province_id = $request->input('province_id');		
			$title = $request->input('title');		
			$meta_title = $request->input('meta_title');		
			$meta_description = $request->input('meta_description');		
			
			DB::table('population')->insert(
			[
			'title' =>$title,
			'meta_title' =>$meta_title,
			'meta_description' =>$meta_description,
			'province_id' =>$province_id,
			'name' =>$name,
			'status' =>1
			]);
			Session::flash('message', 'Population Successfully Added!');
			Session::flash('alert-class', 'alert-info'); 
			return redirect('/admin/population');			
		}else{
			$province = DB::select('select * from province');	
			return view('admin.population.add',['title'=>$title,'province'=>$province]);
		}


		}
		
		// @ add records function
		public function edit(Request $request,$id){
			$title = "Edit new course";    
			
			if(!empty( $request->except('_token') ) ){			
			$request->validate([		
			'province_id' => 'required',
			'name' => 'required|unique:population,name,'.$id,
			],
			[
			'province_id.required' => 'The province is required.',
			'name.required' => 'The name is required.',
			'name.unique' => 'The name is already exists!.',		
			]);
		
			$title = $request->input('title');		
			$meta_title = $request->input('meta_title');		
			$meta_description = $request->input('meta_description');		
			$name = $request->input('name');		
			$province_id = $request->input('province_id');		
			
			DB::table('population')
			->where('id', $id)				
			->update(
			[
			'title' =>$title,
			'meta_title' =>$meta_title,
			'meta_description' =>$meta_description,
			'province_id' =>$province_id,
			'name' =>$name,
			'status' =>1
			]);
			Session::flash('message', 'Population Successfully Updated!');
			Session::flash('alert-class', 'alert-info'); 
			return redirect('/admin/population');			
		}else{
		$population = Population::where('id',$id)->first();		
		$province = DB::select('select * from province');			
		return view('admin.population.edit',['population'=>$population,'title'=>$title,'province'=>$province]);
			
		}


		}
		


		// @ delete records function
		public function delete($id){
		$population = Population::where('id', $id)->first();
		Population::where('id', $id)->delete();
		Session::flash('message', 'Population Successfully deleted!');
		Session::flash('alert-class', 'alert-info'); 
		return redirect('/admin/population');

		}
	 
 

}