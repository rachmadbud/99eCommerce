<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Chart extends Model
{
    use HasFactory;


    public function insertChart($stmtChartPost)
    {
        // insert data Barang
        $stmtChartCreate = DB::table('chart')
            ->insert($stmtChartPost);

        return $stmtChartCreate;
    }

    public function dataChart()
    {
        $stmtJoinData = DB::table('chart')
            ->join('users', 'chart.id_user', '=', 'users.id')
            ->join('barang', 'chart.id_barang', '=', 'barang.id')
            ->select('users.name as name', 'barang.nama as nama', 'barang.harga as harga', 'barang.id as id_barang', 'barang.img as img', 'chart.id as id')
            ->where('id_user', Auth::user()->id)
            ->get();

        return $stmtJoinData;
    }

    public function total()
    {
        $stmtTotal = DB::table('chart')
            ->join('users', 'chart.id_user', '=', 'users.id')
            ->join('barang', 'chart.id_barang', '=', 'barang.id')
            ->select('barang.harga as harga')
            ->where('id_user', Auth::user()->id)
            ->sum('harga');

        return $stmtTotal;
    }

    public function hapusChart($id_user)
    {
        // delete data dari tabel tata_kelolas
        $stmtChartDelete = DB::table('chart')
            ->where('id_user', $id_user)
            ->delete();

        return $stmtChartDelete;
    }
}
