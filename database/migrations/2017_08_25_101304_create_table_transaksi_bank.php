<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTransaksiBank extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('transaksi_bank', function (Blueprint $table) {
        $table->increments('id');
        $table->date('tg_trans');
        $table->string('uraian', 150);
        $table->integer('harga');
        $table->string('jenis_transaksi', 5);
        $table->string('bukti', 255)->nullable();
        $table->integer('biaya_adm')->nullable();
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
        Schema::dropIfExists('transaksi_bank');
    }
}
