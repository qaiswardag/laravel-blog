<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MustBeAdministrator
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if (auth()->guest()) {
            // abort(403);
            abort(Response::HTTP_FORBIDDEN);
        }

        // if signed in but not an admin
        if (auth()->user()->username !== 'qais') {
            abort(Response::HTTP_FORBIDDEN);
        }


        return $next($request);
    }
}
