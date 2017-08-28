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
                      <h3 class="col-xs-12 col-md-12 col-sm-12 text-center">Tahun {{ substr($data[0]->tg_trans,0,4) }}</h3>
                    </div>

                    <br /> <br />

                    <div class="">
                      <table class="table table-bordered">
                        <tr>
                          <td colspan="1" rowspan="2">
                            <h5>No</h5>
                          </td>
                          <td colspan="1" rowspan="2">
                            <h5>Tanggal Transaksi</h5>
                          </td>
                          <td colspan="1" rowspan="2">
                            <h5>Uraian Transaksi</h5>
                          </td>
                          <td colspan="1" rowspan="2">
                            <h5>Bukti Transaksi</h5>
                          </td>
                          <td colspan="2">
                            <h5>Pemasukan</h5>
                          </td>
                          <td colspan="3">
                            <h5>Pengeluaran</h5>
                          </td>
                          <td colspan="1" rowspan="2">
                            <h5>Saldo</h5>
                          </td>
                        </tr>
                        <tr>
                          <td colspan="1">
                            <h5>Setoran</h5>
                          </td>
                          <td colspan="1">
                            <h5>Bunga Bank</h5>
                          </td>
                          <td colspan="1">
                            <h5>Penarikan</h5>
                          </td>
                          <td colspan="1">
                            <h5>Pajak</h5>
                          </td>
                          <td colspan="1">
                            <h5>Biaya Administrasi</h5>
                          </td>
                        </tr>          <tr>
                          <td>1</td>
                          <td>2</td>
                          <td>3</td>
                          <td>4</td>
                          <td>5</td>
                          <td>6</td>
                          <td>7</td>
                          <td>8</td>
                          <td>9</td>
                          <td>10</td>
                        </tr>
                        <?php $kumulatif=0 ?>
                        @foreach ($data as $index => $datum)
                        <?php
                          $setoran = "";
                          $bunga = "";
                          $penarikan = "";
                          $pajak = "";
                          $biaya_adm = "" ;
                          switch($datum->jenis_transaksi) {
                            case 1:
                              $setoran = $datum->harga;
                            break;
                            case 2:
                              $penarikan = $datum->harga;
                            break;
                            case 3:
                              $pajak = $datum->harga;
                            break;
                            case 4:
                              $bunga = $datum->harga;
                            break;
                          }
                        ?>
                          <tr>
                            <td>
                              {{ $index+1 }}
                            </td>
                            <td>
                              {{ $datum->tg_trans }}
                            </td>
                            <td>
                              {{ $datum->uraian }}
                            </td>
                            <td>
                              {{ $datum->bukti }}
                            </td>
                            <td>
                              {{ $setoran }}
                            </td>
                            <td>
                              {{ $bunga }}
                            </td>
                            <td>
                              {{ $penarikan }}
                            </td>
                            <td>
                              {{ $pajak }}
                            </td>
                            <td>
                              {{ $datum->biaya_adm }}
                            </td>
                            <td>
                              {{ $datum->saldo }}
                            </td>
                          </tr>
                        @endforeach
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
                          {{ date('d-m-Y', strtotime($data[0]->updated_at)) }}
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
