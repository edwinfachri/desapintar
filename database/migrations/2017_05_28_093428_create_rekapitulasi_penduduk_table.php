<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRekapitulasiPendudukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekapitulasi_penduduk', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_dusun', 50);
            $table->integer('jml_awal_wna_l');
            $table->integer('jml_awal_wna_p');
            $table->integer('jml_awal_wni_l');
            $table->integer('jml_awal_wni_p');
            $table->integer('jml_awal_penduduk');
            $table->integer('jml_awal_keluarga');
            $table->integer('jml_awal_jiwa');
            $table->integer('tambah_lhr_wna_l');
            $table->integer('tambah_lhr_wna_p');
            $table->integer('tambah_lhr_wni_l');
            $table->integer('tambah_lhr_wni_p');
            $table->integer('tambah_dtg_wna_l');
            $table->integer('tambah_dtg_wna_p');
            $table->integer('tambah_dtg_wni_l');
            $table->integer('tambah_dtg_wni_p');
            $table->integer('kurang_mati_wna_l');
            $table->integer('kurang_mati_wna_p');
            $table->integer('kurang_mati_wni_l');
            $table->integer('kurang_mati_wni_p');
            $table->integer('kurang_pergi_wna_l');
            $table->integer('kurang_pergi_wna_p');
            $table->integer('kurang_pergi_wni_l');
            $table->integer('kurang_pergi_wni_p');
            $table->integer('jml_akhir_wna_l');
            $table->integer('jml_akhir_wna_p');
            $table->integer('jml_akhir_wni_l');
            $table->integer('jml_akhir_wni_p');
            $table->integer('jml_akhir_kk');
            $table->integer('jml_akhir_keluarga');
            $table->integer('jml_akhir_jiwa');
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
        Schema::dropIfExists('rekapitulasi_penduduk');
    }
}
