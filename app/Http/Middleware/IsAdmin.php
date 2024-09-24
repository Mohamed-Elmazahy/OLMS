<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    public function handle($request, Closure $next)
    {
        if (auth()->user()->role == 'admin') {
            return $next($request);
        }
    
        return redirect('home')->with('error', "You don't have admin permissions.");
    }
}