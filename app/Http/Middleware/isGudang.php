<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class isGudang
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
        if(Auth::user()->role == 3 || Auth::user()->role == 4){
            return $next($request);
        }
        else {
            return redirect()->back();
        }
    }
}
