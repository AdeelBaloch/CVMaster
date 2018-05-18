<?php

namespace App\Http\Middleware;

use Closure;
use Log;
use Session;
use Redirect;

class RedirectIfUserNotLoggedIn
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
        if(!Session::has("UserId")) 
              return redirect(route("AuthenticationMain"));
        
        return $next($request);
    }
}
