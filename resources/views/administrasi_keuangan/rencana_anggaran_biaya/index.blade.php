@extends('layouts.app')
@section('content')
<br>
<div class="row">
  {{ Form::open(array('url'=>'rencana_anggaran_biaya', 'method'=>'get')) }}
  {{ csrf_field() }}
  <div class="form-inline row">
    <div class="form-group col-md-2 col-xs-2 col-lg-2">
      {!! Form::number('tahun', '', ['id'=>'tahun', 'class'=>'form-control', 'placeholder'=>'Tahun']) !!}
    </div>
    <div class="form-group col-md-2 col-xs-2 col-lg-2">
      {!! Form::text('bidang', '', ['id'=>'bidang', 'class'=>'form-control', 'placeholder'=>'Bidang']) !!}
    </div>
    <div class="form-group col-md-2 col-xs-2 col-lg-2">
      {!! Form::text('kegiatan', '', ['id'=>'kegiatan', 'class'=>'form-control', 'placeholder'=>'Kegiatan']) !!}
    </div>
    <div class="form-group col-md-2 col-xs-2 col-lg-2">
      {!! Form::text('waktu_pelaksanaan', '', ['id'=>'waktu_pelaksanaan', 'class'=>'form-control', 'placeholder'=>'Waktu Pelaksanaan']) !!}
    </div>
    <div class="form-group col-md-2 col-xs-2 col-lg-2">
      {{ Form::submit('Saring', array('class' => 'btn btn-default')) }}
    </div>
  </div>
  <h1><a class="btn btn-primary form-control" href="{{ url('rencana_anggaran_biaya/create') }}" role="button">Tambah Buku</a></h1>
  {{ Form::close() }}
</div>
<hr>
<div class="row">
  <h1 class="col-md-12 col-xs-12 col-lg-12 text-center">{{ $title }}</h1>
</div>
<hr>

<div class="table-responsive">
  <table class="table table-bordered">
    <thead>
      <td class="text-center">
        No
      </td>
      <td class="text-center">
        Tahun
      </td>
      <td class="text-center">
        Waktu Pelaksanaan
      </td>
      <td class="text-center">
        Bidang
      </td>
      <td class="text-center">
        Kegiatan
      </td>
      <td class="text-center">
      </td>
    </thead>
    <!-- <tr>
      <td>1</td>
      <td>2</td>
      <td>3</td>
      <td>4</td>
      <td>5</td>
    </tr> -->
    <tbody>

      @foreach ($data as $index => $datum)
        <tr>
          <td class="text-center">
            {{ $index+1 }}
          </td>
          <td class="text-center">
            {{ substr($datum->tg_trans,0,4) }}
          </td>
          <td class="text-center">
            {{ $datum->tg_trans }}
          </td>
          <td class="text-center">
            {{ Helper::generateReftext('99999',substr($datum->kd_rek,0,2)) }}
          </td>
          <td class="text-center">
            {{ Helper::generateReftext('99999',substr($datum->kd_rek,0,3)) }}
          </td>
          <td>

            <div class="form-inline pull-right">
              <div class="form-group">
                <a class="btn btn-default btn-default" href="{{ url('rencana_anggaran_biaya/'.$datum->kd_rek.'/view') }}" role="button">Lihat</a>
              </div>
               <div class="form-group">
                 <a class="btn btn-default btn-info" href="{{ url('rencana_anggaran_biaya/'.$datum->kd_rek.'/download') }}" role="button">Unduh PDF</a>
               </div>
               <div class="form-group">
                 <a class="btn btn-default btn-success" href="{{ url('rencana_anggaran_biaya/'.$datum->kd_rek.'/excel') }}" role="button">Unduh Excel</a>
               </div>
               <div class="form-group">
                 <a class="btn btn-default btn-warning" href="{{ url('rencana_anggaran_biaya/'.$datum->kd_rek.'/print') }}" role="button" target="_blank">Cetak</a>
               </div>
            </div>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
@stop
