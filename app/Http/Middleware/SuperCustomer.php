<?php

namespace App\Http\Middleware;

use Closure;use DB;
use Session;
class SuperCustomer
{
    /**
		* Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
	
        if(session()->has('user_id') == "")
        {
            return redirect('/logout');
        }else{					$check  = DB::table('members')			->where('id', session()->get('user_id'))			->count();				if($check>0){				}else{					session()->flush();					Session::flash('message', 'Logout Successfully'); 					Session::flash('alert-class', 'alert-success');								  return redirect('/logout');				}				}
        return $next($request);
        
    }
}
