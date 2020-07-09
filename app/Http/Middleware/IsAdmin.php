<?php

namespace App\Http\Middleware;

use Closure;

class IsAdmin
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
        if(auth()->user()) {
            if(auth()->user()->is_admin == 1){
                return $next($request);
            }
        } else {
            return redirect()->route('frontend.home')->with('error',"You don't have admin access.");
        }
   
        return redirect()->route('frontend.home')->with('error',"You don't have admin access.");
    }
}
