@extends('layouts.app')
@section('content')
<br>
<div class="row">
  {{ Form::open(array('url'=>'rencana_anggaran_biaya', 'method'=>'get')) }}
  {{ csrf_field() }}
  <div class="form-inline row">
    <div class="form-group col-md-2 col-xs-2 col-lg-2">
      {!! Form::number('tahun', '', ['id'=>'tahun', 'class'=>'form-control', 'placeholder'=>'Tahun']) !!}
    </div>
    <div class="form-group col-md-2 col-xs-2 col-lg-2">
      {!! Form::text('bidang', '', ['id'=>'bidang', 'class'=>'form-control', 'placeholder'=>'Bidang']) !!}
    </div>
    <div class="form-group col-md-2 col-xs-2 col-lg-2">
      {!! Form::text('kegiatan', '', ['id'=>'kegiatan', 'class'=>'form-control', 'placeholder'=>'Kegiatan']) !!}
    </div>
    <div class="form-group col-md-2 col-xs-2 col-lg-2">
      {!! Form::text('waktu_pelaksanaan', '', ['id'=>'waktu_pelaksanaan', 'class'=>'form-control', 'placeholder'=>'Waktu Pelaksanaan']) !!}
    </div>
    <div class="form-group col-md-2 col-xs-2 col-lg-2">
      {{ Form::submit('Saring', array('class' => 'btn btn-default')) }}
    </div>
  </div>
  <h1><a class="btn btn-primary form-control" href="{{ url('rencana_anggaran_biaya/create') }}" role="button">Tambah Buku</a></h1>
  {{ Form::close() }}
</div>
<hr>
<div class="row">
  <h1 class="col-md-12 col-xs-12 col-lg-12 text-center">{{ $title }}</h1>
</div>
<hr>

<div class="table-responsive">
  <table class="table">
    <thead>
      <td class="text-center">
        No
      </td>
      <td class="text-center">
        Tahun
      </td>
      <td class="text-center">
        Waktu Pelaksanaan
      </td>
      <td class="text-center">
        Bidang
      </td>
      <td class="text-center">
        Kegiatan
      </td>
      <td class="text-center">
      </td>
    </thead>
    <!-- <tr>
      <td>1</td>
      <td>2</td>
      <td>3</td>
      <td>4</td>
      <td>5</td>
    </tr> -->
    <tbody>

      @foreach ($data as $index => $datum)
        <tr>
          <td class="text-center">
            {{ $index+1 }}
          </td>
          <td class="text-center">
            {{ $datum->tahun }}
          </td>
          <td class="text-center">
            {{ $datum->waktu_pelaksanaan }}
          </td>
          <td class="text-center">
            {{ $datum->bidang }}
          </td>
          <td class="text-center">
            {{ $datum->kegiatan }}
          </td>
          <td>

            <div class="form-inline pull-right">
               <div class="form-group">
                 <a class="btn btn-default btn-info" href="{{ url('rencana_anggaran_biaya/'.$datum->id.'/members') }}" role="button">Tulis di Buku</a>
               </div>
               <div class="form-group">
                 <a class="btn btn-default btn-success" href="{{ url('rencana_anggaran_biaya/'.$datum->id.'/edit') }}" role="button">Sunting Buku</a>
               </div>
               <div class="form-group">
                 {{ Form::open(array('url' => 'rencana_anggaran_biaya/' . $datum->id, 'class'=>'delete')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Hapus Buku', array('class' => 'btn btn-danger')) }}
                 {{ Form::close() }}
               </div>
               <!-- <div class="">
                 <a class="btn btn-default btn-warning col-md-2 col-xs-2 col-lg-2" href="{{ url('rencana_anggaran_biaya/'.$datum->id.'/download') }}" role="button">Unduh</a>
               </div>
               <div class="">
                 <a class="btn btn-default btn-primary col-md-4 col-xs-4 col-lg-4" href="{{ url('rencana_anggaran_biaya/'.$datum->id.'/print') }}" target="_blank" role="button">Cetak</a>
               </div> -->
               <div class="dropdown form-group dropdown-unduh">
                 <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" style="">Operasi
                 <span class="caret"></span></button>
                 <ul class="dropdown-menu">
                   <li><a href="{{ url('rencana_anggaran_biaya/'.$datum->id.'/download') }}">Unduh PDF</a></li>
                   <li><a href="{{ url('rencana_anggaran_biaya/'.$datum->id.'/excel') }}" target="_blank">Unduh Excel</a></li>
                   <li><a href="{{ url('rencana_anggaran_biaya/'.$datum->id.'/print') }}" target="_blank">Cetak</a></li>
                 </ul>
               </div>
            </div>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
@stop
