@extends('layouts.app')
@section('content')
<div class="row">
  <h1 class="col-md-10">{{ $title }}</h1>
</div>

<hr />

<div class="row">
  {{ Form::open(array('url'=>'induk_penduduk', 'method'=>'POST')) }}
  {{ csrf_field() }}
  <div class="form-horizontal">
    <div class="form-group">
      <div class="col-md-3">
        {!! Form::label('nama', 'Nama', ['class'=>'control-label']) !!}
      </div>
      <div class="col-md-9">
        {!! Form::text('nama', '', ['class'=>'form-control', 'placeholder'=>'Nama']) !!}
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-3">
        {!! Form::label('kelamin', 'Jenis Kelamin', ['class'=>'control-label']) !!}
      </div>
      <div class="col-md-9">
        {!! Form::text('kelamin', '', ['class'=>'form-control', 'placeholder'=>'Jenis Kelamin']) !!}
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-3">
        {!! Form::label('stat_kawin', 'Status Perkawinan', ['class'=>'control-label']) !!}
      </div>
      <div class="col-md-9">
        {!! Form::text('stat_kawin', '', ['class'=>'form-control', 'placeholder'=>'Status Perkawinan']) !!}
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-3">
        {!! Form::label('tempat_lahir', 'Tempat Lahir', ['class'=>'control-label']) !!}
      </div>
      <div class="col-md-9">
        {!! Form::text('tempat_lahir', '', ['class'=>'form-control', 'placeholder'=>'Tempat Lahir']) !!}
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-3">
        {!! Form::label('tg_lahir', 'Tanggal Lahir', ['class'=>'control-label']) !!}
      </div>
      <div class="col-md-9">
        {!! Form::text('tg_lahir', '', ['class'=>'form-control datepicker', 'placeholder'=>'Tanggal Lahir']) !!}
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-3">
        {!! Form::label('pendidikan', 'Pendidikan', ['class'=>'control-label']) !!}
      </div>
      <div class="col-md-9">
        {!! Form::text('pendidikan', '', ['class'=>'form-control', 'placeholder'=>'Pendidikan']) !!}
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-3">
        {!! Form::label('pekerjaan', 'Pekerjaan', ['class'=>'control-label']) !!}
      </div>
      <div class="col-md-9">
        {!! Form::text('pekerjaan', '', ['class'=>'form-control', 'placeholder'=>'Pekerjaan']) !!}
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-3">
        {!! Form::label('baca_huruf', 'Dapat Membaca Huruf', ['class'=>'control-label']) !!}
      </div>
      <div class="col-md-9">
        {!! Form::text('baca_huruf', '', ['class'=>'form-control', 'placeholder'=>'Dapat Membaca Huruf']) !!}
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-3">
        {!! Form::label('kewarganegaraan', 'Kewarganegaraan', ['class'=>'control-label']) !!}
      </div>
      <div class="col-md-9">
        {!! Form::text('kewarganegaraan', '', ['class'=>'form-control', 'placeholder'=>'Kewarganegaraan']) !!}
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-3">
        {!! Form::label('alamat', 'Alamat', ['class'=>'control-label']) !!}
      </div>
      <div class="col-md-9">
        {!! Form::text('alamat', '', ['class'=>'form-control', 'placeholder'=>'Alamat']) !!}
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-3">
        {!! Form::label('ked_keluarga', 'Kedudukan Dalam Keluarga', ['class'=>'control-label']) !!}
      </div>
      <div class="col-md-9">
        {!! Form::text('ked_keluarga', '', ['class'=>'form-control', 'placeholder'=>'Kedudukan Dalam Keluarga']) !!}
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-3">
        {!! Form::label('nik', 'NIK', ['class'=>'control-label']) !!}
      </div>
      <div class="col-md-9">
        {!! Form::text('nik', '', ['class'=>'form-control', 'placeholder'=>'NIK']) !!}
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-3">
        {!! Form::label('no_kk', 'No Kartu Keluarga', ['class'=>'control-label']) !!}
      </div>
      <div class="col-md-9">
        {!! Form::text('no_kk', '', ['class'=>'form-control', 'placeholder'=>'No Kartu Keluarga']) !!}
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-3">
        {!! Form::label('ket', 'Keterangan', ['class'=>'control-label']) !!}
      </div>
      <div class="col-md-9">
        {!! Form::textarea('ket', '', ['class'=>'form-control', 'placeholder'=>'Keterangan']) !!}
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-3">
      </div>
      <div class="col-md-9">
        {{ Form::submit('Simpan', array('class' => 'btn btn-lg btn-primary')) }}
      </div>
    </div>
  </div>
  {{ Form::close() }}
</div>

@stop
