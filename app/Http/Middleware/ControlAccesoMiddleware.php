<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;

class ControlAccesoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->check() && (auth()->user()->estado == 0)){
          
          auth()->guard('web')->logout();
          $request->session()->invalidate();
          $request->session()->regenerateToken();
          return redirect('/')->with('status', 'Cuenta Desactivada, Comuniquese con el Administrador');
        }

         return $next($request);
 
         
    }
}