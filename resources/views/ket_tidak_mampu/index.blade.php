@extends('layouts.app')
@section('content')
<br>
<div class="row">
  {{ Form::open(array('url'=>'ket_tidak_mampu', 'method'=>'get')) }}
  {{ csrf_field() }}
  <div class="form-inline row">
    <div class="form-group col-md-2 col-xs-2 col-lg-2">
      {!! Form::number('nomor', '', ['id'=>'nomor', 'class'=>'form-control', 'placeholder'=>'Nomor']) !!}
    </div>
    <div class="form-group col-md-2 col-xs-2 col-lg-2">
      {!! Form::number('nama', '', ['id'=>'nama', 'class'=>'form-control', 'placeholder'=>'Nama']) !!}
    </div>
    <div class="form-group col-md-2 col-xs-2 col-lg-2">
      {!! Form::text('tempat_lahir', '', ['id'=>'tempat_lahir', 'class'=>'form-control', 'placeholder'=>'Tempat Lahir']) !!}
    </div>
    <!-- <div class="form-group col-md-2 col-xs-2 col-lg-2">
      {!! Form::text('tanggal_lahir', '', ['id'=>'tanggal_lahir', 'class'=>'form-control datepicker', 'placeholder'=>'Tanggal Lahir']) !!}
    </div> -->
    <div class="form-group col-md-2 col-xs-2 col-lg-2">
      {!! Form::text('keperluan', '', ['id'=>'keperluan', 'class'=>'form-control', 'placeholder'=>'Keperluan']) !!}
    </div>
    <div class="form-group col-md-2 col-xs-2 col-lg-2">
      {{ Form::submit('Saring', array('class' => 'btn btn-default')) }}
    </div>
  </div>
  <h1><a class="btn btn-primary form-control" href="{{ url('ket_tidak_mampu/create') }}" role="button">Buat Surat</a></h1>
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
        Nomor Surat
      </td>
      <td class="text-center">
        Nama
      </td>
      <td class="text-center">
        Tempat Lahir
      </td>
      <td class="text-center">
        Tanggal Lahir
      </td>
      <td class="text-center">
        Keperluan
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
            {{ $datum->nomor }}
          </td>
          <td class="text-center">
            {{ $datum->nama }}
          </td>
          <td class="text-center">
            {{ $datum->tempat_lahir }}
          </td>
          <td class="text-center">
            {{ $datum->tanggal_lahir }}
          </td>
          <td class="text-center">
            {{ $datum->keperluan }}
          </td>
          <td>

            <div class="form-inline pull-right">
               <div class="form-group">
                 <a class="btn btn-default btn-info" href="{{ url('ket_tidak_mampu/'.$datum->id.'/view') }}" role="button">Lihat Surat</a>
               </div>
               <div class="form-group">
                 <a class="btn btn-default btn-success" href="{{ url('ket_tidak_mampu/'.$datum->id.'/edit') }}" role="button">Sunting Surat</a>
               </div>
               <div class="form-group">
                 {{ Form::open(array('url' => 'ket_tidak_mampu/' . $datum->id, 'class'=>'delete')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Hapus Surat', array('class' => 'btn btn-danger')) }}
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
                   <li><a href="{{ url('ket_tidak_mampu/'.$datum->id.'/download') }}">Unduh PDF</a></li>
                   <li><a href="{{ url('ket_tidak_mampu/'.$datum->id.'/word') }}" target="_blank">Unduh Word</a></li>
                   <li><a href="{{ url('ket_tidak_mampu/'.$datum->id.'/print') }}" target="_blank">Cetak</a></li>
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
