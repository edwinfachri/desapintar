<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RencanaAnggaranBiaya extends Model
{
  protected $fillable = [
      'uraian', 'volume', 'harga_satuan', 'jumlah'
  ];

  protected $table = 'rencana_anggaran_biaya';

  public function buku_rencana_anggaran_biaya() {
    return $this->belongsTo('BukuRencanaAnggaranBiaya');
  }
}
