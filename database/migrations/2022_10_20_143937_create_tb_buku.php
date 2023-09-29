<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbBuku extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_buku', function (Blueprint $table) {
            $table->string('id_buku')->primary();
            $table->integer('id_rak');
            $table->integer('id_kategori');
            $table->string('judul');
            $table->string('penulis'); 
            $table->string('penerbit'); 
            $table->year('tahun');
            $table->integer('jumlah'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_buku');
    }
}
