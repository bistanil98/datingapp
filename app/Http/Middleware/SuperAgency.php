<?php

namespace App\Http\Middleware;

use Closure;use DB;use Session;

class SuperAgency
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
	
        if(session()->has('agency_id') == "")
        {
            return redirect('/agencia-logout');
        }else{		$check  = DB::table('members')			->where('id', session()->get('agency_id'))			->count();				if($check>0){				}else{					session()->flush();					Session::flash('message', 'Logout Successfully'); 					Session::flash('alert-class', 'alert-success');								   return redirect('/agencia-logout');				}						}
        return $next($request);
        
    }
}
