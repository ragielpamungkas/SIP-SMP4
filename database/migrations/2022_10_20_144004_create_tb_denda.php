<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbDenda extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_denda', function (Blueprint $table) {
            $table->id('id_denda');
            $table->string('id_peminjaman');
            $table->bigInteger('denda');
            $table->integer('lama_waktu');
            $table->date('tgl_denda');
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
        Schema::dropIfExists('tb_denda');
    }
}
