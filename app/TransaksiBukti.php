<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiBukti extends Model
{
    protected $fillable = [
        'jenis_trans', 'id_trans', 'uraian'
    ];

    protected $table = 'transaksi_bukti';
}
