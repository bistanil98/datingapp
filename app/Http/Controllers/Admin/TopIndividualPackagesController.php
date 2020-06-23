<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Middleware\SuperAdmin;
use App\Model\TopIndividualPackages;
use Session;

class TopIndividualPackagesController extends Controller {
	
	
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
		
		$categories=  DB::table('categories')
			//->orderby('name','asc')
			->where('status','1')
			->get();
			$province=  DB::table('province')
			//->orderby('name','asc')
			->where('status','1')
			->get();
			
		$title = "Individual Packages";        		
		/* $top_individual_packages = DB::table('top_individual_packages')						
		->orderby('top_individual_packages.id', '=', 'desc')
		->get(); */
		$category = $request->get('category');
		$durations = $request->get('durations');
		$provinces = $request->get('province');
		
		$search = DB::table('top_individual_packages');
		
		if (!empty($category)) {					
				$search->where('top_individual_packages.category', 'like','%' .$category. '%');
		}
		
		if (!empty($provinces)) {					
		$search->where('top_individual_packages.provinces', 'like','%' .$provinces. '%');
		}
		
		if (!empty($durations)) {					
				$search->where('top_individual_packages.durations', 'like','%' .$durations. '%');
		}
		//$search->orderby('top_individual_packages.id', '=', 'desc');
		$top_individual_packages = $search->get();
		
		
		 return view('admin.top_individual_packages.index',['top_individual_packages'=>$top_individual_packages,'title'=>$title,'categories'=>$categories,'province'=>$province]);

		}
		
		

		// @ add records function
		public function add(Request $request){
			$title = "Add Packages";    
			
			$categories=  DB::table('categories')
			//->orderby('name','asc')
			->where('status','1')
			->get();
			$province=  DB::table('province')
			//->orderby('name','asc')
			->where('status','1')
			->get();
			if(!empty( $request->except('_token') ) ){		
			
			$request->validate([		
			'category' => 'required',
			'advertisements' => 'required',
			'durations' => 'required',			
			'price' => 'required',
			'provinces' => 'required',
			],
			[
			'category.required' => 'The category is required.',
			'advertisements.required' => 'The advertisements is required.',
			'durations.required' => 'The durations is required.',			
			'provinces.required' => 'The price is required.',
			'price.required' => 'The provinces is required.',
					
			]);
		
			$advertisements = $request->input('advertisements');		
			$durations = $request->input('durations');		
			$category = $request->input('category');		
				
			$price = $request->input('price');		
			if(!empty($request->input('provinces'))){
			
			$provinces = $request->input('provinces');
			
			$provinces = implode(', ', $provinces);
			}else{
			$provinces = '';
			}
			DB::table('top_individual_packages')->insert(
			[
			'advertisements' =>$advertisements,
			'durations' =>$durations,
			
			'category' =>$category,
			'provinces' =>$provinces,
			'price' =>$price,			
			'status' =>1
			]);
			Session::flash('message', 'Individual Packages Successfully Added!');
			Session::flash('alert-class', 'alert-info'); 
			return redirect('/admin/top-individual-packages');			
		}else{
			
			return view('admin.top_individual_packages.add',['title'=>$title,'categories'=>$categories,'province'=>$province]);
		}


		}
		
		// @ add records function
		public function edit(Request $request,$id){
			$title = "Edit new course";    
			$categories=  DB::table('categories')
			//->orderby('name','asc')
			->where('status','1')
			->get();
			$province=  DB::table('province')
			//->orderby('name','asc')
			->where('status','1')
			->get();
			if(!empty( $request->except('_token') ) ){			
			
			$request->validate([		
			'category' => 'required',
			'advertisements' => 'required',
			'durations' => 'required',			
			'price' => 'required',
			'provinces' => 'required',
			],
			[
			'category.required' => 'The category is required.',
			'advertisements.required' => 'The advertisements is required.',
			'durations.required' => 'The durations is required.',			
			'provinces.required' => 'The price is required.',
			'price.required' => 'The provinces is required.',
					
			]);
		
			$advertisements = $request->input('advertisements');		
			$durations = $request->input('durations');		
			$category = $request->input('category');
			
			$price = $request->input('price');		
			if(!empty($request->input('provinces'))){
			$provinces = $request->input('provinces');
			
			$provinces = implode(', ', $provinces);
			}else{
			$provinces = '';
			}
			DB::table('top_individual_packages')
			->where('id', $id)		
			->update(
			[
			'advertisements' =>$advertisements,
			'durations' =>$durations,			
			'category' =>$category,
			'provinces' =>$provinces,
			'price' =>$price,			
			'status' =>1
			]);
			
			Session::flash('message', 'Individual Packages Successfully Updated!');
			Session::flash('alert-class', 'alert-info'); 
			return redirect('/admin/top-individual-packages?category='.$category.'&province=&durations=');
		}else{
		$top_individual_packages = TopIndividualPackages::where('id',$id)->first();		
		
		return view('admin.top_individual_packages.edit',['top_individual_packages'=>$top_individual_packages,'title'=>$title,'categories'=>$categories,'province'=>$province]);
			
		}


		}
		


		// @ delete records function
		public function delete($id){
		$top_individual_packages = TopIndividualPackages::where('id', $id)->first();
		TopIndividualPackages::where('id', $id)->delete();
		Session::flash('message', 'Individual Packages Successfully deleted!');
		Session::flash('alert-class', 'alert-info'); 
		return redirect('/admin/top-individual-packages');

		}
	 
 

}