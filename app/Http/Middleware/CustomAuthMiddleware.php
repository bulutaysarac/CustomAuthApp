<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\User;

class CustomAuthMiddleware
{
    /**
     * @param Request $request
     * @param Closure $next
     * @return JsonResponse|mixed
     */
    public function handle(Request $request, Closure $next): mixed
    {
        $token = $request->bearerToken();

        if (!$token || !$user = User::where('api_token', $token)->first()) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $request->user = $user;

        return $next($request);
    }
}

