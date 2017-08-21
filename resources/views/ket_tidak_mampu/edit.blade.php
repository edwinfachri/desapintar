@extends('layouts.app')
@section('content')
<h1><a class="btn btn-default btn-warning pull-right" href="{{ url('ket_tidak_mampu') }}" role="button">Kembali</a></h1>

<div class="row">
  <h1 class="col-md-12 col-xs-12 col-lg-12">{{ $title }}</h1>
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
  {{ Form::model($data, array('route' => array('ket_tidak_mampu.update', $data->id), 'method' => 'PUT')) }}
  {{ csrf_field() }}
  <div class="form-horizontal">
    <div class="form-group">
      <div class="col-md-3 col-xs-3 col-lg-3">
        {!! Form::label('nomor', 'Nomor Surat', ['class'=>'control-label']) !!}
      </div>
      <div class="col-md-9 col-xs-9 col-lg-9">
        {!! Form::text('nomor', $data->nomor, ['id'=>'nomor', 'class'=>'form-control', 'placeholder'=>'Nomor Surat']) !!}
        @if ($errors->has('nomor'))
            <span class="help-block">
                <small><strong>{{ $errors->first('nomor') }}</strong></small>
            </span>
        @endif
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-3 col-xs-3 col-lg-3">
        {!! Form::label('nama', 'Nama', ['class'=>'control-label']) !!}
      </div>
      <div class="col-md-9 col-xs-9 col-lg-9">
        {!! Form::text('nama', $data->nama, ['id'=>'nama', 'class'=>'form-control', 'placeholder'=>'Nama']) !!}
        @if ($errors->has('nama'))
            <span class="help-block">
                <small><strong>{{ $errors->first('nama') }}</strong></small>
            </span>
        @endif
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-3 col-xs-3 col-lg-3">
        {!! Form::label('nilk', 'NILK', ['class'=>'control-label']) !!}
      </div>
      <div class="col-md-9 col-xs-9 col-lg-9">
        {!! Form::text('nilk', $data->nilk, ['id'=>'nilk', 'class'=>'form-control', 'placeholder'=>'NILK']) !!}
        @if ($errors->has('nilk'))
            <span class="help-block">
                <small><strong>{{ $errors->first('nilk') }}</strong></small>
            </span>
        @endif
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-3 col-xs-3 col-lg-3">
        {!! Form::label('tempat_lahir', 'Tempat Lahir', ['class'=>'control-label']) !!}
      </div>
      <div class="col-md-9 col-xs-9 col-lg-9">
        {!! Form::text('tempat_lahir', $data->tempat_lahir, ['id'=>'tempat_lahir', 'class'=>'form-control', 'placeholder'=>'Tempat Lahir']) !!}
        @if ($errors->has('tempat_lahir'))
            <span class="help-block">
                <small><strong>{{ $errors->first('tempat_lahir') }}</strong></small>
            </span>
        @endif
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-3 col-xs-3 col-lg-3">
        {!! Form::label('tanggal_lahir', 'Tanggal Lahir', ['class'=>'control-label']) !!}
      </div>
      <div class="col-md-9 col-xs-9 col-lg-9">
        {!! Form::text('tanggal_lahir', $data->tanggal_lahir, ['id'=>'tanggal_lahir', 'class'=>'form-control datepicker', 'placeholder'=>'Tanggal Lahir']) !!}
        @if ($errors->has('tanggal_lahir'))
            <span class="help-block">
                <small><strong>{{ $errors->first('tanggal_lahir') }}</strong></small>
            </span>
        @endif
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-3 col-xs-3 col-lg-3">
        {!! Form::label('kelamin', 'Kelamin', ['class'=>'control-label']) !!}
      </div>
      <div class="col-md-9 col-xs-9 col-lg-9">
<<<<<<< HEAD
        {!! Form::text('kelamin', $data->kelamin, ['id'=>'kelamin', 'class'=>'form-control', 'placeholder'=>'Kelamin']) !!}
=======
        {!! Form::select('kelamin', Helper::generateArray("ref","refno","reftext"," refid='1' order by refno"), $data->kelamin, ['id'=>'kelamin', 'class'=>'form-control']) !!}
>>>>>>> 8d1188fc8079acedeeebf843415cab11cc2bfb50
        @if ($errors->has('kelamin'))
            <span class="help-block">
                <small><strong>{{ $errors->first('kelamin') }}</strong></small>
            </span>
        @endif
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-3 col-xs-3 col-lg-3">
        {!! Form::label('kewarganegaraan', 'Kewarganegaraan', ['class'=>'control-label']) !!}
      </div>
      <div class="col-md-9 col-xs-9 col-lg-9">
        {!! Form::text('kewarganegaraan', $data->kewarganegaraan, ['id'=>'kewarganegaraan', 'class'=>'form-control', 'placeholder'=>'Kewarganegaraan']) !!}
        @if ($errors->has('kewarganegaraan'))
            <span class="help-block">
                <small><strong>{{ $errors->first('kewarganegaraan') }}</strong></small>
            </span>
        @endif
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-3 col-xs-3 col-lg-3">
        {!! Form::label('agama', 'Agama', ['class'=>'control-label']) !!}
      </div>
      <div class="col-md-9 col-xs-9 col-lg-9">
<<<<<<< HEAD
        {!! Form::text('agama', $data->agama, ['id'=>'agama', 'class'=>'form-control', 'placeholder'=>'Agama']) !!}
=======
        {!! Form::select('agama', Helper::generateArray("ref","refno","reftext"," refid='2' order by refno"), $data->agama, ['id'=>'agama', 'class'=>'form-control']) !!}
>>>>>>> 8d1188fc8079acedeeebf843415cab11cc2bfb50
        @if ($errors->has('agama'))
            <span class="help-block">
                <small><strong>{{ $errors->first('agama') }}</strong></small>
            </span>
        @endif
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-3 col-xs-3 col-lg-3">
        {!! Form::label('pekerjaan', 'Pekerjaan', ['class'=>'control-label']) !!}
      </div>
      <div class="col-md-9 col-xs-9 col-lg-9">
        {!! Form::text('pekerjaan', $data->pekerjaan, ['id'=>'pekerjaan', 'class'=>'form-control', 'placeholder'=>'Pekerjaan']) !!}
        @if ($errors->has('pekerjaan'))
            <span class="help-block">
                <small><strong>{{ $errors->first('pekerjaan') }}</strong></small>
            </span>
        @endif
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-3 col-xs-3 col-lg-3">
        {!! Form::label('status', 'Status', ['class'=>'control-label']) !!}
      </div>
      <div class="col-md-9 col-xs-9 col-lg-9">
        {!! Form::text('status', $data->status, ['id'=>'status', 'class'=>'form-control', 'placeholder'=>'Status']) !!}
        @if ($errors->has('status'))
            <span class="help-block">
                <small><strong>{{ $errors->first('status') }}</strong></small>
            </span>
        @endif
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-3 col-xs-3 col-lg-3">
        {!! Form::label('alamat', 'Alamat', ['class'=>'control-label']) !!}
      </div>
      <div class="col-md-9 col-xs-9 col-lg-9">
        {!! Form::text('alamat', $data->alamat, ['id'=>'alamat', 'class'=>'form-control', 'placeholder'=>'Alamat']) !!}
        @if ($errors->has('alamat'))
            <span class="help-block">
                <small><strong>{{ $errors->first('alamat') }}</strong></small>
            </span>
        @endif
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-3 col-xs-3 col-lg-3">
        {!! Form::label('keperluan', 'Keperluan', ['class'=>'control-label']) !!}
      </div>
      <div class="col-md-9 col-xs-9 col-lg-9">
        {!! Form::text('keperluan', $data->keperluan, ['id'=>'keperluan', 'class'=>'form-control', 'placeholder'=>'Keperluan']) !!}
        @if ($errors->has('keperluan'))
            <span class="help-block">
                <small><strong>{{ $errors->first('keperluan') }}</strong></small>
            </span>
        @endif
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-3 col-xs-3 col-lg-3">
        {!! Form::label('masa_berlaku_start', 'Mulai Masa Berlaku', ['class'=>'control-label']) !!}
      </div>
      <div class="col-md-9 col-xs-9 col-lg-9">
        {!! Form::text('masa_berlaku_start', $data->masa_berlaku_start, ['id'=>'masa_berlaku_start', 'class'=>'form-control datepicker', 'placeholder'=>'Mulai Masa Berlaku']) !!}
        @if ($errors->has('masa_berlaku_start'))
            <span class="help-block">
                <small><strong>{{ $errors->first('masa_berlaku_start') }}</strong></small>
            </span>
        @endif
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-3 col-xs-3 col-lg-3">
        {!! Form::label('masa_berlaku_end', 'Berakhir Masa Berlaku', ['class'=>'control-label']) !!}
      </div>
      <div class="col-md-9 col-xs-9 col-lg-9">
        {!! Form::text('masa_berlaku_end', $data->masa_berlaku_end, ['id'=>'masa_berlaku_end', 'class'=>'form-control datepicker', 'placeholder'=>'Berakhir Masa Berlaku']) !!}
        @if ($errors->has('masa_berlaku_end'))
            <span class="help-block">
                <small><strong>{{ $errors->first('masa_berlaku_end') }}</strong></small>
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
