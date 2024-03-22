<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang';

    public function getDataBarang()
    {
        $stmtDataBarang = DB::table('barang')
            ->orderBy('id', 'DESC')
            ->get();

        return $stmtDataBarang;
    }

    public function insertBarang($stmtBarangPost)
    {
        // insert data Barang
        $stmtBarangCreate = DB::table('barang')
            ->insert($stmtBarangPost);

        return $stmtBarangCreate;
    }

    public function hapusBarang($id)
    {
        // delete data dari tabel tata_kelolas
        $stmtBarangDelete = DB::table('barang')
            ->where('id', $id)
            ->delete();

        return $stmtBarangDelete;
    }
}
