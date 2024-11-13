<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Session;

class ClientMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && session()->get('Designation') == "Client") {
            // Optionally set a session variable or handle logic
            if(session()->get('Status') != "Active"){
                Session::flash('error', 'You are temporary Banned, Please contact the Administrator');
                return redirect('/');
            }else{
                session(['remembered' => true]);
            }
        }else{
            Session::flash('error', 'You must login first!');
            return redirect('/');
        }


        return $next($request);
    }
}
