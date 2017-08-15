<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RekapitulasiPenduduk extends Model
{
    protected $fillable = [
        'nama_dusun', 'jml_awal_wna_l', 'jml_awal_wna_p', 'jml_awal_wnai_l', 'jml_awal_wni_p',
        'jml_awal_penduduk', 'jml_awal_keluarga', 'jml_awal_jiwa', 'tambah_lhr_wna_l', 'tambah_lhr_wna_p',
        'tambah_lhr_wni_l', 'tambah_lhr_wni_p', 'tambah_dtg_wna_l', 'tambah_dtg_wna_p', 'tambah_dtg_wni_l',
        'tambah_dtg_wni_p', 'kurang_mati_wna_l', 'kurang_mati_wna_p', 'kurang_mati_wni_l', 'kurang_mati_wni_p',
        'kurang_pergi_wna_l', 'kurang_pergi_wna_p', 'kurang_pergi_wni_l', 'kurang_pergi_wni_p', 'jml_akhir_wna_l',
        'jml_akhir_wna_p', 'jml_akhir_wni_l', 'jml_akhir_wni_p', 'jml_akhir_kk', 'jml_akhir_keluarga',
        'jml_akhir_jiwa', 'ket'
    ];

    protected $table = 'rekapitulasi_penduduk';
}
