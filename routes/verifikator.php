<?php

Route::get('/', function () {
  return view('verifikator.dashboard');
})->name('dashboard');

Route::get('/transaksi', [App\Http\Controllers\Verifikator\HomeController::class, 'transaksi'])->name('transaksi');

Route::put('/update/{item}', [App\Http\Controllers\Verifikator\HomeController::class, 'update'])->name('update');
