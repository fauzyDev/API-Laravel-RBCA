<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $user = Auth::user(); // Ambil user dari token

        // Jika user tidak ada (belum login), kembalikan error JSON Unauthorized
        if (!$user) {
            return response()->json([
                'status' => 401,
                'message' => 'Unauthorized!',
            ], 401);
        }

        // Jika role user tidak sesuai, kembalikan error JSON Forbidden
        if (!in_array($user->role, $roles)) {
            return response()->json([
                'status' => 403,
                'message' => 'Akses ditolak!'
            ], 403);
        }

        return $next($request);
    }
}
