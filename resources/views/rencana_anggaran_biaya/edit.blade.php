@extends('layouts.app')
@section('content')
<h1><a class="btn btn-default btn-warning pull-right" href="{{ url('rencana_anggaran_biaya') }}" role="button">Kembali</a></h1>
<div class="row">
  <h1 class="col-md-10 col-xs-10 col-lg-10">{{ $title }}</h1>
</div>

<hr />
<?php
  $read = '';
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
  {{ Form::model($data, array('route' => array('rencana_anggaran_biaya.update', $data->id), 'method' => 'PUT')) }}
  <div class="form-horizontal">
    <div class="form-group">
      <div class="col-md-3 col-xs-3 col-lg-3">
        {!! Form::label('tahun', 'Tahun', ['class'=>'control-label']) !!}
      </div>
      <div class="col-md-9 col-xs-9 col-lg-9">
        {!! Form::text('tahun', $data->tahun, ['id'=>'tahun', 'class'=>'form-control', 'placeholder'=>'Tahun']) !!}
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-3 col-xs-3 col-lg-3">
        {!! Form::label('waktu_pelaksanaan', 'Waktu Pelaksanaan', ['class'=>'control-label']) !!}
      </div>
      <div class="col-md-9 col-xs-9 col-lg-9">
        {!! Form::text('waktu_pelaksanaan', $data->waktu_pelaksanaan, ['class'=>'form-control datepicker', 'placeholder'=>'Waktu Pelaksanaan']) !!}
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-3 col-xs-3 col-lg-3">
        {!! Form::label('bidang', 'Bidang', ['class'=>'control-label']) !!}
      </div>
      <div class="col-md-9 col-xs-9 col-lg-9">
        {!! Form::text('bidang', $data->bidang, ['id'=>'bidang', 'class'=>'form-control', 'placeholder'=>'Bidang']) !!}
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-3 col-xs-3 col-lg-3">
        {!! Form::label('kegiatan', 'Kegiatan', ['class'=>'control-label']) !!}
      </div>
      <div class="col-md-9 col-xs-9 col-lg-9">
        {!! Form::text('kegiatan', $data->kegiatan, ['id'=>'kegiatan', 'class'=>'form-control', 'placeholder'=>'Kegiatan']) !!}
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-3 col-xs-3 col-lg-3">
      </div>
      <div class="col-md-9 col-xs-9 col-lg-9">
        {{ Form::submit('Simpan', array('class' => 'btn btn-lg btn-primary')) }}
      </div>
    </div>
  </div>
{{ Form::close() }}
</div>

@stop
