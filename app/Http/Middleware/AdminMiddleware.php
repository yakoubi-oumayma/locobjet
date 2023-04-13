<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use function Symfony\Component\String\u;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check()){
            if(Auth::user()->role=='1'){
                return $next($request);
            } else{
                return redirect('/home')->with('acces refuser vous etes pas un admin');

            }
        }else{
            return redirect('/login')->with('il faut se connecter ');

        }
        return $next($request);
    }
}
