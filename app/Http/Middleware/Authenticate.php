<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;
use Auth;

class Authenticate
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            return $next($request);
        } 
        else {
            return redirect()->route('login.view');
        }
    }
}
