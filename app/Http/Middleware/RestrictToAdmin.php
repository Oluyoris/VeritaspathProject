<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RestrictToAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && in_array(Auth::user()->email, [
            'admin@veritaspathsoln.com',
            'newadmin@veritaspathsoln.com',
        ])) {
            return $next($request);
        }

        return redirect('/')->with('error', 'Only admins can access this area.');
    }
}