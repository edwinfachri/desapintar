@extends('layouts.app')
@section('content')
<h1><a class="btn btn-default btn-warning pull-right" href="{{ url('rencana_anggaran_biaya/'.$buku_rencana_anggaran_biaya_id.'/members') }}" role="button">Kembali</a></h1>
<div class="row">
  <h1 class="col-md-10 col-xs-10 col-lg-10">{{ $title }}</h1>
</div>

<hr />
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
  {{ Form::open(array('url'=>'rencana_anggaran_biaya/'.$buku_rencana_anggaran_biaya_id.'/members/create', 'method'=>'POST')) }}
  {{ csrf_field() }}
  <div class="form-horizontal">
    <div class="row">
      <div class="col-md-3 col-xs-3 col-lg-3">
        <h4>Petunjuk Cara Pengisian</h4>
      </div>
      <div class="col-md-9 col-xs-9 col-lg-9">
        <p>1. Kolom Uraian: Diisi dengan Uraian berupa rincian kebutuhan dalam kegiatan.</p>
        <p>2. Kolom Volume: Diisi dengan Volume dapat berupa jumlah orang atau barang.</p>
        <p>3. Kolom Harga Satuan: Diisi dengan Harga Satuan yang merupakan besaran untuk membayar orang atau barang.</p>
      </div>
    </div>
    <hr />
    <br />
    <div class="form-group">
      <div class="col-md-3 col-xs-3 col-lg-3">
        {!! Form::label('uraian', 'Uraian', ['class'=>'control-label']) !!}
      </div>
      <div class="col-md-9 col-xs-9 col-lg-9">
        {!! Form::text('uraian', '', ['id'=>'uraian', 'class'=>'form-control', 'placeholder'=>'Uraian']) !!}
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-3 col-xs-3 col-lg-3">
        {!! Form::label('volume', 'Volume', ['class'=>'control-label']) !!}
      </div>
      <div class="col-md-9 col-xs-9 col-lg-9">
        {!! Form::number('volume', '', ['id'=>'volume', 'class'=>'form-control', 'placeholder'=>'Volume']) !!}
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-3 col-xs-3 col-lg-3">
        {!! Form::label('harga_satuan', 'Harga Satuan', ['class'=>'control-label']) !!}
      </div>
      <div class="col-md-9 col-xs-9 col-lg-9">
        {!! Form::number('harga_satuan', '', ['id'=>'harga_satuan', 'class'=>'form-control', 'placeholder'=>'Harga Satuan']) !!}
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
