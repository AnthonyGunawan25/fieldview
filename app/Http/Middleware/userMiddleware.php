<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class userMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $user)
    {
        if(Auth::check() && Auth::user()->role == $user){
            return $next($request);
        }
        return redirect('/homePage');
        
    }
}
