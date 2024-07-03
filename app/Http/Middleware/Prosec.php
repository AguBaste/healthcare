<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Prosec
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
       if($request->user()->role ==='secretary' || $request->user()->role ==='provider'){
        return $next($request);
        }
        // dd('no tienes autorización para ver este contenido, por favor vete de aquí.');
          return redirect(route('error'));
    }
}
