<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class CheckForLanguage
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
        if($request->has('lang') && $request->filled('lang')) {

            if($request->get('lang') == "fr" || $request->get('lang') == "en") {
                $request->request->add(["lang" => $request->get('lang')]);
            } else {
                $request->request->add(['lang' => 'fr']);
            }

        } else {
            $request->request->add(['lang' => 'fr']);
        }

        return $next($request);
    }
}
