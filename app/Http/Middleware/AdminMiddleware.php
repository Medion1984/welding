<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if(Auth::check() && Auth::user()->is_admin){
            return $next($request);
        }
        
        abort(404);
    }
}
