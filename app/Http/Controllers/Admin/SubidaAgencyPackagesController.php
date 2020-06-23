<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Middleware\SuperAdmin;
use App\Model\SubidaAgencyPackages;
use Session;

class SubidaAgencyPackagesController extends Controller {
	
	
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


		/* // @ listing function
		public function index(){
		
		$title = "Agency Packages";        		
		$subida_agency_packages = DB::table('subida_agency_packages')						
		->orderby('subida_agency_packages.id', '=', 'desc')
		->get();
		 return view('admin.subida_agency_packages.index',['subida_agency_packages'=>$subida_agency_packages,'title'=>$title]);

		} */
		
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
			
		$title = "Agency Packages";        		
		/* $subida_agency_packages = DB::table('subida_agency_packages')						
		->orderby('subida_agency_packages.id', '=', 'desc')
		->get(); */
		$category = $request->get('category');
		$durations = $request->get('durations');
		$provinces = $request->get('province');
		
		$search = DB::table('subida_agency_packages');
		
		if (!empty($category)) {					
				$search->where('subida_agency_packages.category', 'like','%' .$category. '%');
		}
		if (!empty($provinces)) {					
		$search->where('subida_agency_packages.provinces', 'like','%' .$provinces. '%');
		}
		
		if (!empty($durations)) {					
				$search->where('subida_agency_packages.durations', 'like','%' .$durations. '%');
		}
		//$search->orderby('subida_agency_packages.id', '=', 'desc');
		//$search->orderby('subida_agency_packages.subidas', 'asc');
		$subida_agency_packages = $search->get();
		
		
		 return view('admin.subida_agency_packages.index',['subida_agency_packages'=>$subida_agency_packages,'title'=>$title,'categories'=>$categories,'province'=>$province]);

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
			'subidas' => 'required',
			],
			[
			'category.required' => 'The category is required.',
			'advertisements.required' => 'The advertisements is required.',
			'durations.required' => 'The durations is required.',			
			'provinces.required' => 'The price is required.',
			'subidas.required' => 'The subidas is required.',
			'price.required' => 'The provinces is required.',
					
			]);
		
			$advertisements = $request->input('advertisements');		
			$durations = $request->input('durations');		
			$category = $request->input('category');		
			$subidas = $request->input('subidas');		
				
			$price = $request->input('price');		
			if(!empty($request->input('provinces'))){
			
			$provinces = $request->input('provinces');
			
			$provinces = implode(', ', $provinces);
			}else{
			$provinces = '';
			}
			DB::table('subida_agency_packages')->insert(
			[
			'advertisements' =>$advertisements,
			'durations' =>$durations,
			'subidas' =>$subidas,			
			'category' =>$category,
			'provinces' =>$provinces,
			'price' =>$price,			
			'status' =>1
			]);
			Session::flash('message', 'Agency Packages Successfully Added!');
			Session::flash('alert-class', 'alert-info'); 
			return redirect('/admin/subida-agency-packages');			
		}else{
			
			return view('admin.subida_agency_packages.add',['title'=>$title,'categories'=>$categories,'province'=>$province]);
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
			'subidas' => 'required',
			],
			[
			'category.required' => 'The category is required.',
			'advertisements.required' => 'The advertisements is required.',
			'durations.required' => 'The durations is required.',			
			'provinces.required' => 'The price is required.',
			'subidas.required' => 'The subidas is required.',
			'price.required' => 'The provinces is required.',
					
			]);
		
			$advertisements = $request->input('advertisements');		
			$durations = $request->input('durations');		
			$category = $request->input('category');
			$subidas = $request->input('subidas');
			
			$price = $request->input('price');		
			if(!empty($request->input('provinces'))){
			$provinces = $request->input('provinces');
			
			$provinces = implode(', ', $provinces);
			}else{
			$provinces = '';
			}
			DB::table('subida_agency_packages')
			->where('id', $id)		
			->update(
			[
			'advertisements' =>$advertisements,
			'durations' =>$durations,			
			'category' =>$category,
			'provinces' =>$provinces,
			'subidas' =>$subidas,
			'price' =>$price,			
			'status' =>1
			]);
			
			Session::flash('message', 'Agency Packages Successfully Updated!');
			Session::flash('alert-class', 'alert-info'); 
			return redirect('/admin/subida-agency-packages?category='.$category.'&province=&durations=');			
		}else{
		$subida_agency_packages = SubidaAgencyPackages::where('id',$id)->first();		
		
		return view('admin.subida_agency_packages.edit',['subida_agency_packages'=>$subida_agency_packages,'title'=>$title,'categories'=>$categories,'province'=>$province]);
			
		}


		}
		


		// @ delete records function
		public function delete($id){
		$subida_agency_packages = SubidaAgencyPackages::where('id', $id)->first();
		SubidaAgencyPackages::where('id', $id)->delete();
		Session::flash('message', 'Agency Packages Successfully deleted!');
		Session::flash('alert-class', 'alert-info'); 
		return redirect('/admin/subida-agency-packages');

		}
	 
 

}