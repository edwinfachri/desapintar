<html>
<?php $grand_total = 0; ?>
<tr>
  <td></td>
  <td colspan='4' style="text-align:center;">PEMERINTAH KABUPATEN {{ strtoupper($profil_desa->kota) }}</td>
  <td></td>
</tr>
<tr>
  <td></td>
  <td colspan='4' style="text-align:center;">KECAMATAN {{ strtoupper($profil_desa->kecamatan) }}</td>
  <td></td>
</tr>
<tr>
  <td></td>
  <td colspan='4' style="text-align:center;">DESA {{ strtoupper($profil_desa->desa) }}</td>
  <td></td>
</tr>
<tr>
  <td></td>
  <td colspan='4' style="text-align:center;">
    <?php   echo "Alamat ".preg_replace('/(?!^)[A-Z]{2,}(?=[A-Z][a-z])|[A-Z][a-z]/', ' $0', ucfirst(camel_case($profil_desa->alamat)))
               . ". Desa ".preg_replace('/(?!^)[A-Z]{2,}(?=[A-Z][a-z])|[A-Z][a-z]/', ' $0', ucfirst(camel_case($profil_desa->desa)))
               . ". Kecamatan ".preg_replace('/(?!^)[A-Z]{2,}(?=[A-Z][a-z])|[A-Z][a-z]/', ' $0', ucfirst(camel_case($profil_desa->kecamatan)))
               . ". Kabupaten ".preg_replace('/(?!^)[A-Z]{2,}(?=[A-Z][a-z])|[A-Z][a-z]/', ' $0', ucfirst(camel_case($profil_desa->kota)))
               . ". Kode Pos ".$profil_desa->kode_pos."."?>
  </td>
  <td></td>
</tr>
<tr>
</tr>
<tr>
  <td></td>
  <td colspan='4' style="text-align:center;">{{ $title }}</td>
  <td></td>
</tr>
<tr>
  <td></td>
  <td colspan='4' style="text-align:center;">Tahun {{ substr($data[0]->tg_trans,0,4) }}</td>
  <td></td>
</tr>
<tr>
  <td></td>
  <td>1. Bidang</td>
  <td>:</td>
  <td>{{ Helper::generateReftext('99999',substr($data[0]->kd_rek,0,2)) }}</td>
  <td></td>
</tr>
<tr>
  <td></td>
  <td>2. Kegiatan</td>
  <td>:</td>
  <td>{{ Helper::generateReftext('99999',substr($data[0]->kd_rek,0,3)) }}</td>
  <td></td>
</tr>
<tr>
  <td></td>
  <td>3. Waktu Pelaksanaan</td>
  <td>:</td>
  <td>{{ date('d-m-Y', strtotime($data[0]->tg_trans)) }}</td>
  <td></td>
</tr>
<tr>
</tr>
<tr>
  <td>
    No
  </td>
  <td>
    Tanggal
  </td>
  <td>
    Kode Rekening
  </td>
  <td>
    Uraian
  </td>
  <td>
    Penerimaan
  </td>
  <td>
    Pengeluaran
  </td>
  <td>
    No Bukti
  </td>
  <td>
    Jumlah Pengeluaran Komulatif
  </td>
  <td>
    Saldo
  </td>
</tr>
<tr>
  <td>1</td>
  <td>2</td>
  <td>3</td>
  <td>4</td>
  <td>5</td>
  <td>6</td>
  <td>7</td>
  <td>8</td>
  <td>9</td>
</tr>
<?php $kumulatif=0 ?>
@foreach ($data as $index => $datum)
  <tr>
    <td>
      {{ $index+1 }}
    </td>
    <td>
      {{ $datum->tg_trans }}
    </td>
    <td>
      {{ $datum->kd_rek }}
    </td>
    <td>
      {{ $datum->uraian }}
    </td>
    @if (substr($datum->kd_rek,0,1)==1)
    <td>
      {{ $datum->harga * $datum->volume }}
    </td>
    <td>
      &nbsp;
    </td>
    @endif
    @if (substr($datum->kd_rek,0,1)==2)
    <td>
      &nbsp;
    </td>
    <td>
      {{ $datum->harga * $datum->volume }}
    </td>
    @endif
    <td>
      {{ $datum->bukti }}
    </td>
    <td>
      <?php if (substr($datum->kd_rek,0,1)==2) {
        $kumulatif += $datum->harga * $datum->volume;
      } ?>
      {{ $kumulatif }}
    </td>
    <td>
      {{ $datum->saldo }}
    </td>
  </tr>
@endforeach
<tr>
  <td></td>
</tr>
<tr>
  <td></td>
  <td colspan='2' style="text-align:center;">Mengetahui</td>
  <td colspan='2' style="text-align:center;">{{ date('d-m-Y', strtotime($data[0]->updated_at)) }}</td>
</tr>
<tr>
  <td></td>
  <td colspan='2' style="text-align:center;">Kepala Desa {{ $profil_desa->kepala_desa }}</td>
  <td colspan='2' style="text-align:center;">Sekretaris Desa {{ $profil_desa->sekretaris_desa }}</td>
</tr>
<tr>
  <td></td>
  <td></td>
</tr>
<tr>
  <td></td>
  <td></td>
</tr>
<tr>
  <td></td>
  <td></td>
</tr>
<tr>
  <td></td>
  <td></td>
</tr>
<tr>
  <td colspan='2' style="text-align:center;">{{ $profil_desa->nik_kepala_desa }}</td>
  <td colspan='2' style="text-align:center;">{{ $profil_desa->nik_sekretaris_desa }}</td>
</tr>
</html>
