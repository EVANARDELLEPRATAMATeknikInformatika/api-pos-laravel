<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        // Hanya mengambil id dan nama (karena kolom username tidak ada di databasemu)
        $data = DB::table('user')->select('id', 'nama')->get();
        
        return response()->json(["status" => "success", "data" => $data]);
    }
}