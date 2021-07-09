<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Request as RequestFacade;
use Illuminate\Http\Request;


class LocalMiddleware
{
    /**
     * @param Request $request
     * @return mixed|string|null
     */
    public static function getLocale()
    {
        $uri = RequestFacade::path();
        $segmentsURI = explode('/',$uri);
        if(!empty($segmentsURI[0]) && in_array($segmentsURI[0], config('translatable.locales'))) {
            if ($segmentsURI[0] != config('app.locale')) return $segmentsURI[0];
        }
        return null;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $locale = self::getLocale();
        if($locale)
            app()->setLocale($locale);
        else
            app()->setLocale(config('app.locale'));

        return $next($request);
    }
}
