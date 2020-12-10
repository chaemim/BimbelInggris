<?php

namespace App\Http\Middleware;

use Closure;

class CekStatus
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
        $user = \App\User::where('email', $request->email)->first();
        if ($user->roles_id == '1') {
            return redirect('/admin');
        } elseif ($user->roles_id == '2') {
            return redirect('/beranda');
        }

        return $next($request);
    }
}
