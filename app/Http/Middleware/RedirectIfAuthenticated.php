<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            return redirect(RouteServiceProvider::HOME);
        }
        // $user = \App\User::where('email', $request->email)->first();
        // if ($user->roles_id == '1') {
        //     return redirect('/admin');
        // } elseif ($user->roles_id == '2') {
        //     return redirect('/beranda');
        // }

        return $next($request);
    }
}
