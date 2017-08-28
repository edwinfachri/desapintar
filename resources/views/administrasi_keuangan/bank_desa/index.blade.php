@extends('layouts.app')
@section('content')
<br>
<div class="row">
  <h1 class="col-md-12 col-xs-12 col-lg-12 text-center">{{ $title }}</h1>
</div>
<hr>

<div class="table-responsive">
  <table class="table">
    <thead>
      <td class="text-center">
        No
      </td>
      <td class="text-center">
        Tahun
      </td>
      <td class="text-center">
        Jumlah Data
      </td>
      <td class="text-center">
        Total Penerimaan
      </td>
      <td class="text-center">
        Total Pengeluaran
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
            {{ $datum['year'] }}
          </td>
          <td class="text-center">
            {{ $datum['counter'] }}
          </td>
          <td class="text-center">
            {{ $datum['penerimaan'] }}
          </td>
          <td class="text-center">
            {{ $datum['pengeluaran'] }}
          </td>
          <td>
            <div class="form-inline pull-right">
              <div class="form-group">
                <a class="btn btn-default btn-default" href="{{ url('bank_desa/'.$datum['year'].'/view') }}" role="button">Lihat</a>
              </div>
               <div class="form-group">
                 <a class="btn btn-default btn-info" href="{{ url('bank_desa/'.$datum['year'].'/download') }}" role="button">Unduh PDF</a>
               </div>
               <div class="form-group">
                 <a class="btn btn-default btn-success" href="{{ url('bank_desa/'.$datum['year'].'/excel') }}" role="button">Unduh Excel</a>
               </div>
               <div class="form-group">
                 <a class="btn btn-default btn-warning" href="{{ url('bank_desa/'.$datum['year'].'/print') }}" role="button" target="_blank">Cetak</a>
               </div>
            </div>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
@stop
