<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class Localization
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

        if(Session::has('locale') && in_array(Session::get('locale'), explode('|', env('APP_LANGS')))) {
            App::setlocale(Session::get('locale'));
        } else {
            App::setlocale(env('APP_DEFAULT_LANG'));
        }

        return $next($request);
    }
}
