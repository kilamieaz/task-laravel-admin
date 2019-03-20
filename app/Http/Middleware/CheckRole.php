<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $admin = \App\User::where('name', 'Administrator')->first();
        if (Auth::guest()) {
            return back();
        } elseif (Auth::user()->name !== $admin->name) {
            return back();
        }
        return $next($request);
    }
}
