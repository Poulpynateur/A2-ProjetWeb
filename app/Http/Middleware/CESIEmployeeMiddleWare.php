<?php

namespace App\Http\Middleware;

use Closure;

class CESIEmployeeMiddleWare
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
        if ($request->user() && $request->user()->role->name != 'Personnel CESI') {
            abort(403);
        }
        return $next($request);
    }
}
