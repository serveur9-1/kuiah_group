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

            if($request->get('lang') == "fr") {
                $request->request->add(["is_fr" => true]);
            } elseif ($request->get('lang') == "en") {
                $request->request->add(['is_fr' => false]);
            }

        } else {
            $request->request->add(['is_fr' => 'fr']);
        }

        return $next($request);
    }
}
