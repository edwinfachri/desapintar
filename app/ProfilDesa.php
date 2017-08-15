<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfilDesa extends Model
{
  protected $fillable = [
      'kepala_desa', 'provinsi', 'kota', 'kecamatan', 'alamat',
      'kode_pos', 'telp', 'fax', 'email', 'website',
      'logo', 'sekretaris_desa', 'desa'
  ];

  protected $table = 'profil_desa';
}
