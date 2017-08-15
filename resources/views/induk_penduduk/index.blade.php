@extends('layouts.app')
@section('content')
<div class="row">
  <h1 class="col-md-10">{{ $title }}</h1>
  <h1><a class="btn btn-default btn-primary col-md-2" href="{{ url('induk_penduduk/create') }}" role="button">Tambah</a><h1>
</div>

<hr>

<div class="table-responsive">
  <table class="table">
    <thead>
      <td>
        No
      </td>
      <td>
        NIK
      </td>
      <td>
        No KK
      </td>
      <td>
        Nama
      </td>
      <td>
        Tanggal Lahir
      </td>
      <td>
        Alamat
      </td>
      <td>
        Aksi
      </td>
    </thead>
    <tbody>
      @foreach ($data as $index => $datum)
        <tr>
          <td>
            {{ $index+1 }}
          </td>
          <td>
            {{ $datum->nik }}
          </td>
          <td>
            {{ $datum->no_kk }}
          </td>
          <td>
            {{ $datum->nama }}
          </td>
          <td>
            {{ $datum->tg_lahir }}
          </td>
          <td>
            {{ $datum->alamat }}
          </td>
          <td>
            <div class="btn-group row">

               <div class="col-md-3">
                 <a class="btn btn-default btn-info" href="{{ url('induk_penduduk/'.$datum->id) }}" role="button">Lihat</a>
               </div>
               <div class="col-md-3">
                 <a class="btn btn-default btn-success" href="{{ url('induk_penduduk/'.$datum->id.'/edit') }}" role="button">Ubah</a>
               </div>
               <div class="col-md-3">
                 {{ Form::open(array('url' => 'induk_penduduk/' . $datum->id)) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Hapus', array('class' => 'btn btn-danger')) }}
                 {{ Form::close() }}
               </div>
               <div class="col-md-3">
                 <a class="btn btn-default btn-warning" href="{{ url('induk_penduduk/'.$datum->id.'/print') }}" role="button">Cetak</a>
               </div>
            </div>

          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>

@stop
