<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Middleware\SuperAdmin;
use Session;

class ContactEnquiryController extends Controller {
	
	
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
		
			$title = 'Conatct Enquiry';   
			$search = DB::table('agency_contact_enquiry');		
			$search->orderby('agency_contact_enquiry.id', '=', 'desc');
			$agencies = $search->get();			
			return view('admin.contact_enquiry.index',['agencies'=>$agencies,'title'=>$title]);

		}
		
	
		// @ delete records function
		public function delete($id){		
		 $ads = DB::table('agency_contact_enquiry')			 
		->where('agency_contact_enquiry.id', $id)
		->delete();
		Session::flash('message', 'Contact Enquiry Successfully deleted!');
		Session::flash('alert-class', 'alert-info'); 
		return redirect('/admin/contact-enquiry');

		}
	 
 

}