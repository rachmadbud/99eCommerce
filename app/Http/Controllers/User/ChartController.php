<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->modelChart = new \App\Models\Chart();
        $this->modelTransaksi = new \App\Models\Transaksi();
    }

    public function addToChart(Request $request)
    {
        $stmtChartPost = [
            'id_user' => $request->input('id_user'),
            'id_barang' => $request->input('id_barang'),
            'created_at' => DB::raw('NOW()')
        ];

        $stmtChartCreate = $this->modelChart->insertChart($stmtChartPost);

        if ($stmtChartCreate) {
            return redirect()->to('/chart')->with('message', 'Berhasil tersimpan...!!');
        } else {
            return redirect()->to('/chart')->with('message', 'Gagal');
        }
    }

    public function cart()
    {
        $stmtDataChart = $this->modelChart->dataChart();
        // return $stmtDataChart;
        $stmtTotal = $this->modelChart->total();

        return view('user.chart')->with('stmtDataChart', $stmtDataChart)
            ->with('stmtTotal', $stmtTotal);
    }

    public function cekout(Request $request)
    {
        $id_user  = Auth::user()->id;
        // dd($id_user);
        $kodeTransaksi = uniqid();
        $status = 'menunggu';

        $barangs = $request->input('barang');

        $dataToInsert = [];


        $stmtTransaksiPost = [
            'id_user' => Auth::user()->id,
            'kode_transaksi' => $kodeTransaksi,
            'total' => $request->input('total'),
            'status' => $status,
            'created_at' => DB::raw('NOW()')
        ];

        $stmtDetailTransaksiPost = [
            'id_user' => Auth::user()->id,
            'kode_transaksi' => $kodeTransaksi,
            'barang' => $kodeTransaksi,
        ];

        // Menggabungkan data barang dan harga dengan user id
        foreach ($barangs as $key => $barangId) {
            $dataToInsert[] = [
                'id_user' => Auth::user()->id,
                'barang' => $barangId,
                'kode_transaksi' => $kodeTransaksi,
                'created_at' => DB::raw('NOW()')
            ];
        }

        $stmtChartCreate = $this->modelTransaksi->inputTransaksi($stmtTransaksiPost);
        $stmtDetailTransaksi = $this->modelTransaksi->inputDetailTransaksi($dataToInsert);
        $stmtHapusChart = $this->modelChart->hapusChart($id_user);

        return redirect()->to('/transaksi')->with('message', 'Berhasil CekOut, Silahkan melampirkan bukti transaksi...!!');
    }

    public function deleteItemChart($item)
    {
        $stmtDelete = DB::table('chart')
            ->where('id', $item)
            ->delete();

        return redirect()->to('/chart')->with('message', 'Berhasil dihapus...!!');
    }
}
