<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Provider
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
        $provider = auth()->user();
        if ($provider->role_id != 2) {
            session()->flush();
            return back();
        }
        return $next($request);
    }
}
