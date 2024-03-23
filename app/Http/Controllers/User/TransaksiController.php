<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function __construct()
    {
        $this->modelTransaksi = new \App\Models\Transaksi();
    }
    public function transaksi()
    {
        $dataTransaksi = $this->modelTransaksi->getDataTransaksi();
        return view('user.transaksi')->with('dataTransaksi', $dataTransaksi);
    }

    public function updateImage(Request $request, $item)
    {
        $data = Transaksi::query()->find($item);

        if ($request->hasFile('bukti')) {
            $file = $request->file('bukti')->store('user/img');
        }

        $data->update([
            'id_user' => $request->input('idUser'),
            'kode_transaksi' => $request->input('kodeTransaksi'),
            'total' => $request->input('total'),
            'status' => $request->input('status'),
            'bukti' => $file
        ]);

        return redirect()->to('/transaksi')->with('message', 'Berhasil upload bukti transaksi...!!');
    }

    public function detail($item)
    {
        $kode_transaksi = $item;
        $stmtDetail = $this->modelTransaksi->detailTransaksiUser($kode_transaksi);
        // return $stmtDetail;

        return view('user.detailTransaksi')->with('stmtDetail', $stmtDetail);
    }
}
