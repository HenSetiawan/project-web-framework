<?php

namespace App\Http\Middleware\Roles;

use Closure;
use Illuminate\Http\Request;

class AdminsMiddleware
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
        if($request->user()->tokenCan('role:admin')) {
            return $next($request);
        }
        return response()->json(
            ['message' => 'Unauthorized']
        )->setStatusCode(401);
    }
}
