<?php

Route::get('/', function () {
  return view('administrator.dashboard');
})->name('dashboard');

Route::get('/barang', [App\Http\Controllers\Administrator\BarangController::class, 'index'])->name('barang');

Route::post('/barang', [App\Http\Controllers\Administrator\BarangController::class, 'inputBarang'])->name('inputBarang');
Route::get('/hapusBarang/{item}', [App\Http\Controllers\Administrator\BarangController::class, 'hapusBarang'])->name('hapusBarang');

Route::get('/transaksi', [App\Http\Controllers\Administrator\TransaksiController::class, 'transaksi'])->name('transaksi');
Route::get('/detail/{item}', [App\Http\Controllers\Administrator\TransaksiController::class, 'detail'])->name('detail');

Route::put('/update/{item}', [App\Http\Controllers\Administrator\TransaksiController::class, 'update'])->name('update');
