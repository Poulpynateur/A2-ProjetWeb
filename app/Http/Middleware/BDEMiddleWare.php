<?php

namespace App\Http\Middleware;

use Closure;

class BDEMiddleWare
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
        if ($request->user() && $request->user()->role->name != 'Membre BDE') {
            abort(401);
        }
        return $next($request);
    }
}
