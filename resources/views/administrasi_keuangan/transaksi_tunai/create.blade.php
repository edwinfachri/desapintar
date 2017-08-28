@extends('layouts.app')
@section('content')
<h1><a class="btn btn-default btn-warning pull-right" href="{{ url('transaksi_tunai') }}" role="button">Kembali</a></h1>

<div class="row">
  <h1 class="col-md-12 col-xs-12 col-lg-12">{{ $title }}</h1>
</div>

<hr />
<?php
  $read = '';
  header("Content-type: image/jpeg");
?>
<div class="row">
  {{ Form::open(array('url'=>'transaksi_tunai', 'method'=>'POST', 'files'=>true)) }}
  {{ csrf_field() }}
  <div class="form-horizontal">
    <div class="form-group">
      <div class="col-md-3 col-xs-3 col-lg-3">
        {!! Form::label('tg_trans', 'Tanggal Transaksi', ['class'=>'control-label']) !!}
      </div>
      <div class="col-md-9 col-xs-9 col-lg-9">
        {!! Form::text('tg_trans', '', ['id'=>'tg_trans', 'class'=>'form-control datepicker', 'placeholder'=>'Tanggal Transaksi']) !!}
        @if ($errors->has('tg_trans'))
            <span class="help-block">
                <small><strong>{{ $errors->first('tg_trans') }}</strong></small>
            </span>
        @endif
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-3 col-xs-3 col-lg-3">
        {!! Form::label('kd_rek', 'Kode Rekening', ['class'=>'control-label']) !!}
      </div>
      <div class="col-md-9 col-xs-9 col-lg-9">
        {!! Form::select('kd_rek', Helper::generateArray("ref","refno","reftext"," refid='99999' order by refno"), '', ['id'=>'kd_rek', 'class'=>'form-control']) !!}
        @if ($errors->has('kd_rek'))
            <span class="help-block">
                <small><strong>{{ $errors->first('kd_rek') }}</strong></small>
            </span>
        @endif
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-3 col-xs-3 col-lg-3">
        {!! Form::label('uraian', 'Uraian', ['class'=>'control-label']) !!}
      </div>
      <div class="col-md-9 col-xs-9 col-lg-9">
        {!! Form::text('uraian', '', ['id'=>'uraian', 'class'=>'form-control', 'placeholder'=>'Uraian']) !!}
        @if ($errors->has('uraian'))
            <span class="help-block">
                <small><strong>{{ $errors->first('uraian') }}</strong></small>
            </span>
        @endif
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-3 col-xs-3 col-lg-3">
        {!! Form::label('harga', 'Nominal', ['class'=>'control-label']) !!}
      </div>
      <div class="col-md-9 col-xs-9 col-lg-9">
        {!! Form::number('harga', '', ['id'=>'harga', 'class'=>'form-control', 'placeholder'=>'Nominal']) !!}
        @if ($errors->has('harga'))
            <span class="help-block">
                <small><strong>{{ $errors->first('harga') }}</strong></small>
            </span>
        @endif
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-3 col-xs-3 col-lg-3">
        {!! Form::label('volume', 'Volume', ['class'=>'control-label']) !!}
      </div>
      <div class="col-md-9 col-xs-9 col-lg-9">
        {!! Form::number('volume', 1, ['id'=>'volume', 'class'=>'form-control', 'placeholder'=>'Volume']) !!}
        @if ($errors->has('volume'))
            <span class="help-block">
                <small><strong>{{ $errors->first('volume') }}</strong></small>
            </span>
        @endif
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-3 col-xs-3 col-lg-3">
        {!! Form::label('jenis_dana', 'Jenis Dana', ['class'=>'control-label']) !!}
      </div>
      <div class="col-md-9 col-xs-9 col-lg-9">
        {!! Form::select('jenis_dana', Helper::generateArray("ref","refno","reftext"," refid='3' order by refno"), '', ['id'=>'jenis_dana', 'class'=>'form-control']) !!}
        @if ($errors->has('jenis_dana'))
            <span class="help-block">
                <small><strong>{{ $errors->first('jenis_dana') }}</strong></small>
            </span>
        @endif
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-3 col-xs-3 col-lg-3">
        {!! Form::label('bukti', 'Upload Bukti', ['class'=>'control-label']) !!}
      </div>
      <div class="col-md-9 col-xs-9 col-lg-9">
        {!! Form::file('bukti', null) !!}
        @if ($errors->has('bukti'))
            <span class="help-block">
                <small><strong>{{ $errors->first('bukti') }}</strong></small>
            </span>
        @endif
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-3 col-xs-3 col-lg-3">
        {!! Form::label('ket', 'Keterangan', ['class'=>'control-label']) !!}
      </div>
      <div class="col-md-9 col-xs-9 col-lg-9">
        {!! Form::text('ket', '', ['id'=>'ket', 'class'=>'form-control', 'placeholder'=>'Keterangan']) !!}
        @if ($errors->has('ket'))
            <span class="help-block">
                <small><strong>{{ $errors->first('ket') }}</strong></small>
            </span>
        @endif
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
