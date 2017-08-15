@extends('layouts.app')
@section('content')
<div class="row">
  <h1 class="col-md-10">{{ $title }}</h1>
</div>

<hr />
<?php
  $read = '';
?>
<div class="row">
  {{ Form::model($data, array('route' => array('induk_penduduk.update', $data->id), 'method' => 'PUT')) }}
  <div class="form-horizontal">
    <div class="form-group">
      <div class="col-md-3">
        {!! Form::label('nama', 'Nama', ['class'=>'control-label']) !!}
      </div>
      <div class="col-md-9">
        {!! Form::text('nama', $data->nama, ['class'=>'form-control', 'placeholder'=>'Nama', $read]) !!}
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-3">
        {!! Form::label('kelamin', 'Jenis Kelamin', ['class'=>'control-label']) !!}
      </div>
      <div class="col-md-9">
        {!! Form::text('kelamin', $data->kelamin, ['class'=>'form-control', 'placeholder'=>'Jenis Kelamin', $read]) !!}
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-3">
        {!! Form::label('stat_kawin', 'Status Perkawinan', ['class'=>'control-label']) !!}
      </div>
      <div class="col-md-9">
        {!! Form::text('stat_kawin', $data->stat_kawin, ['class'=>'form-control', 'placeholder'=>'Status Perkawinan', $read]) !!}
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-3">
        {!! Form::label('tempat_lahir', 'Tempat Lahir', ['class'=>'control-label']) !!}
      </div>
      <div class="col-md-9">
        {!! Form::text('tempat_lahir', $data->tempat_lahir, ['class'=>'form-control', 'placeholder'=>'Tempat Lahir', $read]) !!}
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-3">
        {!! Form::label('tg_lahir', 'Tanggal Lahir', ['class'=>'control-label']) !!}
      </div>
      <div class="col-md-9">
        {!! Form::text('tg_lahir', $data->tg_lahir, ['class'=>'form-control datepicker', 'placeholder'=>'Tanggal Lahir', $read]) !!}
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-3">
        {!! Form::label('pendidikan', 'Pendidikan', ['class'=>'control-label']) !!}
      </div>
      <div class="col-md-9">
        {!! Form::text('pendidikan', $data->pendidikan, ['class'=>'form-control', 'placeholder'=>'Pendidikan', $read]) !!}
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-3">
        {!! Form::label('pekerjaan', 'Pekerjaan', ['class'=>'control-label']) !!}
      </div>
      <div class="col-md-9">
        {!! Form::text('pekerjaan', $data->pekerjaan, ['class'=>'form-control', 'placeholder'=>'Pekerjaan', $read]) !!}
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-3">
        {!! Form::label('baca_huruf', 'Dapat Membaca Huruf', ['class'=>'control-label']) !!}
      </div>
      <div class="col-md-9">
        {!! Form::text('baca_huruf', $data->baca_huruf, ['class'=>'form-control', 'placeholder'=>'Dapat Membaca Huruf', $read]) !!}
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-3">
        {!! Form::label('kewarganegaraan', 'Kewarganegaraan', ['class'=>'control-label']) !!}
      </div>
      <div class="col-md-9">
        {!! Form::text('kewarganegaraan', $data->kewarganegaraan, ['class'=>'form-control', 'placeholder'=>'Kewarganegaraan', $read]) !!}
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-3">
        {!! Form::label('alamat', 'Alamat', ['class'=>'control-label']) !!}
      </div>
      <div class="col-md-9">
        {!! Form::text('alamat', $data->alamat, ['class'=>'form-control', 'placeholder'=>'Alamat', $read]) !!}
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-3">
        {!! Form::label('ked_keluarga', 'Kedudukan Dalam Keluarga', ['class'=>'control-label']) !!}
      </div>
      <div class="col-md-9">
        {!! Form::text('ked_keluarga', $data->ked_keluarga, ['class'=>'form-control', 'placeholder'=>'Kedudukan Dalam Keluarga', $read]) !!}
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-3">
        {!! Form::label('nik', 'NIK', ['class'=>'control-label']) !!}
      </div>
      <div class="col-md-9">
        {!! Form::text('nik', $data->nik, ['class'=>'form-control', 'placeholder'=>'NIK', $read]) !!}
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-3">
        {!! Form::label('no_kk', 'No Kartu Keluarga', ['class'=>'control-label']) !!}
      </div>
      <div class="col-md-9">
        {!! Form::text('no_kk', $data->no_kk, ['class'=>'form-control', 'placeholder'=>'No Kartu Keluarga', $read]) !!}
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-3">
        {!! Form::label('ket', 'Keterangan', ['class'=>'control-label']) !!}
      </div>
      <div class="col-md-9">
        {!! Form::textarea('ket', $data->ket, ['class'=>'form-control', 'placeholder'=>'Keterangan', $read]) !!}
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-3">
      </div>
      <div class="col-md-9">
        {{ Form::submit('Perbaharui', array('class' => 'btn btn-primary')) }}
      </div>
    </div>
  </div>
{{ Form::close() }}
</div>

@stop
