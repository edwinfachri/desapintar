<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TandaPenduduk extends Model
{
    protected $fillable = [
        'induk_penduduk_id', 'gol_darah', 'tempat_dikeluarkan', 'tg_dikeluarkan', 'ortu_ayah',
        'ortu_ibu', 'tg_tinggal_desa', 'ket'
    ];

    protected $table = 'tanda_penduduk';

    public function category() {
      return $this->belongsTo('IndukPenduduk');
    }
}
