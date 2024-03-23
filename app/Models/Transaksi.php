<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';
    protected $guarded = [];

    public function inputTransaksi($stmtTransaksiPost)
    {
        $stmtInputTransaksi = DB::table('transaksi')
            ->insert($stmtTransaksiPost);

        return $stmtInputTransaksi;
    }

    public function inputDetailTransaksi($dataToInsert)
    {
        $stmtInputDetailTransaksi = DB::table('detail_transaksi')
            ->insert($dataToInsert);

        return $stmtInputDetailTransaksi;
    }

    public function getDataTransaksi()
    {
        $stmtDataTransaksi = DB::table('transaksi')
            ->where('id_user', Auth::user()->id)
            ->get();
        return $stmtDataTransaksi;
    }

    public function updateDataTransaksi($item, $stmtUpdateTransaksi)
    {
        $stmtInputDetailTransaksi = DB::table('detail_transaksi')
            ->where('id', $item)
            ->update($stmtUpdateTransaksi);

        return $stmtInputDetailTransaksi;
    }

    public function detailTransaksiUser($kode_transaksi)
    {
        $stmtDetailTransaksiUser = DB::table('detail_transaksi')
            ->join('users', 'detail_transaksi.id_user', '=', 'users.id')
            ->join('barang', 'detail_transaksi.barang', '=', 'barang.id')
            ->where('kode_transaksi', $kode_transaksi)
            ->get();

        return $stmtDetailTransaksiUser;
    }
}
