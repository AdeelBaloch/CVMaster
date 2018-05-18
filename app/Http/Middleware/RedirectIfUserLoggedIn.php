<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class RedirectIfUserLoggedIn
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
        if(Session::has("UserId"))
              return redirect(route("home"));

        return $next($request);
    }
}
