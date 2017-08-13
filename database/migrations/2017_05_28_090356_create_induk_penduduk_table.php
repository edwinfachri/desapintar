<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndukPendudukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('induk_penduduk', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama', 100);
            $table->string('kelamin', 5);
            $table->string('stat_kawin', 5);
            $table->string('tempat_lahir', 100);
            $table->date('tg_lahir');
            $table->string('pendidikan', 5);
            $table->string('pekerjaan', 5);
            $table->string('baca_huruf', 5);
            $table->string('kewarganegaraan', 100);
            $table->string('alamat', 255);
            $table->string('ked_keluarga', 5);
            $table->string('nik', 15);
            $table->string('no_kk', 15);
            $table->string('ket', 255);
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
        Schema::dropIfExists('induk_penduduk');
    }
}
