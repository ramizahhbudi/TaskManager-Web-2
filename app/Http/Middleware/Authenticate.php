<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Redirect pengguna yang tidak autentik ke halaman login.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        // Jika pengguna belum login dan mencoba mengakses halaman, arahkan ke login
        if (! $request->expectsJson()) {
            return route('login');
        }
    }
}
