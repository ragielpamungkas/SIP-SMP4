<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbBiayadenda extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_biayadenda', function (Blueprint $table) {
            $table->id('id_biaya_denda');
            $table->bigInteger('harga_denda');
            $table->enum('status',['Aktif','Tidak Aktif']);
            $table->date('tgl_tetap');
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
        Schema::dropIfExists('tb_biayadenda');
    }
}
