<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTransaksiTunai extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('transaksi_tunai', function (Blueprint $table) {
        $table->increments('id');
        $table->date('tg_trans');
        $table->string('kd_rek', 5);
        $table->string('uraian', 150);
        $table->integer('harga');
        $table->integer('volume');
        $table->string('jenis_dana', 5);
        $table->string('bukti', 255)->nullable();
        $table->integer('saldo')->nullable();
        $table->string('ket', 255)->nullable();
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
        Schema::dropIfExists('transaksi_tunai');
    }
}
