<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PendudukSementara extends Model
{
    protected $fillable = [
        'induk_penduduk_id', 'tanda_pengenal', 'kebangsaan', 'keturunan', 'datang_dari',
        'tujuan_datang', 'nama_datang', 'alamat_datang', 'tg_datang', 'tg_pergi', 'ket'
    ];

    protected $table = 'penduduk_sementara';

    public function category() {
      return $this->belongsTo('IndukPenduduk');
    }
}
