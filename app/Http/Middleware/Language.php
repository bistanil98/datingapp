<?php
	
namespace App\Http\Middleware;

use Closure;
use Illuminate\Routing\Redirector;
use Illuminate\Http\Request;
use Illuminate\Foundation\Application;
use Session;

class Language {

    public function __construct(Application $app, Redirector $redirector, Request $request) {
        $this->app = $app;
        $this->redirector = $redirector;
        $this->request = $request;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {	
        // Make sure current locale exists.
		
		
         if (Session::has('lang')) :
            $locale = Session::get('lang');
        else :
            $locale = $this->app->config->get('app.fallback_locale');
        endif; 
		
        $this->app->setLocale($locale);

        return $next($request);
    }

}
?>