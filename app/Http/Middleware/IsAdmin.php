<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!auth()->check() || auth()->user()->role !== 'admin'){
            // abort(403);
            return redirect('/');
        } //jangan lupa daftarkan nama middlewarenya di Kernel
        return $next($request);
    }
}
