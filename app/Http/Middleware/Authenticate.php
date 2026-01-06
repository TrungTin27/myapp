<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    protected function redirectTo(Request $request)
    {
        if (! $request->expectsJson()) {

            // ADMIN
            if ($request->routeIs('admin.*') || $request->is('admin/*') || $request->is('admin')) {
                return route('admin.login');
            }

            // USER
            return route('login');
        }
    }
}
