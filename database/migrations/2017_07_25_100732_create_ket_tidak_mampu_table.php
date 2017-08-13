<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKetTidakMampuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('ket_tidak_mampu', function (Blueprint $table) {
        $table->increments('id');
        $table->string('nomor', 50);
        $table->string('nama', 100);
        $table->string('nilk', 20);
        $table->string('tempat_lahir', 75);
        $table->date('tanggal_lahir');
        $table->string('kelamin', 5);
        $table->string('kewarganegaraan', 50);
        $table->string('agama', 5);
        $table->string('pekerjaan', 100);
        $table->string('status', 100);
        $table->string('alamat', 255);
        $table->string('keperluan', 150);
        $table->date('masa_berlaku_start');
        $table->date('masa_berlaku_end');

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
        Schema::dropIfExists('ket_tidak_mampu');
    }
}
