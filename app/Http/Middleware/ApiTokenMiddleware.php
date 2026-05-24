<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiTokenMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Menangkap token yang dikirim via Bearer Token
        $token = $request->bearerToken();

        if (!$token) {
            return response()->json(['status' => 'error', 'message' => 'Token tidak disertakan! Akses ditolak.'], 401);
        }

        // Memvalidasi apakah token tersebut ada di database
        $valid = DB::table('admin_auth')->where('token', $token)->first();

        if (!$valid) {
            return response()->json(['status' => 'error', 'message' => 'Token salah atau tidak valid!'], 401);
        }

        return $next($request);
    }
}