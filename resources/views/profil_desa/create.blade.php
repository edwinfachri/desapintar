@extends('layouts.app')
@section('content')
<div class="row">
  <h1 class="col-md-10 col-xs-10">{{ $title }}</h1>
</div>

<hr />
<?php
  $read = '';
  header("Content-type: image/jpeg");
?>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="row">
  {{ Form::open(array('url'=>'profil_desa', 'method'=>'POST','files' => true)) }}
  {{ csrf_field() }}
  <div class="form-horizontal">
    <div class="form-group">
      <div class="col-md-3 col-xs-3">
        {!! Form::label('logo', 'Logo', ['class'=>'control-label']) !!}
      </div>
      <div class="col-md-9 col-xs-9">
        {!! Form::file('logo', null) !!}
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-3 col-xs-3">
        {!! Form::label('nik_kepala_desa', 'NIK Kepala Desa', ['class'=>'control-label']) !!}
      </div>
      <div class="col-md-9 col-xs-9">
        {!! Form::text('nik_kepala_desa', '', ['id'=>'nik_kepala_desa', 'class'=>'form-control', 'placeholder'=>'NIK Kepala Desa', $read]) !!}
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-3 col-xs-3">
        {!! Form::label('kepala_desa', 'Kepala Desa', ['class'=>'control-label']) !!}
      </div>
      <div class="col-md-9 col-xs-9">
        {!! Form::text('kepala_desa', '', ['id'=>'kepala_desa', 'class'=>'form-control', 'placeholder'=>'Kepala Desa', $read]) !!}
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-3 col-xs-3">
        {!! Form::label('nik_sekretaris_desa', 'NIK Sekretaris Desa', ['class'=>'control-label']) !!}
      </div>
      <div class="col-md-9 col-xs-9">
        {!! Form::text('nik_sekretaris_desa', '', ['id'=>'nik_sekretaris_desa', 'class'=>'form-control', 'placeholder'=>'NIK Sekretaris Desa', $read]) !!}
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-3 col-xs-3">
        {!! Form::label('sekretaris_desa', 'Sekretaris Desa', ['class'=>'control-label']) !!}
      </div>
      <div class="col-md-9 col-xs-9">
        {!! Form::text('sekretaris_desa', '', ['id'=>'sekretaris_desa', 'class'=>'form-control', 'placeholder'=>'Sekretaris Desa', $read]) !!}
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-3 col-xs-3">
        {!! Form::label('provinsi', 'Provinsi', ['class'=>'control-label']) !!}
      </div>
      <div class="col-md-9 col-xs-9">
        {!! Form::text('provinsi', '', ['id'=>'provinsi', 'class'=>'form-control', 'placeholder'=>'Provinsi', $read]) !!}
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-3 col-xs-3">
        {!! Form::label('kota', 'Kota', ['class'=>'control-label']) !!}
      </div>
      <div class="col-md-9 col-xs-9">
        {!! Form::text('kota', '', ['id'=>'kota', 'class'=>'form-control', 'placeholder'=>'Kota', $read]) !!}
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-3 col-xs-3">
        {!! Form::label('kecamatan', 'Kecamatan', ['class'=>'control-label']) !!}
      </div>
      <div class="col-md-9 col-xs-9">
        {!! Form::text('kecamatan', '', ['id'=>'kecamatan', 'class'=>'form-control', 'placeholder'=>'Kecamatan', $read]) !!}
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-3 col-xs-3">
        {!! Form::label('desa', 'Desa', ['class'=>'control-label']) !!}
      </div>
      <div class="col-md-9 col-xs-9">
        {!! Form::text('desa', '', ['id'=>'desa', 'class'=>'form-control', 'placeholder'=>'Desa', $read]) !!}
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-3 col-xs-3">
        {!! Form::label('alamat', 'Alamat', ['class'=>'control-label']) !!}
      </div>
      <div class="col-md-9 col-xs-9">
        {!! Form::text('alamat', '', ['id'=>'alamat', 'class'=>'form-control', 'placeholder'=>'Alamat', $read]) !!}
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-3 col-xs-3">
        {!! Form::label('kode_pos', 'Kode Pos', ['class'=>'control-label']) !!}
      </div>
      <div class="col-md-9 col-xs-9">
        {!! Form::text('kode_pos', '', ['id'=>'kode_pos', 'class'=>'form-control', 'placeholder'=>'Kode Pos', $read]) !!}
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-3 col-xs-3">
        {!! Form::label('telp', 'Telepon', ['class'=>'control-label']) !!}
      </div>
      <div class="col-md-9 col-xs-9">
        {!! Form::text('telp', '', ['id'=>'telp', 'class'=>'form-control', 'placeholder'=>'Telepon', $read]) !!}
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-3 col-xs-3">
        {!! Form::label('fax', 'Fax', ['class'=>'control-label']) !!}
      </div>
      <div class="col-md-9 col-xs-9">
        {!! Form::text('fax', '', ['id'=>'fax', 'class'=>'form-control', 'placeholder'=>'Fax', $read]) !!}
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-3 col-xs-3">
        {!! Form::label('email', 'Email', ['class'=>'control-label']) !!}
      </div>
      <div class="col-md-9 col-xs-9">
        {!! Form::text('email', '', ['id'=>'email', 'class'=>'form-control', 'placeholder'=>'Email', $read]) !!}
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-3 col-xs-3">
        {!! Form::label('website', 'Website', ['class'=>'control-label']) !!}
      </div>
      <div class="col-md-9 col-xs-9">
        {!! Form::text('website', '', ['id'=>'website', 'class'=>'form-control', 'placeholder'=>'Website', $read]) !!}
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-3 col-xs-3">
      </div>
      <div class="col-md-9 col-xs-9">
        {{ Form::submit('Perbaharui', array('class' => 'btn btn-primary')) }}
      </div>
    </div>
  </div>
{{ Form::close() }}
</div>

@stop
