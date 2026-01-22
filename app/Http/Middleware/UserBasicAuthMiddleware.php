<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserBasicAuthMiddleware
{
    public function handle(Request $request, Closure $next){
        $username = env('BASIC_AUTH_USER', 'user');
        $password = env('BASIC_AUTH_PASS_USER', 'secret123');

        if ($request->getUser() !== $username || $request->getPassword() !== $password) {
            return response('Unauthorized', 401, ['WWW-Authenticate' => 'Basic']);
        }

        return $next($request);
    }
}
