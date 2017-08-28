@extends('layouts.app')
@section('content')
<br>
<div class="row">
  <h1><a class="btn btn-primary form-control" href="{{ url('transaksi_tunai/create') }}" role="button">Transaksi Baru</a></h1>
</div>
<hr>
<div class="row">
  <h1 class="col-md-12 col-xs-12 col-lg-12 text-center">{{ $title }}</h1>
</div>
<hr>

<div class="table-responsive">
  <table class="table">
    <thead>
      <td class="text-center">
        <h4>No</h4>
      </td>
      <td class="text-center">
        <h4>Tanggal Transaksi</h4>
      </td>
      <td class="text-center">
        <h4>Kode Rekening</h4>
      </td>
      <td class="text-center">
        <h4>Uraian</h4>
      </td>
      <td class="text-center">
        <h4>Total Biaya</h4>
      </td>
      <td class="text-center">
      <h4>  Jenis Dana</h4>
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
            {{ $datum->tg_trans }}
          </td>
          <td class="text-center">
            {{ $datum->kd_rek }}
          </td>
          <td class="text-center">
            {{ $datum->uraian }}
          </td>
          <td class="text-center">
            Rp. {{ $datum->harga * $datum->volume }}
          </td>
          <td class="text-center">
            {{ Helper::generateReftext('3',$datum->jenis_dana)}}
          </td>
          <td>

            <div class="form-inline pull-right">
               <div class="form-group">
                 <a class="btn btn-default btn-info" href="{{ url('transaksi_tunai/'.$datum->id.'/view') }}" role="button">Lihat Surat</a>
               </div>
               <div class="form-group">
                 <a class="btn btn-default btn-success" href="{{ url('transaksi_tunai/'.$datum->id.'/edit') }}" role="button">Sunting Surat</a>
               </div>
               <div class="form-group">
                 {{ Form::open(array('url' => 'transaksi_tunai/' . $datum->id, 'class'=>'delete')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Hapus Surat', array('class' => 'btn btn-danger')) }}
                 {{ Form::close() }}
               </div>
               <!-- <div class="">
                 <a class="btn btn-default btn-warning col-md-2 col-xs-2 col-lg-2" href="{{ url('rencana_anggaran_biaya/'.$datum->id.'/download') }}" role="button">Unduh</a>
               </div>
               <div class="">
                 <a class="btn btn-default btn-primary col-md-4 col-xs-4 col-lg-4" href="{{ url('rencana_anggaran_biaya/'.$datum->id.'/print') }}" target="_blank" role="button">Cetak</a>
               </div> -->
            </div>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
@stop
