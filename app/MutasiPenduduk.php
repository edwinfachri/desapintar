<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MutasiPenduduk extends Model
{
    protected $fillable = [
        'induk_penduduk_id', 'datang_dari', 'tg_datang', 'pindah_ke', 'tg_pindah',
        'meninggal', 'tg_meninggal', 'ket'
    ];

    protected $table = 'mutasi_penduduk';

    public function category() {
      return $this->belongsTo('IndukPenduduk');
    }
}
