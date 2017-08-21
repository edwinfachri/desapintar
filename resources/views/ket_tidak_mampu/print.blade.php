<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Desa Pintar v1.0</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Custom CSS -->
    <link href="{!! asset('css/print.css') !!}" rel="stylesheet">

    <!-- Bootstrap Core CSS -->
    <link href="{!! asset('template/vendor/bootstrap/css/bootstrap.min.css') !!}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <!-- <link href="{!! asset('template/vendor/morrisjs/morris.css') !!}" rel="stylesheet"> -->

</head>
<?php $grand_total = 0; ?>
<body>
    <div id="wrapper">
      <!-- Page Content -->
          <div class="container-fluid">
            @include('layouts.letter_header_print')

            <div style="font-family: serif; left: 7%;">
              <div class="row text">
                <h1 class="col-md-12 col-xs-12 col-lg-12 text-center">{{ $title }}</h1>
                <h4 class="col-md-12 col-xs-12 col-lg-12 text-center">Nomor : {{ $data->nomor }}</h4>
                <br>
                <p>Yang bertanda tangan dibawah ini :</p>
              </div>

              <div class="row">
                {{ Form::model($data, array('route' => array('ket_tidak_mampu.update', $data->id), 'method' => 'PUT', 'style'=>'line-height: 1.15;')) }}
                {{ csrf_field() }}
                <div class="form-horizontal">
                  <div class="form-group">
                    <div class="col-md-1 col-xs-1 col-lg-1">
                      &nbsp;
                    </div>
                    <div class="col-md-3 col-xs-3 col-lg-3 text-left">
                      <p>Nama</p>
                    </div>
                    <div class="col-md-1 col-xs-1 col-lg-1">
                      <p>:</p>
                    </div>
                    <div class="col-md-7 col-xs-7 col-lg-7">
                      <p>{{ $data->nama }}</p>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-1 col-xs-1 col-lg-1">
                      &nbsp;
                    </div>
                    <div class="col-md-3 col-xs-3 col-lg-3 text-left">
                      <p>NIK</p>
                    </div>
                    <div class="col-md-1 col-xs-1 col-lg-1">
                      <p>:</p>
                    </div>
                    <div class="col-md-7 col-xs-7 col-lg-7">
                      <p>{{$data->nilk}}</p>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-1 col-xs-1 col-lg-1">
                      &nbsp;
                    </div>
                    <div class="col-md-3 col-xs-3 col-lg-3 text-left">
                      <p>Tempat Lahir</p>
                    </div>
                    <div class="col-md-1 col-xs-1 col-lg-1">
                      <p>:</p>
                    </div>
                    <div class="col-md-7 col-xs-7 col-lg-7">
                      <p>{{$data->tempat_lahir}}</p>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-1 col-xs-1 col-lg-1">
                      &nbsp;
                    </div>
                    <div class="col-md-3 col-xs-3 col-lg-3 text-left">
                      <p>Tanggal Lahir</p>
                    </div>
                    <div class="col-md-1 col-xs-1 col-lg-1">
                      <p>:</p>
                    </div>
                    <div class="col-md-7 col-xs-7 col-lg-7">
                      <p>{{$data->tanggal_lahir}}</p>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-1 col-xs-1 col-lg-1">
                      &nbsp;
                    </div>
                    <div class="col-md-3 col-xs-3 col-lg-3 text-left">
                      <p>Kelamin</p>
                    </div>
                    <div class="col-md-1 col-xs-1 col-lg-1">
                      <p>:</p>
                    </div>
                    <div class="col-md-7 col-xs-7 col-lg-7">
                      <p>{{$data->kelamin}}</p>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-1 col-xs-1 col-lg-1">
                      &nbsp;
                    </div>
                    <div class="col-md-3 col-xs-3 col-lg-3 text-left">
                      <p>Kewarganegaraan</p>
                    </div>
                    <div class="col-md-1 col-xs-1 col-lg-1">
                      <p>:</p>
                    </div>
                    <div class="col-md-7 col-xs-7 col-lg-7">
                      <p>{{$data->kewarganegaraan}}</p>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-1 col-xs-1 col-lg-1">
                      &nbsp;
                    </div>
                    <div class="col-md-3 col-xs-3 col-lg-3 text-left">
                      <p>Agama</p>
                    </div>
                    <div class="col-md-1 col-xs-1 col-lg-1">
                      <p>:</p>
                    </div>
                    <div class="col-md-7 col-xs-7 col-lg-7">
                      <p>{{$data->agama}}</p>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-1 col-xs-1 col-lg-1">
                      &nbsp;
                    </div>
                    <div class="col-md-3 col-xs-3 col-lg-3 text-left">
                      <p>Pekerjaan</p>
                    </div>
                    <div class="col-md-1 col-xs-1 col-lg-1">
                      <p>:</p>
                    </div>
                    <div class="col-md-7 col-xs-7 col-lg-7">
                      <p>{{$data->pekerjaan}}</p>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-1 col-xs-1 col-lg-1">
                      &nbsp;
                    </div>
                    <div class="col-md-3 col-xs-3 col-lg-3 text-left">
                      <p>Status</p>
                    </div>
                    <div class="col-md-1 col-xs-1 col-lg-1">
                      <p>:</p>
                    </div>
                    <div class="col-md-7 col-xs-7 col-lg-7">
                      <p>{{$data->status}}</p>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-1 col-xs-1 col-lg-1">
                      &nbsp;
                    </div>
                    <div class="col-md-3 col-xs-3 col-lg-3 text-left">
                      <p>Alamat</p>
                    </div>
                    <div class="col-md-1 col-xs-1 col-lg-1">
                      <p>:</p>
                    </div>
                    <div class="col-md-7 col-xs-7 col-lg-7">
                      <p>{{$data->alamat}}</p>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-1 col-xs-1 col-lg-1">
                      &nbsp;
                    </div>
                    <div class="col-md-3 col-xs-3 col-lg-3 text-left">
                      <p>Keperluan</p>
                    </div>
                    <div class="col-md-1 col-xs-1 col-lg-1">
                      <p>:</p>
                    </div>
                    <div class="col-md-7 col-xs-7 col-lg-7">
                      <p>{{$data->keperluan}}</p>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-1 col-xs-1 col-lg-1">
                      &nbsp;
                    </div>
                    <div class="col-md-3 col-xs-3 col-lg-3 text-left">
                      <p>Mulai Masa Berlaku</p>
                    </div>
                    <div class="col-md-1 col-xs-1 col-lg-1">
                      <p>:</p>
                    </div>
                    <div class="col-md-7 col-xs-7 col-lg-7">
                      <p>{{$data->masa_berlaku_start}} s/d {{$data->masa_berlaku_end}}</p>
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
              <!-- /.row -->
          <!-- /.container-fluid -->
      </div>
      <!-- /#page-wrapper -->

      </div>
      <!-- <div class="navbar-footer">
      <a class="navbar-brand" href="index.html">Copyrights &copy; 2017</a>
      </div> -->
      <!-- /#wrapper -->

      <!-- jQuery -->
      <script src="{!! asset('template/vendor/jquery/jquery.min.js') !!}"></script>

      <!-- Bootstrap Core JavaScript -->
      <script src="{!! asset('template/vendor/bootstrap/js/bootstrap.min.js') !!}"></script>

      <!-- Metis Menu Plugin JavaScript -->
      <script src="{!! asset('template/vendor/metisMenu/metisMenu.min.js') !!}"></script>

      <!-- Custom Theme JavaScript -->
      <script src="{!! asset('template/dist/js/sb-admin-2.js') !!}"></script>

      <!-- Datepicker -->
      <!-- <script src="//code.jquery.com/jquery-1.10.2.js"></script> -->
      <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
        <script>
          window.onload = window.print();
        </script>
    </body>
</html>
