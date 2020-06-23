<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\AdminInfo;
use DB;
use Mail;
use Session;



class LoginController extends Controller
{   
   
	
	public function login(Request $request)
	
    {
		$title = "Admin Login";        
        $data = compact('title');


	  if ( !empty( $request->except('_token') ) ){
        $validatedData = $request->validate([		 
        'email' => 'required',		 
		'password'  => 'required',		
	  ]);
		
	    $password = md5($request->password);
		 $get_user = AdminInfo::where('userid', $request->email)
		->where('userpassword',$password)		
		->first();		
        if(!empty($get_user->id)){        
			 session(['AdminId' => $get_user->id]);		     		    
			 return redirect('/admin/home');
		  }else{
			Session::flash('message', 'Invalid login detail'); 
			Session::flash('alert-class', 'alert-danger'); 			
			return redirect()->back();  
         }
	}
	   
		return view('admin.login.login',$data); 
	
	}
	
   

    public function logout() {	
        session()->flush();
		Session::flash('message', 'Logout Successfully'); 
		Session::flash('alert-class', 'alert-success');	
        return redirect('/admin/login');
    }
	
	
    
}
