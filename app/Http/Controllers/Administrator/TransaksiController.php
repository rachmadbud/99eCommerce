<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function transaksi()
    {
        $dataTransaksi = DB::table('transaksi')
            ->join('users', 'transaksi.id_user', '=', 'users.id')
            ->select('users.name as name', 'transaksi.*')
            ->get();

        // return $dataTransaksi;

        return view('administrator.transaksi')->with('dataTransaksi', $dataTransaksi);
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
