<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BarangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->modelBarang = new \App\Models\Barang();
    }

    public function index()
    {
        $barang = $this->modelBarang->getDataBarang();

        return view('administrator.barang')->with('barang', $barang);
    }

    public function inputBarang(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif',
            'harga' => 'required|numeric',
        ], [
            'nama.required' => 'Kolom Nama Barang harus diisi',
            'harga.required' => 'Kolom Harga harus diisi',
            'harga.numeric' => 'Kolom Harga harus angka, ditak boleh ada karakter',
            'file.required' => 'file tidak boleh kosong',
            'file.mimes' => 'file harus bertipe pdf',
            'file.max' => 'Ukuran files maksimum adalah 3000 bytes'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->hasFile('file')) {
            $file = $request->file('file')->store('user/barang');
        }

        $stmtBarangPost = [
            'nama' => $request->input('nama'),
            'harga' => $request->input('harga'),
            'img' => $file,
            'created_at' => DB::raw('NOW()')
        ];

        $stmtBarangCreate = $this->modelBarang->insertBarang($stmtBarangPost);

        if ($stmtBarangCreate) {
            return redirect()->to('/administrator/barang')->with('message', 'Berhasil tersimpan...!!');
        } else {
            return redirect()->to('/administrator/barang')->with('message', '<script>alert("Gagal");</script>');
        }
    }

    public function hapusBarang($item)
    {
        $id = $item;

        $stmthapusBarang = $this->modelBarang->hapusBarang($id);
        if ($stmthapusBarang) {
            return redirect()->to('/administrator/barang')->with('message', 'Berhasil dihapus...!!');
        } else {
            return redirect()->to('/administrator/barang')->with('message', '<script>alert("Gagal");</script>');
        }
    }
}
