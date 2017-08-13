<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IndukPenduduk extends Model
{
    protected $fillable = [
        'nama', 'kelamin', 'stat_kawin', 'tempat_lahir', 'tg_lahir',
        'pendidikan', 'pekerjaan', 'baca_huruf', 'kewarganegaraan', 'alamat',
        'ked_keluarga', 'nik', 'no_kk', 'ket'
    ];

    protected $rules = [

    ];

    protected $table = 'induk_penduduk';
}
