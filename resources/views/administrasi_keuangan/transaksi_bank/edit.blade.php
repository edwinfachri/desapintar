@extends('layouts.app')
@section('content')
<h1><a class="btn btn-default btn-warning pull-right" href="{{ url('transaksi_bank') }}" role="button">Kembali</a></h1>

<div class="row">
  <h1 class="col-md-12 col-xs-12 col-lg-12">{{ $title }}</h1>
</div>

<hr />
<?php
<<<<<<< HEAD
=======
  $read = '';
  header("Content-type: image/jpeg");
>>>>>>> 369706428542cd386d4d4b5562afdf3db50512d7
?>
<div class="row">
  {{ Form::model($data, array('route' => array('transaksi_bank.update', $data->id), 'method' => 'PUT', 'files'=>true)) }}
  {{ csrf_field() }}
  <div class="form-horizontal">
    <div class="form-group">
      <div class="col-md-3 col-xs-3 col-lg-3">
        {!! Form::label('tg_trans', 'Tanggal Transaksi', ['class'=>'control-label']) !!}
      </div>
      <div class="col-md-9 col-xs-9 col-lg-9">
        {!! Form::text('tg_trans', $data->tg_trans, ['id'=>'tg_trans', 'class'=>'form-control datepicker', 'placeholder'=>'Tanggal Transaksi']) !!}
        @if ($errors->has('tg_trans'))
            <span class="help-block">
                <small><strong>{{ $errors->first('tg_trans') }}</strong></small>
            </span>
        @endif
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-3 col-xs-3 col-lg-3">
        {!! Form::label('uraian', 'Uraian', ['class'=>'control-label']) !!}
      </div>
      <div class="col-md-9 col-xs-9 col-lg-9">
        {!! Form::text('uraian', $data->uraian, ['id'=>'uraian', 'class'=>'form-control', 'placeholder'=>'Uraian']) !!}
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
        {!! Form::number('harga', $data->harga, ['id'=>'harga', 'class'=>'form-control', 'placeholder'=>'Nominal']) !!}
        @if ($errors->has('harga'))
            <span class="help-block">
                <small><strong>{{ $errors->first('harga') }}</strong></small>
            </span>
        @endif
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-3 col-xs-3 col-lg-3">
<<<<<<< HEAD
=======
        {!! Form::label('volume', 'Volume', ['class'=>'control-label']) !!}
      </div>
      <div class="col-md-9 col-xs-9 col-lg-9">
        {!! Form::number('volume', $data->volume, ['id'=>'volume', 'class'=>'form-control', 'placeholder'=>'Volume']) !!}
        @if ($errors->has('volume'))
            <span class="help-block">
                <small><strong>{{ $errors->first('volume') }}</strong></small>
            </span>
        @endif
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-3 col-xs-3 col-lg-3">
>>>>>>> 369706428542cd386d4d4b5562afdf3db50512d7
        {!! Form::label('jenis_transaksi', 'Jenis Dana', ['class'=>'control-label']) !!}
      </div>
      <div class="col-md-9 col-xs-9 col-lg-9">
        {!! Form::select('jenis_transaksi', Helper::generateArray("ref","refno","reftext"," refid='4' order by refno"), $data->jenis_transaksi, ['id'=>'jenis_transaksi', 'class'=>'form-control']) !!}
        @if ($errors->has('jenis_transaksi'))
            <span class="help-block">
                <small><strong>{{ $errors->first('jenis_transaksi') }}</strong></small>
            </span>
        @endif
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-3 col-xs-3 col-lg-3">
        {!! Form::label('bukti', 'Upload Bukti', ['class'=>'control-label']) !!}
      </div>
      <div class="col-md-9 col-xs-9 col-lg-9">
<<<<<<< HEAD
        {!! Form::file('bukti', '') !!}
=======
        {!! Form::file('bukti', $data->bukti) !!}
>>>>>>> 369706428542cd386d4d4b5562afdf3db50512d7
        @if ($errors->has('bukti'))
            <span class="help-block">
                <small><strong>{{ $errors->first('bukti') }}</strong></small>
            </span>
        @endif
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-3 col-xs-3 col-lg-3">
        {!! Form::label('biaya_adm', 'Biaya Administrasi', ['class'=>'control-label']) !!}
      </div>
      <div class="col-md-9 col-xs-9 col-lg-9">
        {!! Form::number('biaya_adm', $data->biaya_adm, ['id'=>'biaya_adm', 'class'=>'form-control', 'placeholder'=>'Biaya Administrasi']) !!}
        @if ($errors->has('biaya_adm'))
            <span class="help-block">
                <small><strong>{{ $errors->first('biaya_adm') }}</strong></small>
            </span>
        @endif
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-3 col-xs-3 col-lg-3">
        {!! Form::label('ket', 'Keterangan', ['class'=>'control-label']) !!}
      </div>
      <div class="col-md-9 col-xs-9 col-lg-9">
        {!! Form::text('ket', $data->ket, ['id'=>'ket', 'class'=>'form-control', 'placeholder'=>'Keterangan']) !!}
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
        {{ $type=='edit'?Form::submit('Simpan', array('class' => 'btn btn-lg btn-primary')):'' }}
      </div>
    </div>
  </div>
  {{ Form::close() }}
</div>

@stop
