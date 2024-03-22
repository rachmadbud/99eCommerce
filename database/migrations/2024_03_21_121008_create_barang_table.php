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

        DB::table('barang')->insert(['img' => 'kdjabcak2kjw32.png', 'nama' => 'sepatu eiger', 'harga' => 1200000]);
        DB::table('barang')->insert(['img' => 'iduygsjdccadcs2.png', 'nama' => 'Everest 50L Consina', 'harga' => 2000000]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
};
