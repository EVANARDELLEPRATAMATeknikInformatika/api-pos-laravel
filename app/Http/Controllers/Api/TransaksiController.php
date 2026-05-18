<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function index()
    {
        $data = DB::table('transaksi as t')
            ->join('user as u', 't.user_id', '=', 'u.id')
            ->join('transaksi_detail as td', 't.id', '=', 'td.transaksi_id')
            ->join('barang as b', 'td.barang_id', '=', 'b.id')
            ->select('t.id as no_nota', 't.tanggal_transaksi', 'u.nama as nama_pembeli', 'b.nama_barang', 'td.qty', 'td.subtotal')
            ->orderBy('t.id', 'asc')
            ->get();

        if ($data->isEmpty()) {
            return response()->json([
                "status" => "success", 
                "message" => "Tidak ada data", 
                "data" => []
            ]);
        }

        $data->transform(function ($item) {
            $item->no_nota = "TRX-" . str_pad($item->no_nota, 3, '0', STR_PAD_LEFT);
            return $item;
        });

        return response()->json([
            "status" => "success",
            "data" => $data
        ]);
    }
}