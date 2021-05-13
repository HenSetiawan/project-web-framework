<?php

namespace App\Http\Middleware\Roles;

use Closure;
use Illuminate\Http\Request;

class UsersMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->user()->tokenCan('role:user')) {
            return $next($request);
        }

        return response()->json('Unauthorized')->setStatusCode(401);
    }
}
