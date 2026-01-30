<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Laravel\Sanctum\Sanctum;
use Symfony\Component\HttpFoundation\Response;

class AdminApiAuth
{
    public function handle(Request $request, Closure $next): Response
    {
        // ✅ ONLY Bearer token (API-safe)
        $token = $request->bearerToken();

        if ($token && $this->authenticateWithToken($token)) {
            return $next($request);
        }

        return response()->json([
            'success' => false,
            'message' => 'Unauthorized. Please log in again.',
        ], 401);
    }

    protected function authenticateWithToken(string $token): bool
    {
        try {
            $model = Sanctum::$personalAccessTokenModel;
            $accessToken = $model::findToken($token);

            if (
                $accessToken &&
                $accessToken->tokenable instanceof \App\Models\Admin
            ) {
                // ✅ IMPORTANT: set user on admin_api guard
                auth('admin_api')->setUser($accessToken->tokenable);
                \Log::debug('Admin API Auth Success', ['admin_id' => $accessToken->tokenable->id]);
                return true;
            }
            \Log::warning('Admin API Auth Failed: Token invalid or not an admin');
        } catch (\Throwable $e) {
            \Log::error('Admin API token auth failed', [
                'error' => $e->getMessage(),
            ]);
        }

        return false;
    }
}
