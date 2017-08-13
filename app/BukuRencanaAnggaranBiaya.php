<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BukuRencanaAnggaranBiaya extends Model
{
    protected $fillable = [
        'tahun', 'bidang', 'kegiatan', 'waktu_pelaksanaan'
    ];

    protected $rules = [
      
    ];

    protected $table = 'buku_rencana_anggaran_biaya';

    public function rencana_anggaran_biaya()
    {
        return $this->hasMany('App\RencanaAnggaranBiaya');
    }
}
