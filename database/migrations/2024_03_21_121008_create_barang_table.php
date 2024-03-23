<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->id();
            $table->string('img');
            $table->string('nama');
            $table->integer('harga');
            $table->timestamps();
        });

        DB::table('barang')->insert(['id' => 2,  'img' => 'user/img/everestTitaniumConsina.jpg', 'nama' => 'Everest 50L Consina', 'harga' => 2000000]);
        DB::table('barang')->insert(['id' => 4,  'img' => 'user/barang/2u0y4evbjTemDQR6zziJSeL30sdpucLvonyYBi2o.jpg', 'nama' => 'Sleping Pad Consina', 'harga' => 170000]);
        DB::table('barang')->insert(['id' => 5,  'img' => 'user/barang/6m3MpLf3Ij3V6BDJymZyqbYd7JGdFFXZST9I2pZ6.jpg', 'nama' => 'Consina TPJ 43 DGR', 'harga' => 80000]);
        DB::table('barang')->insert(['id' => 6,  'img' => 'user/barang/6wyzQUK54dQ0HYprrES8Nzwrqc3lJukDP9mRKi5p.jpg', 'nama' => 'Mamba Mid Eiger', 'harga' => 1200000]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
};
