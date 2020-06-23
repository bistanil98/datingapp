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


		// @ listing function
		public function index(){
		$title = "Agency Packages";        		
		$agency_packages = DB::table('subida_agency_packages')						
		->orderby('subida_agency_packages.id', '=', 'desc')
		->get();
		 return view('admin.agency_packages.index',['agency_packages'=>$agency_packages,'title'=>$title]);

		}

		// @ add records function
		public function add(Request $request){
			$title = "Add Packages";    
			
			if(!empty( $request->except('_token') ) ){			
			$request->validate([		
			'pack_number' => 'required',
			'advertisements' => 'required',
			'days' => 'required',
			'uploads' => 'required',
			'price' => 'required',
			],
			[
			'pack_number.required' => 'The packages is required.',
			'advertisements.required' => 'The advertisements is required.',
			'days.required' => 'The days is required.',
			'uploads.required' => 'The uploads is required.',
			'price.required' => 'The price is required.',
					
			]);
		
			$advertisements = $request->input('advertisements');		
			$days = $request->input('days');		
			$uploads = $request->input('uploads');		
			$price = $request->input('price');		
			$pack_number = $request->input('pack_number');		
			
			DB::table('subida_agency_packages')->insert(
			[
			'advertisements' =>$advertisements,
			'days' =>$days,
			'uploads' =>$uploads,
			'price' =>$price,
			'pack_number' =>$pack_number,			
			'status' =>1
			]);
			Session::flash('message', 'Agency Packages Successfully Added!');
			Session::flash('alert-class', 'alert-info'); 
			return redirect('/admin/agency-packages');			
		}else{
			
			return view('admin.agency_packages.add',['title'=>$title]);
		}


		}
		
		// @ add records function
		public function edit(Request $request,$id){
			$title = "Edit new course";    
			
			if(!empty( $request->except('_token') ) ){			
			$request->validate([		
			'pack_number' => 'required',
			'advertisements' => 'required',
			'days' => 'required',
			'uploads' => 'required',
			'price' => 'required',
			],
			[
			'pack_number.required' => 'The packages is required.',
			'advertisements.required' => 'The advertisements is required.',
			'days.required' => 'The days is required.',
			'uploads.required' => 'The uploads is required.',
			'price.required' => 'The price is required.',
					
			]);
		
			$advertisements = $request->input('advertisements');		
			$days = $request->input('days');		
			$uploads = $request->input('uploads');		
			$price = $request->input('price');		
			$pack_number = $request->input('pack_number');		
			
			DB::table('subida_agency_packages')
			->where('id', $id)				
			->update(
			[
			'advertisements' =>$advertisements,
			'days' =>$days,
			'uploads' =>$uploads,
			'price' =>$price,
			'pack_number' =>$pack_number,			
			'status' =>1
			]);
			Session::flash('message', 'Agency Packages Successfully Updated!');
			Session::flash('alert-class', 'alert-info'); 
			return redirect('/admin/agency-packages');			
		}else{
		$agency_packages = SubidaAgencyPackages::where('id',$id)->first();		
		$province = DB::select('select * from province');			
		return view('admin.agency_packages.edit',['agency_packages'=>$agency_packages,'title'=>$title,'province'=>$province]);
			
		}


		}
		


		// @ delete records function
		public function delete($id){
		$agency_packages = SubidaAgencyPackages::where('id', $id)->first();
		SubidaAgencyPackages::where('id', $id)->delete();
		Session::flash('message', 'Agency Packages Successfully deleted!');
		Session::flash('alert-class', 'alert-info'); 
		return redirect('/admin/agency-packages');

		}
	 
 

}