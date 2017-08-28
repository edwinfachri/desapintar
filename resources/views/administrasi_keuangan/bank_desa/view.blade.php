@extends('layouts.app')
@section('content')
<?php $grand_total=0; ?>
<h1><a class="btn btn-default btn-warning pull-right" href="{{ url('bank_desa') }}" role="button">Kembali</a></h1>

<div class="row">
    <div class="container col-xs-12 col-md-12 col-sm-12" style="">
      @include('layouts.letter_header_print')
      <div class="col-xs-2 col-md-2  col-sm-2">
      </div>

      <hr />

      <br />

      <div class="row">
        <h1 class="col-xs-12 col-md-12 col-sm-12 text-center">{{ $title }}</h1>
        <h3 class="col-xs-12 col-md-12 col-sm-12 text-center">Tahun {{ substr($data[0]->tg_trans,0,4) }}</h3>
      </div>

      <br /> <br />

      <div class="">
        <table class="table table-bordered">
          <tr>
            <td colspan="1" rowspan="2">
              <h5>No</h5>
            </td>
            <td colspan="1" rowspan="2">
              <h5>Tanggal Transaksi</h5>
            </td>
            <td colspan="1" rowspan="2">
              <h5>Uraian Transaksi</h5>
            </td>
            <td colspan="1" rowspan="2">
              <h5>Bukti Transaksi</h5>
            </td>
            <td colspan="2">
              <h5>Pemasukan</h5>
            </td>
            <td colspan="3">
              <h5>Pengeluaran</h5>
            </td>
            <td colspan="1" rowspan="2">
              <h5>Saldo</h5>
            </td>
          </tr>
          <tr>
            <td colspan="1">
              <h5>Setoran</h5>
            </td>
            <td colspan="1">
              <h5>Bunga Bank</h5>
            </td>
            <td colspan="1">
              <h5>Penarikan</h5>
            </td>
            <td colspan="1">
              <h5>Pajak</h5>
            </td>
            <td colspan="1">
              <h5>Biaya Administrasi</h5>
            </td>
          </tr>          <tr>
            <td>1</td>
            <td>2</td>
            <td>3</td>
            <td>4</td>
            <td>5</td>
            <td>6</td>
            <td>7</td>
            <td>8</td>
            <td>9</td>
            <td>10</td>
          </tr>
          <?php $kumulatif=0 ?>
          @foreach ($data as $index => $datum)
          <?php
            $setoran = "";
            $bunga = "";
            $penarikan = "";
            $pajak = "";
            $biaya_adm = "" ;
            switch($datum->jenis_transaksi) {
              case 1:
                $setoran = $datum->harga;
              break;
              case 2:
                $penarikan = $datum->harga;
              break;
              case 3:
                $pajak = $datum->harga;
              break;
              case 4:
                $bunga = $datum->harga;
              break;
            }
          ?>
            <tr>
              <td>
                {{ $index+1 }}
              </td>
              <td>
                {{ $datum->tg_trans }}
              </td>
              <td>
                {{ $datum->uraian }}
              </td>
              <td>
                {{ $datum->bukti }}
              </td>
              <td>
                {{ $setoran }}
              </td>
              <td>
                {{ $bunga }}
              </td>
              <td>
                {{ $penarikan }}
              </td>
              <td>
                {{ $pajak }}
              </td>
              <td>
                {{ $datum->biaya_adm }}
              </td>
              <td>
                {{ $datum->saldo }}
              </td>
            </tr>
          @endforeach
        </table>

        <br /> <br />
        <br /> <br />
        <br /> <br />

        <div class="row">
          <!-- <div class="col-md-1">
          </div> -->
          <div class="col-xs-6 col-md-6 col-sm-6 text-left">
            Mengetahui
          </div>
          <div class="col-xs-6 col-md-6 col-sm-6 text-left">
            {{ date('d-m-Y', strtotime($data[0]->updated_at)) }}
          </div>
          <!-- <div class="col-md-1">
          </div> -->
        </div>
        <div class="row">
          <!-- <div class="col-md-1">
          </div> -->
          <div class="col-xs-6 col-md-6 col-sm-6 text-left">
            Kepala Desa {{ $profil_desa->kepala_desa }}
          </div>
          <div class="col-xs-6 col-md-6 col-sm-6 text-left">
            Sekretaris Desa {{ $profil_desa->sekretaris_desa }}
          </div>
          <!-- <div class="col-md-1">
          </div> -->
        </div>
        <br />
        <br />
        <br />
        <div class="row">
          <!-- <div class="col-md-1">
          </div> -->
          <div class="col-xs-6 col-md-6 col-sm-6 text-left">
            {{ $profil_desa->nik_kepala_desa }}
          </div>
          <div class="col-xs-6 col-md-6 col-sm-6 text-left">
            {{ $profil_desa->nik_sekretaris_desa }}
          </div>
          <!-- <div class="col-md-1">
          </div> -->
        </div>
      </div>
    </div>
    <!-- /.col-lg-12 -->
</div>
@stop
