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
              <div class="row">
                  <div class="container col-xs-12 col-md-12 col-sm-12" style="">
                    @include('layouts.letter_header_print')
                    <div class="col-xs-2 col-md-2  col-sm-2">
                    </div>

                    <hr />

                    <br />

                    <div class="row">
                      <h1 class="col-xs-12 col-md-12 col-sm-12 text-center">{{ $title }}</h1>
                      <h3 class="col-xs-12 col-md-12 col-sm-12 text-center">Tahun {{ $buku_rencana_anggaran_biaya->tahun }}</h3>
                      <div class="row">
                        <p class="col-xs-3 col-md-3 col-sm-3"></p>
                        <h5 class="col-xs-3 col-md-3 col-sm-3 text-left">1. Bidang</h5>
                        <h5 class="col-xs-1 col-md-1 col-sm-1 text-center">:</h5>
                        <h5 class="col-xs-5 col-md-5 col-sm-5 text-left">{{ $buku_rencana_anggaran_biaya->bidang }}</h5>
                      </div>
                      <div class="row">
                        <p class="col-xs-3 col-md-3 col-sm-3"></p>
                        <h5 class="col-xs-3 col-md-3 col-sm-3 text-left">2. Kegiatan</h5>
                        <h5 class="col-xs-1 col-md-1 col-sm-1 text-center">:</h5>
                        <h5 class="col-xs-5 col-md-5 col-sm-5 text-left">{{ $buku_rencana_anggaran_biaya->kegiatan }}</h5>
                      </div>
                      <div class="row">
                        <p class="col-xs-3 col-md-3 col-sm-3"></p>
                        <h5 class="col-xs-3 col-md-3 col-sm-3 text-left">3. Waktu Pelaksanaan</h5>
                        <h5 class="col-xs-1 col-md-1 col-sm-1 text-center">:</h5>
                        <h5 class="col-xs-5 col-md-5 col-sm-5 text-left">{{ date('d-m-Y', strtotime($buku_rencana_anggaran_biaya->waktu_pelaksanaan)) }}</h5>
                      </div>
                    </div>

                    <br /> <br />

                    <div class="">
                      <table class="table">
                        <tr>
                          <td>
                            No
                          </td>
                          <td>
                            Uraian
                          </td>
                          <td>
                            Volume
                          </td>
                          <td>
                            Harga Satuan
                          </td>
                          <td>
                            Jumlah
                          </td>
                        </tr>
                        <tr>
                          <td>1</td>
                          <td>2</td>
                          <td>3</td>
                          <td>4</td>
                          <td>5</td>
                        </tr>
                        @foreach ($data as $index => $datum)
                          <tr>
                            <td>
                              {{ $index+1 }}
                            </td>
                            <td>
                              {{ $datum->uraian }}
                            </td>
                            <td>
                              {{ $datum->volume }}
                            </td>
                            <td>
                              Rp. {{ number_format( $datum->harga_satuan , 0 , '.' , ',' ) }}
                            </td>
                            <td>
                              Rp. {{ number_format( $datum->jumlah , 0 , '.' , ',' ) }}
                            </td>
                          </tr>
                          <?php $grand_total += $datum->jumlah?>
                        @endforeach
                        <tr>
                          <td>
                          </td>
                          <td>
                          </td>
                          <td>
                          </td>
                          <td>
                            Grand Total
                          </td>
                          <td>
                            Rp. {{ number_format( $grand_total , 0 , '.' , ',' ) }}
                          </td>
                        </tr>
                      </table>

                      <br /> <br />
                      <br /> <br />
                      <br /> <br />

                      <div class="row">
                        <!-- <div class="col-md-1">
                        </div> -->
                        <div class="col-xs-6 col-md-6 col-sm-6 text-left">
                          Mengetahui
                        </div>
                        <div class="col-xs-6 col-md-6 col-sm-6 text-left">
                          {{ date('d-m-Y', strtotime($buku_rencana_anggaran_biaya->updated_at)) }}
                        </div>
                        <!-- <div class="col-md-1">
                        </div> -->
                      </div>
                      <div class="row">
                        <!-- <div class="col-md-1">
                        </div> -->
                        <div class="col-xs-6 col-md-6 col-sm-6 text-left">
                          Kepala Desa {{ $profil_desa->kepala_desa }}
                        </div>
                        <div class="col-xs-6 col-md-6 col-sm-6 text-left">
                          Sekretaris Desa {{ $profil_desa->sekretaris_desa }}
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
                          {{ $profil_desa->nik_kepala_desa }}
                        </div>
                        <div class="col-xs-6 col-md-6 col-sm-6 text-left">
                          {{ $profil_desa->nik_sekretaris_desa }}
                        </div>
                        <!-- <div class="col-md-1">
                        </div> -->
                      </div>
                    </div>
                  </div>
                  <!-- /.col-lg-12 -->
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
