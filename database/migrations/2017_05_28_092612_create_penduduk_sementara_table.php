<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePendudukSementaraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penduduk_sementara', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('induk_penduduk_id')->unsigned();
            $table->string('tanda_pengenal', 15);
            $table->string('kebangsaan', 50);
            $table->string('keturunan', 50);
            $table->string('datang_dari', 50);
            $table->string('tujuan_datang', 50);
            $table->string('nama_datang', 50);
            $table->string('alamat_datang', 100);
            $table->date('tg_datang');
            $table->date('tg_pergi');
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
        Schema::dropIfExists('penduduk_sementara');
    }
}
