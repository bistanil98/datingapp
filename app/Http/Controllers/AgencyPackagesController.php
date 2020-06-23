<?php
	namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Model\Customer;
use DB;
use Session;
use Mail;
use App\Jobs\SendEmailJob;
use App\Http\Middleware\SuperCustomer;
use Illuminate\Http\UploadedFile;

class AgencyPackagesController  extends Controller
{
    
    public function __construct(){
        // there are only function allow same auth 		
		$this->middleware(SuperCustomer::class, ['except' => ['subida_zone','zona_top']]);
		// Alternativly
		//$this->middleware('auth', ['except' => ['index', 'show']]);
    }


	
	
}
