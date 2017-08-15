<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMutasiPendudukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mutasi_penduduk', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('induk_penduduk_id')->unsigned();
            $table->string('datang_dari', 50);
            $table->date('tg_datang');
            $table->string('pindah_ke', 50);
            $table->date('tg_pindah');
            $table->string('meninggal', 50);
            $table->date('tg_meninggal');
            $table->string('ket', 255);
            $table->timestamps();
            $table->foreign('induk_penduduk_id')->references('id')
              ->on('induk_penduduk');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mutasi_penduduk');
    }
}
