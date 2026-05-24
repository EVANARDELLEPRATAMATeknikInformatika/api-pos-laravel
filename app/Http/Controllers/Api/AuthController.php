<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Mengecek apakah username dan password cocok di database
        $user = DB::table('admin_auth')
            ->where('username', $request->username)
            ->where('password', $request->password)
            ->first();

        // Jika benar, buatkan token random dan simpan ke database
        if ($user) {
            $token = Str::random(40);
            DB::table('admin_auth')->where('id', $user->id)->update(['token' => $token]);
            
            return response()->json([
                "status" => "success",
                "message" => "Login berhasil",
                "token" => $token
            ]);
        }

        // Jika salah
        return response()->json([
            "status" => "failed",
            "message" => "Username atau Password salah!"
        ], 401);
    }
}