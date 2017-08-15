<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KetTidakMampu extends Model
{

    protected $fillable = [
        'nomor', 'nama', 'nilk', 'tempat_lahir', 'tanggal_lahir', 'kelamin',
        'kewarganegaraan', 'agama', 'pekerjaan', 'status', 'alamat',
        'keperluan', 'masa_berlaku_start', 'masa_berlaku_end'
    ];

    protected $table = 'ket_tidak_mampu';
}
