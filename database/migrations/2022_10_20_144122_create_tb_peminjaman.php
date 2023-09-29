<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbPeminjaman extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_peminjaman', function (Blueprint $table) {
            $table->string('id_peminjaman')->primary();
            $table->string('id_pengguna');
            $table->string('id_buku');
            $table->enum('status',['Dikembalikan','Belum Dikembalikan']);
            $table->date('tgl_peminjaman');
            $table->integer('lama_peminjaman');
            $table->date('tgl_balik');
            $table->date('tgl_kembali');
            $table->bigInteger('denda');
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
        Schema::dropIfExists('tb_peminjaman');
    }
}
