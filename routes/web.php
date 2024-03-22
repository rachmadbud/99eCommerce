<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\User\HomeController::class, 'index'])->name('/');

Auth::routes();

Route::get('/home', [App\Http\Controllers\User\HomeController::class, 'index'])->name('home');

Route::post('/addToChart', [App\Http\Controllers\User\ChartController::class, 'addToChart'])->name('addToChart');

Route::get('/chart', [App\Http\Controllers\User\ChartController::class, 'cart'])->name('cart');

Route::post('/cekout', [App\Http\Controllers\User\ChartController::class, 'cekout'])->name('cekout');

Route::get('/deleteItemChart/{item}', [App\Http\Controllers\User\ChartController::class, 'deleteItemChart'])->name('deleteItemChart');

Route::get('/transaksi', [App\Http\Controllers\User\TransaksiController::class, 'transaksi'])->name('transaksi');

Route::put('/updateImage/{item}', [App\Http\Controllers\User\TransaksiController::class, 'updateImage'])->name('updateImage');
