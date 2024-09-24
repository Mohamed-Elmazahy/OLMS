<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsStudent
{
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user()->role == 'student') {
            return $next($request);
        }
    
        return redirect('home')->with('error', "You don't have student permissions.");
    }
}