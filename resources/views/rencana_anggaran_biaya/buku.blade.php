@extends('layouts.app')
@section('content')
<div class="row">
  <h1 class="col-md-1 col-xs-1 col-lg-12 text-center">{{ $title }}</h1>
  <h3 class="col-md-1 col-xs-1 col-lg-12 text-center">Tahun ...</h3>
  <div class="row">
    <p class="col-md-4 col-xs-4 col-lg-4"></p>
    <h5 class="col-md-2 col-xs-2 col-lg-2 text-left">1. Bidang</h5>
    <h5 class="col-md-1 col-xs-1 col-lg-1 text-center">:</h5>
    <h5 class="col-md-5 col-xs-5 col-lg-5 text-left">...</h5>
  </div>
  <div class="row">
    <p class="col-md-4 col-xs-4 col-lg-4"></p>
    <h5 class="col-md-2 col-xs-2 col-lg-2 text-left">2. Kegiatan</h5>
    <h5 class="col-md-1 col-xs-1 col-lg-1 text-center">:</h5>
    <h5 class="col-md-5 col-xs-5 col-lg-5 text-left">...</h5>
  </div>
  <div class="row">
    <p class="col-md-4 col-xs-4 col-lg-4"></p>
    <h5 class="col-md-2 col-xs-2 col-lg-2 text-left">3. Waktu Pelaksanaan</h5>
    <h5 class="col-md-1 col-xs-1 col-lg-1 text-center">:</h5>
    <h5 class="col-md-5 col-xs-5 col-lg-5 text-left">...</h5>
  </div>
  <h1><a class="btn btn-default btn-primary col-md-2 col-xs-2 col-lg-2" href="{{ url('rencana_anggaran_biaya/create') }}" role="button">Tambah</a><h1>
</div>

<hr>

<div class="table-responsive">
  <table class="table">
    <thead>
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
      <!-- <td>
        Aksi
      </td> -->
    </thead>
    <tr>
      <td>1</td>
      <td>2</td>
      <td>3</td>
      <td>4</td>
      <td></td>
    </tr>
    <tbody>

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
            Rp. {{ $datum->harga_satuan }}
          </td>
          <td>
            Rp. {{ $datum->jumlah }}
          </td>
          <!-- <td>
            <div class="btn-group row">

               <div class="col-md-3">
                 <a class="btn btn-default btn-info" href="{{ url('rencana_anggaran_biaya/'.$datum->id) }}" role="button">Lihat</a>
               </div>
               <div class="col-md-3">
                 <a class="btn btn-default btn-success" href="{{ url('rencana_anggaran_biaya/'.$datum->id.'/edit') }}" role="button">Ubah</a>
               </div>
               <div class="col-md-3">
                 {{ Form::open(array('url' => 'rencana_anggaran_biaya/' . $datum->id)) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Hapus', array('class' => 'btn btn-danger')) }}
                 {{ Form::close() }}
               </div>
               <div class="col-md-3">
                 <a class="btn btn-default btn-warning" href="{{ url('rencana_anggaran_biaya/'.$datum->id.'/print') }}" role="button">Cetak</a>
               </div>
            </div>

          </td> -->
        </tr>
      @endforeach
    </tbody>
  </table>
  <div class="row">
    <div class="col-md-1 col-xs-1 col-lg-1">
    </div>
    <div class="col-md-5 col-xs-5 col-lg-5 text-left">
      Mengetahui
    </div>
    <div class="col-md-5 col-xs-5 col-lg-5 text-left">
      {{ $date }}
    </div>
    <div class="col-md-1 col-xs-1 col-lg-1">
    </div>
  </div>
  <div class="row">
    <div class="col-md-1 col-xs-1 col-lg-1">
    </div>
    <div class="col-md-5 col-xs-5 col-lg-5 text-left">
      Kepala Desa
    </div>
    <div class="col-md-5 col-xs-5 col-lg-5 text-left">
      sekretaris Desa
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
      {{ $profil_desa->kepala_desa }}
    </div>
    <div class="col-md-5 col-xs-5 col-lg-5 text-left">
      {{ $profil_desa->sekretaris_desa }}
    </div>
    <div class="col-md-1 col-xs-1 col-lg-1">
    </div>
  </div>

</div>

@stop
