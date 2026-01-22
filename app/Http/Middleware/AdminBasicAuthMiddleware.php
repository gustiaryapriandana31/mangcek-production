<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminBasicAuthMiddleware
{
    public function handle(Request $request, Closure $next){
        $username = env('BASIC_AUTH_ADMIN', 'admin');
        $password = env('BASIC_AUTH_PASS_ADMIN', 'secret123');

        if ($request->getUser() !== $username || $request->getPassword() !== $password) {
            return response('Unauthorized', 401, ['WWW-Authenticate' => 'Basic']);
        }

        return $next($request);
    }
}
