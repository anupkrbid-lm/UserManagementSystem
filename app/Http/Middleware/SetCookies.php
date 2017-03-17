<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class SetCookies
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
        if($request->hasCookie('ums_token')) {
            return $next($request);
        } else {
            $response = $next($request);
            return $response->withCookie(cookie()->forever('ums_token', Session::get('_token')));
        }
    }
}
