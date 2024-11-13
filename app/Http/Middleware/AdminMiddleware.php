<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Session;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && session()->get('Designation') == "Administrator") {
            // Optionally set a session variable or handle logic
            session(['remembered' => true]);
        }else{
            Session::flash('error', 'You must login first!');
            return redirect('/');
        }


        return $next($request);
    }
}
