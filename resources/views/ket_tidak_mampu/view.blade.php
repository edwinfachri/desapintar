@extends('layouts.app')
@section('content')
<h1><a class="btn btn-default btn-warning pull-right" href="{{ url('ket_tidak_mampu') }}" role="button">Kembali</a></h1>
@include('layouts.letter_header')
<div style="font-family: serif; left: 7%;">
  <div class="row text">
    <h1 class="col-md-12 col-xs-12 col-lg-12 text-center">{{ $title }}</h1>
    <h4 class="col-md-12 col-xs-12 col-lg-12 text-center">Nomor : {{ $data->nomor }}</h4>
    <br>
    <p>Yang bertanda tangan dibawah ini :</p>
  </div>

  <div class="row">
    {{ Form::model($data, array('route' => array('ket_tidak_mampu.update', $data->id), 'method' => 'PUT')) }}
    {{ csrf_field() }}
    <div class="form-horizontal">
      <div class="form-group">
        <div class="col-md-1 col-xs-1 col-lg-1">
          &nbsp;
        </div>
        <div class="col-md-3 col-xs-3 col-lg-3 text-left">
          {!! Form::label('nama', 'Nama', ['class'=>'control-label']) !!}
        </div>
        <div class="col-md-1 col-xs-1 col-lg-1">
          {!! Form::label('', ':', ['class'=>'control-label']) !!}
        </div>
        <div class="col-md-7 col-xs-7 col-lg-7">
          {!! Form::label('nama', $data->nama, ['id'=>'nama', 'class'=>'control-label', 'placeholder'=>'Nama']) !!}
        </div>
      </div>
      <div class="form-group">
        <div class="col-md-1 col-xs-1 col-lg-1">
          &nbsp;
        </div>
        <div class="col-md-3 col-xs-3 col-lg-3 text-left">
          {!! Form::label('nilk', 'NIK', ['class'=>'control-label']) !!}
        </div>
        <div class="col-md-1 col-xs-1 col-lg-1">
          {!! Form::label('', ':', ['class'=>'control-label']) !!}
        </div>
        <div class="col-md-7 col-xs-7 col-lg-7">
          {!! Form::label('nilk', $data->nilk, ['id'=>'nilk', 'class'=>'control-label', 'placeholder'=>'NIK']) !!}
        </div>
      </div>
      <div class="form-group">
        <div class="col-md-1 col-xs-1 col-lg-1">
          &nbsp;
        </div>
        <div class="col-md-3 col-xs-3 col-lg-3 text-left">
          {!! Form::label('tempat_lahir', 'Tempat Lahir', ['class'=>'control-label']) !!}
        </div>
        <div class="col-md-1 col-xs-1 col-lg-1">
          {!! Form::label('', ':', ['class'=>'control-label']) !!}
        </div>
        <div class="col-md-7 col-xs-7 col-lg-7">
          {!! Form::label('tempat_lahir', $data->tempat_lahir, ['id'=>'tempat_lahir', 'class'=>'control-label', 'placeholder'=>'Tempat Lahir']) !!}
        </div>
      </div>
      <div class="form-group">
        <div class="col-md-1 col-xs-1 col-lg-1">
          &nbsp;
        </div>
        <div class="col-md-3 col-xs-3 col-lg-3 text-left">
          {!! Form::label('tanggal_lahir', 'Tanggal Lahir', ['class'=>'control-label']) !!}
        </div>
        <div class="col-md-1 col-xs-1 col-lg-1">
          {!! Form::label('', ':', ['class'=>'control-label']) !!}
        </div>
        <div class="col-md-7 col-xs-7 col-lg-7">
          {!! Form::label('tanggal_lahir', $data->tanggal_lahir, ['id'=>'tanggal_lahir', 'class'=>'control-label datepicker', 'placeholder'=>'Tanggal Lahir']) !!}
        </div>
      </div>
      <div class="form-group">
        <div class="col-md-1 col-xs-1 col-lg-1">
          &nbsp;
        </div>
        <div class="col-md-3 col-xs-3 col-lg-3 text-left">
          {!! Form::label('kelamin', 'Kelamin', ['class'=>'control-label']) !!}
        </div>
        <div class="col-md-1 col-xs-1 col-lg-1">
          {!! Form::label('', ':', ['class'=>'control-label']) !!}
        </div>
        <div class="col-md-7 col-xs-7 col-lg-7">
          {!! Form::label('kelamin', $data->kelamin, ['id'=>'kelamin', 'class'=>'control-label', 'placeholder'=>'Kelamin']) !!}
        </div>
      </div>
      <div class="form-group">
        <div class="col-md-1 col-xs-1 col-lg-1">
          &nbsp;
        </div>
        <div class="col-md-3 col-xs-3 col-lg-3 text-left">
          {!! Form::label('kewarganegaraan', 'Kewarganegaraan', ['class'=>'control-label']) !!}
        </div>
        <div class="col-md-1 col-xs-1 col-lg-1">
          {!! Form::label('', ':', ['class'=>'control-label']) !!}
        </div>
        <div class="col-md-7 col-xs-7 col-lg-7">
          {!! Form::label('kewarganegaraan', $data->kewarganegaraan, ['id'=>'kewarganegaraan', 'class'=>'control-label', 'placeholder'=>'Kewarganegaraan']) !!}
        </div>
      </div>
      <div class="form-group">
        <div class="col-md-1 col-xs-1 col-lg-1">
          &nbsp;
        </div>
        <div class="col-md-3 col-xs-3 col-lg-3 text-left">
          {!! Form::label('agama', 'Agama', ['class'=>'control-label']) !!}
        </div>
        <div class="col-md-1 col-xs-1 col-lg-1">
          {!! Form::label('', ':', ['class'=>'control-label']) !!}
        </div>
        <div class="col-md-7 col-xs-7 col-lg-7">
          {!! Form::label('agama', $data->agama, ['id'=>'agama', 'class'=>'control-label', 'placeholder'=>'Agama']) !!}
        </div>
      </div>
      <div class="form-group">
        <div class="col-md-1 col-xs-1 col-lg-1">
          &nbsp;
        </div>
        <div class="col-md-3 col-xs-3 col-lg-3 text-left">
          {!! Form::label('pekerjaan', 'Pekerjaan', ['class'=>'control-label']) !!}
        </div>
        <div class="col-md-1 col-xs-1 col-lg-1">
          {!! Form::label('', ':', ['class'=>'control-label']) !!}
        </div>
        <div class="col-md-7 col-xs-7 col-lg-7">
          {!! Form::label('pekerjaan', $data->pekerjaan, ['id'=>'pekerjaan', 'class'=>'control-label', 'placeholder'=>'Pekerjaan']) !!}
        </div>
      </div>
      <div class="form-group">
        <div class="col-md-1 col-xs-1 col-lg-1">
          &nbsp;
        </div>
        <div class="col-md-3 col-xs-3 col-lg-3 text-left">
          {!! Form::label('status', 'Status', ['class'=>'control-label']) !!}
        </div>
        <div class="col-md-1 col-xs-1 col-lg-1">
          {!! Form::label('', ':', ['class'=>'control-label']) !!}
        </div>
        <div class="col-md-7 col-xs-7 col-lg-7">
          {!! Form::label('status', $data->status, ['id'=>'status', 'class'=>'control-label', 'placeholder'=>'Status']) !!}
        </div>
      </div>
      <div class="form-group">
        <div class="col-md-1 col-xs-1 col-lg-1">
          &nbsp;
        </div>
        <div class="col-md-3 col-xs-3 col-lg-3 text-left">
          {!! Form::label('alamat', 'Alamat', ['class'=>'control-label']) !!}
        </div>
        <div class="col-md-1 col-xs-1 col-lg-1">
          {!! Form::label('', ':', ['class'=>'control-label']) !!}
        </div>
        <div class="col-md-7 col-xs-7 col-lg-7">
          {!! Form::label('alamat', $data->alamat, ['id'=>'alamat', 'class'=>'control-label', 'placeholder'=>'Alamat']) !!}
        </div>
      </div>
      <div class="form-group">
        <div class="col-md-1 col-xs-1 col-lg-1">
          &nbsp;
        </div>
        <div class="col-md-3 col-xs-3 col-lg-3 text-left">
          {!! Form::label('keperluan', 'Keperluan', ['class'=>'control-label']) !!}
        </div>
        <div class="col-md-1 col-xs-1 col-lg-1">
          {!! Form::label('', ':', ['class'=>'control-label']) !!}
        </div>
        <div class="col-md-7 col-xs-7 col-lg-7">
          {!! Form::label('keperluan', $data->keperluan, ['id'=>'keperluan', 'class'=>'control-label', 'placeholder'=>'Keperluan']) !!}
        </div>
      </div>
      <div class="form-group">
        <div class="col-md-1 col-xs-1 col-lg-1">
          &nbsp;
        </div>
        <div class="col-md-3 col-xs-3 col-lg-3 text-left">
          {!! Form::label('masa_berlaku_start', 'Masa Berlaku', ['class'=>'control-label']) !!}
        </div>
        <div class="col-md-1 col-xs-1 col-lg-1">
          {!! Form::label('', ':', ['class'=>'control-label']) !!}
        </div>
        <div class="col-md-7 col-xs-7 col-lg-7">
          {!! Form::label('masa_berlaku_start', $data->masa_berlaku_start, ['id'=>'masa_berlaku_start', 'class'=>'control-label datepicker', 'placeholder'=>'Mulai Masa Berlaku']) !!}
          s/d
          {!! Form::label('masa_berlaku_end', $data->masa_berlaku_end, ['id'=>'masa_berlaku_end', 'class'=>'control-label datepicker', 'placeholder'=>'Berakhir Masa Berlaku']) !!}
        </div>
      </div>
      <br>
      <p>
        Adalah benar nama tersebut diatas penduduk <?php   echo "Desa ".preg_replace('/(?!^)[A-Z]{2,}(?=[A-Z][a-z])|[A-Z][a-z]/', ' $0', ucfirst(camel_case($profil_desa->desa)))
                   . " Kecamatan ".preg_replace('/(?!^)[A-Z]{2,}(?=[A-Z][a-z])|[A-Z][a-z]/', ' $0', ucfirst(camel_case($profil_desa->kecamatan)))
                   . " Kabupaten ".preg_replace('/(?!^)[A-Z]{2,}(?=[A-Z][a-z])|[A-Z][a-z]/', ' $0', ucfirst(camel_case($profil_desa->kota)))
                   ;?>
        dengan ini menerangkan bahwa, nama yg tersebut di atas benar - benar tidak mampu.
      </p>
      <p>
        Demikian surat keterangan ini untuk dipergunakan sebagaimana mestinya.
      </p>
      <div class="row">
        <!-- <div class="col-md-1">
        </div> -->
        <div class="col-xs-6 col-md-6 col-sm-6 text-left">
        </div>
        <div class="col-xs-6 col-md-6 col-sm-6 text-center">
          {{ preg_replace('/(?!^)[A-Z]{2,}(?=[A-Z][a-z])|[A-Z][a-z]/', ' $0', ucfirst(camel_case($profil_desa->desa))) }}, {{ date('d-m-Y', strtotime($data->updated_at)) }}
        </div>
        <!-- <div class="col-md-1">
        </div> -->
      </div>
      <div class="row">
        <!-- <div class="col-md-1">
        </div> -->
        <div class="col-xs-6 col-md-6 col-sm-6 text-left">
          &nbsp;
        </div>
        <div class="col-xs-6 col-md-6 col-sm-6 text-center">
          Kepala Desa {{ preg_replace('/(?!^)[A-Z]{2,}(?=[A-Z][a-z])|[A-Z][a-z]/', ' $0', ucfirst(camel_case($profil_desa->desa))) }}
        </div>
        <!-- <div class="col-md-1">
        </div> -->
      </div>
      <br />
      <br />
      <br />
      <div class="row">
        <!-- <div class="col-md-1">
        </div> -->
        <div class="col-xs-6 col-md-6 col-sm-6 text-left">
          &nbsp;
        </div>
        <div class="col-xs-6 col-md-6 col-sm-6 text-center">
          {{ $profil_desa->kepala_desa }}
        </div>
        <!-- <div class="col-md-1">
        </div> -->
      </div>
    </div>
    {{ Form::close() }}
  </div>
</div>
@stop
