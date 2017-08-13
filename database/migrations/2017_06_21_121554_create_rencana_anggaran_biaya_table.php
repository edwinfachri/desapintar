<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRencanaAnggaranBiayaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('buku_rencana_anggaran_biaya', function (Blueprint $table) {
        $table->increments('id');
        $table->string('tahun', 4);
        $table->string('bidang', 150);
        $table->string('kegiatan', 255);
        $table->date('waktu_pelaksanaan');
        $table->timestamps();
      });
      Schema::create('rencana_anggaran_biaya', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('buku_rencana_anggaran_biaya_id')->unsigned();
        $table->string('uraian', 255);
        $table->integer('volume');
        $table->integer('harga_satuan');
        $table->integer('jumlah');
        $table->timestamps();
        $table->foreign('buku_rencana_anggaran_biaya_id')->references('id')->on('buku_rencana_anggaran_biaya')->onDelete('cascade');;

      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('rencana_anggaran_biaya');
      Schema::dropIfExists('buku_rencana_anggaran_biaya');
    }
}
