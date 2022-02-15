<?php

namespace App\Http\Middleware;

use Closure;
use App\JWT\Jwt;
use Exception;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

class JwtMiddleware extends BaseMiddleware
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
        try {
            $user = Jwt::validate($request->bearerToken());
            
        } catch (Exception $e) {
                return response()->json(['status' => 'Authorization Token not found']);
        }
        return $next($request);
    }
}