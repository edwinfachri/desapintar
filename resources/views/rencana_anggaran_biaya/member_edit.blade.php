@extends('layouts.app')
@section('content')
<h1><a class="btn btn-default btn-warning pull-right" href="{{ url('rencana_anggaran_biaya/'.$buku_rencana_anggaran_biaya_id.'/members') }}" role="button">Kembali</a></h1>
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
  {{ Form::model($data, array(route('rencana_anggaran_biaya.member_edit', ['buku_rencana_anggaran_biaya_id'=>$buku_rencana_anggaran_biaya_id,
    'rencana_anggaran_biaya_id'=>$rencana_anggaran_biaya_id]), 'method' => 'PUT')) }}
  <div class="form-horizontal">
    <div class="form-group">
      <div class="col-md-3 col-xs-3 col-lg-3">
        {!! Form::label('uraian', 'Uraian', ['class'=>'control-label']) !!}
      </div>
      <div class="col-md-9 col-xs-9 col-lg-9">
        {!! Form::text('uraian', $data->uraian, ['id'=>'uraian', 'class'=>'form-control', 'placeholder'=>'Uraian']) !!}
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-3 col-xs-3 col-lg-3">
        {!! Form::label('volume', 'Volume', ['class'=>'control-label']) !!}
      </div>
      <div class="col-md-9 col-xs-9 col-lg-9">
        {!! Form::number('volume', $data->volume, ['id'=>'volume', 'class'=>'form-control', 'placeholder'=>'Volume']) !!}
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-3 col-xs-3 col-lg-3">
        {!! Form::label('harga_satuan', 'Harga Satuan', ['class'=>'control-label']) !!}
      </div>
      <div class="col-md-9 col-xs-9 col-lg-9">
        {!! Form::number('harga_satuan', $data->harga_satuan, ['id'=>'harga_satuan', 'class'=>'form-control', 'placeholder'=>'Harga Satuan']) !!}
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-3 col-xs-3 col-lg-3">
      </div>
      <div class="col-md-9 col-xs-9 col-lg-9">
        {{ Form::submit('Perbaharui', array('class' => 'btn btn-primary')) }}
      </div>
    </div>
  </div>
{{ Form::close() }}
</div>

@stop
