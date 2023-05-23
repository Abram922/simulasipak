<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AuthPort
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // if(auth()->user()->role==1){
        //     return $next($request);
        // }
        // /////

        if (!Auth::check()) {
            return redirect(('/login'));
        }

        $user = Auth::user();

        if ($user->role == 1) {
            return $next($request);
        }
        else if ($user->role == 2) {
            return $next($request);
        }
        return redirect('home')->with('error', "you dont have access to admin");
    }
}
