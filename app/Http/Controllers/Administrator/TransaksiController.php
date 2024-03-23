<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function __construct()
    {
        $this->modelTransaksi = new \App\Models\Transaksi();
    }
    public function transaksi()
    {
        $dataTransaksi = DB::table('transaksi')
            ->join('users', 'transaksi.id_user', '=', 'users.id')
            ->select('users.name as name', 'transaksi.*')
            ->get();

        // return $dataTransaksi;

        return view('administrator.transaksi')->with('dataTransaksi', $dataTransaksi);
    }

    public function detail($item)
    {
        $kode_transaksi = $item;
        $stmtDetail = $this->modelTransaksi->detailTransaksiUser($kode_transaksi);
        // return $stmtDetail;

        return view('administrator.detailTransaksi')->with('stmtDetail', $stmtDetail);
    }

    public function update(Request $request, $item)
    {
        $id = $item;
        $data = Transaksi::query()->find($id);

        $data->update([
            'id_user' => $data->id_user,
            'kode_transaksi' => $data->kode_transaksi,
            'total' => $data->total,
            'status' => $request->input('status'),
            'bukti' => $data->bukti
        ]);
        return redirect()->back();
    }
}
