<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatistikController extends Controller
{
    public function index()
    {
        // Query Builder Laravel untuk rekap statistik bulanan
        $data = DB::table('transaksi')
            ->select(
                DB::raw('MONTHNAME(tanggal_transaksi) as bulan'),
                DB::raw('YEAR(tanggal_transaksi) as tahun'),
                DB::raw('COUNT(id) as total_trx')
            )
            ->groupBy('tahun', DB::raw('MONTH(tanggal_transaksi)'), 'bulan')
            ->orderBy('tahun', 'asc')
            ->orderBy(DB::raw('MONTH(tanggal_transaksi)'), 'asc')
            ->get();

        // Jika data kosong
        if ($data->isEmpty()) {
            return response()->json([
                "status" => "success", 
                "message" => "Tidak ada data statistik", 
                "data" => []
            ]);
        }

        return response()->json([
            "status" => "success",
            "data" => $data
        ]);
    }
}