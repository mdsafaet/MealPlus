<?php

namespace App\Http\Middleware;

use App\Traits\ApiResponseTrait;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    use ApiResponseTrait;
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next ,...$roles): Response
    {
        $user=auth('api')->user();

        if (!$user) {
            return $this->unauthorized();
        }

        if (!$user->role || !in_array($user->role->name, $roles)) {
            return $this->forbidden();
        }

        return $next($request);
    }
}
