<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DetailController extends Controller
{
    public function index()
    {
        $data = DB::table('transaksi_detail as td')
            ->join('transaksi as t', 'td.transaksi_id', '=', 't.id')
            ->join('barang as b', 'td.barang_id', '=', 'b.id')
            ->select('td.id', 't.id as nota_transaksi', 'b.nama_barang', 'td.qty', 'td.subtotal')
            ->get();
            
        return response()->json(["status" => "success", "data" => $data]);
    }
}