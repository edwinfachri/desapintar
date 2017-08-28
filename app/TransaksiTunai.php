<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiTunai extends Model
{
    protected $fillable = [
        'tg_trans', 'kd_rek', 'uraian', 'harga', 'volume', 'jenis_dana', 'bukti',
        'ket', 'saldo'
    ];

    protected $table = 'transaksi_tunai';
}
