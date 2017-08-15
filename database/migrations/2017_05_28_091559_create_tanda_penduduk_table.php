<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTandaPendudukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tanda_penduduk', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('induk_penduduk_id')->unsigned();
            $table->string('gol_darah', 5);
            $table->string('tempat_dikeluarkan', 100);
            $table->date('tg_dikeluarkan');
            $table->string('ortu_ayah', 100);
            $table->string('ortu_ibu', 100);
            $table->date('tg_tinggal_desa');
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
        Schema::dropIfExists('tanda_penduduk');
    }
}
