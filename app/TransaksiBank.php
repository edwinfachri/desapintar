<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiBank extends Model
{
    protected $fillable = [
        'tg_trans', 'uraian', 'harga', 'jenis_transaksi', 'bukti',
        'biaya_adm', 'ket', 'saldo'
    ];

    protected $table = 'transaksi_bank';
}
