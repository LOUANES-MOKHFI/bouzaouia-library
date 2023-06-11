<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request)
    {
        if (!$request->expectsJson()) {
            if(request()->routeIs('admin.*')){
                return route('admin.login');
            }
            else{
                //return redirect()->setIntendedUrl(url()->previous());
                return route('home');
            }

        }
    }
}
