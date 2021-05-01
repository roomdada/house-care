<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class House
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
        $user = auth()->user();
        if ($user->role_id != 3) {
            session()->flush();
            return back();
        }
        return $next($request);
    }
}
