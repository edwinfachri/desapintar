<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilDesaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('profil_desa', function (Blueprint $table) {
        $table->increments('id');
        $table->string('nik_kepala_desa', 15);
        $table->string('kepala_desa', 255);
        $table->string('nik_sekretaris_desa', 15);
        $table->string('sekretaris_desa', 255);
        $table->string('provinsi', 150);
        $table->string('kota', 150);
        $table->string('kecamatan', 150);
        $table->string('desa', 150);
        $table->string('alamat', 255);
        $table->string('kode_pos', 6);
        $table->string('telp', 15);
        $table->string('fax', 15)->nullable();
        $table->string('email', 150)->nullable();
        $table->string('website', 150)->nullable();
        $table->string('logo',150)->nullable();

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
        Schema::dropIfExists('profil_desa');
    }
}
