@extends('layouts.app')
@section('content')
<?php $grand_total=0; ?>
<h1><a class="btn btn-default btn-warning pull-right" href="{{ url('kas_umum') }}" role="button">Kembali</a></h1>

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
        <table class="table">
          <tr>
            <td>
              <h5>No</h5>
            </td>
            <td>
              <h5>Tanggal</h5>
            </td>
            <td>
              <h5>Kode Rekening</h5>
            </td>
            <td>
              <h5>Uraian</h5>
            </td>
            <td>
              <h5>Penerimaan</h5>
            </td>
            <td>
              <h5>Pengeluaran</h5>
            </td>
            <td>
              <h5>No Bukti</h5>
            </td>
            <td>
              <h5>Jumlah Pengeluaran Komulatif</h5>
            </td>
            <td>
              <h5>Saldo</h5>
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
