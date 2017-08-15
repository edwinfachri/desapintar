@extends('layouts.app')
@section('content')
<?php $grand_total = 0; ?>
<div class="row">
  <h1><a class="btn btn-default btn-warning pull-right" href="{{ url('rencana_anggaran_biaya') }}" role="button">Kembali</a></h1>
</div>
<hr>
<div class="row">
  <h1 class="col-md-12 col-xs-12 col-lg-12 text-center">{{ $title }}</h1>
  <h3 class="col-md-12 col-xs-12 col-lg-12 text-center">Tahun {{ $buku_rencana_anggaran_biaya->tahun }}</h3>
  <div class="row">
    <p class="col-md-4 col-xs-4 col-lg-4"></p>
    <h5 class="col-md-2 col-xs-2 col-lg-2 text-left">1. Bidang</h5>
    <h5 class="col-md-1 col-xs-1 col-lg-1 text-center">:</h5>
    <h5 class="col-md-5 col-xs-5 col-lg-5 text-left">{{ $buku_rencana_anggaran_biaya->bidang }}</h5>
  </div>
  <div class="row">
    <p class="col-md-4 col-xs-4 col-lg-4"></p>
    <h5 class="col-md-2 col-xs-2 col-lg-2 text-left">2. Kegiatan</h5>
    <h5 class="col-md-1 col-xs-1 col-lg-1 text-center">:</h5>
    <h5 class="col-md-5 col-xs-5 col-lg-5 text-left">{{ $buku_rencana_anggaran_biaya->kegiatan }}</h5>
  </div>
  <div class="row">
    <p class="col-md-4 col-xs-4 col-lg-4"></p>
    <h5 class="col-md-2 col-xs-2 col-lg-2 text-left">3. Waktu Pelaksanaan</h5>
    <h5 class="col-md-1 col-xs-1 col-lg-1 text-center">:</h5>
    <h5 class="col-md-5 col-xs-5 col-lg-5 text-left">{{ date('d-m-Y', strtotime($buku_rencana_anggaran_biaya->waktu_pelaksanaan)) }}</h5>
  </div>
</div>

<hr>

<div class="table-responsive">
  <table class="table">
    <thead>
      <td class="text-center">
        No
      </td>
      <td class="text-center">
        Uraian
      </td>
      <td class="text-center">
        Volume
      </td>
      <td class="">
        Harga Satuan
      </td>
      <td class="">
        Jumlah
      </td>
      <td class="text-center">
      </td>
    </thead>
    <!-- <tr>
      <td>1</td>
      <td>2</td>
      <td>3</td>
      <td>4</td>
      <td></td>
    </tr> -->
    <tbody>

      @foreach ($data as $index => $datum)
        <tr>
          <td class="text-center">
            {{ $index+1 }}
          </td>
          <td class="text-center">
            {{ $datum->uraian }}
          </td>
          <td class="text-center">
            {{ $datum->volume }}
          </td>
          <td class="">
            Rp. {{ number_format( $datum->harga_satuan , 0 , '.' , ',' ) }}
          </td>
          <td class="">
            Rp. {{ number_format( $datum->jumlah , 0 , '.' , ',' ) }}
          </td>
          <td>
            <div class="btn-group row">

               <!-- <div class="col-md-3 col-xs-3 col-lg-3">
                 <a class="btn btn-default btn-info" href="{{ url('rencana_anggaran_biaya/'.$datum->id) }}" role="button">Lihat</a>
               </div> -->
               <div class="col-md-6 col-xs-6 col-lg-6">
                 <a class="btn btn-default btn-success" href="{{ url('rencana_anggaran_biaya/'.$datum->buku_rencana_anggaran_biaya_id.'/members/'.$datum->id.'/edit') }}" role="button">Sunting</a>
               </div>
               <div class="col-md-6 col-xs-6 col-lg-6">
                 {{ Form::open(array('url' => 'rencana_anggaran_biaya/'.$datum->buku_rencana_anggaran_biaya_id.'/members/'.$datum->id, 'class' => 'delete', 'id'=>'delete')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Hapus', array('class' => 'btn btn-danger delete')) }}
                 {{ Form::close() }}
               </div>
            </div>

          </td>
        </tr>
        <?php $grand_total += $datum->jumlah?>
      @endforeach
      <tr>
        <td class="text-center">
        </td>
        <td class="text-center">
        </td>
        <td class="text-center">
        </td>
        <td class="">
          Grand Total
        </td>
        <td class="">
          Rp. {{ number_format( $grand_total , 0 , '.' , ',' ) }}
        </td>
        <td>
        </td>
      </tr>
    </tbody>
  </table>
  <div class="row">
    <h1><a class="btn btn-default btn-primary col-md-12 col-xs-12 col-lg-12" href="{{ url('rencana_anggaran_biaya/'.$buku_rencana_anggaran_biaya_id.'/members/create') }}" role="button">Tambah Baris</a><h1>
  </div>
  <br>
  <!-- <div class="row">
    <div class="col-md-1 col-xs-1 col-lg-1">
    </div>
    <div class="col-md-5 col-xs-5 col-lg-5 text-left">
      Mengetahui
    </div>
    <div class="col-md-5 col-xs-5 col-lg-5 text-left">
      {{ date('d-m-Y', strtotime($buku_rencana_anggaran_biaya->updated_at)) }}
    </div>
    <div class="col-md-1 col-xs-1 col-lg-1">
    </div>
  </div>
  <div class="row">
    <div class="col-md-1 col-xs-1 col-lg-1">
    </div>
    <div class="col-md-5 col-xs-5 col-lg-5 text-left">
      Kepala Desa {{ $profil_desa->kepala_desa }}
    </div>
    <div class="col-md-5 col-xs-5 col-lg-5 text-left">
      Sekretaris Desa {{ $profil_desa->sekretaris_desa }}
    </div>
    <div class="col-md-1 col-xs-1 col-lg-1">
    </div>
  </div>
  <br />
  <br />
  <div class="row">
    <div class="col-md-1 col-xs-1 col-lg-1">
    </div>
    <div class="col-md-5 col-xs-5 col-lg-5 text-left">
      {{ $profil_desa->nik_kepala_desa }}
    </div>
    <div class="col-md-5 col-xs-5 col-lg-5 text-left">
      {{ $profil_desa->nik_sekretaris_desa }}
    </div> -->
    <div class="col-md-1 col-xs-1 col-lg-1">
    </div>
  </div>
</div>
@stop
