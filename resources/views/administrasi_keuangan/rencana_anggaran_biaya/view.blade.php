@extends('layouts.app')
@section('content')
<?php $grand_total=0; ?>
<h1><a class="btn btn-default btn-warning pull-right" href="{{ url('rencana_anggaran_biaya') }}" role="button">Kembali</a></h1>

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
        <div class="row">
          <p class="col-xs-3 col-md-3 col-sm-3"></p>
          <h5 class="col-xs-3 col-md-3 col-sm-3 text-left">1. Bidang</h5>
          <h5 class="col-xs-1 col-md-1 col-sm-1 text-center">:</h5>
          <h5 class="col-xs-5 col-md-5 col-sm-5 text-left">{{ Helper::generateReftext('99999',substr($data[0]->kd_rek,0,2)) }}</h5>
        </div>
        <div class="row">
          <p class="col-xs-3 col-md-3 col-sm-3"></p>
          <h5 class="col-xs-3 col-md-3 col-sm-3 text-left">2. Kegiatan</h5>
          <h5 class="col-xs-1 col-md-1 col-sm-1 text-center">:</h5>
          <h5 class="col-xs-5 col-md-5 col-sm-5 text-left">{{ Helper::generateReftext('99999',substr($data[0]->kd_rek,0,3)) }}</h5>
        </div>
        <div class="row">
          <p class="col-xs-3 col-md-3 col-sm-3"></p>
          <h5 class="col-xs-3 col-md-3 col-sm-3 text-left">3. Waktu Pelaksanaan</h5>
          <h5 class="col-xs-1 col-md-1 col-sm-1 text-center">:</h5>
          <h5 class="col-xs-5 col-md-5 col-sm-5 text-left">{{ date('d-m-Y', strtotime($data[0]->tg_trans)) }}</h5>
        </div>
      </div>

      <br /> <br />

      <div class="">
        <table class="table table-bordered">
          <tr>
            <td>
              No
            </td>
            <td>
              Uraian
            </td>
            <td>
              Volume
            </td>
            <td>
              Harga Satuan
            </td>
            <td>
              Jumlah
            </td>
          </tr>
          <tr>
            <td>1</td>
            <td>2</td>
            <td>3</td>
            <td>4</td>
            <td>5</td>
          </tr>
          @foreach ($data as $index => $datum)
            <tr>
              <td>
                {{ $index+1 }}
              </td>
              <td>
                {{ $datum->uraian }}
              </td>
              <td>
                {{ $datum->volume }}
              </td>
              <td>
                Rp. {{ number_format( $datum->harga , 0 , '.' , ',' ) }}
              </td>
              <td>
                Rp. {{ number_format( ($datum->harga*$datum->volume) , 0 , '.' , ',' ) }}
              </td>
            </tr>
            <?php $grand_total += $datum->harga*$datum->volume?>
          @endforeach
          <tr>
            <td>
            </td>
            <td>
            </td>
            <td>
            </td>
            <td>
              Grand Total
            </td>
            <td>
              Rp. {{ number_format( $grand_total , 0 , '.' , ',' ) }}
            </td>
          </tr>
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
