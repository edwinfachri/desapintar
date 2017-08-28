<!DOCTYPE html>
<html lang="en">

  <head>

      <meta charset="utf-8">
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="">

      <title>Desa Pintar v1.0</title>

      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">

      <!-- Bootstrap Core CSS -->
      <link href="{!! asset('template/vendor/bootstrap/css/bootstrap.min.css') !!}" rel="stylesheet">

      <!-- MetisMenu CSS -->
      <link href="{!! asset('template/vendor/metisMenu/metisMenu.min.css') !!}" rel="stylesheet">

      <!-- Custom CSS -->
      <link href="{!! asset('css/download.css') !!}" rel="stylesheet">

  </head>

  <body>
    <?php $grand_total = 0; ?>
      <div id="wrapper" class="download">
          <!-- Page Content -->
          <div id="page-wrapper">
              <div class="container-fluid">
                  <div class="row">
                      <div class="container">
                        @include('layouts.letter_header_download')
                        <br />
                        <div class="row">
                          <h3 class="title text-center">{{ $title }}</h1>
                          <h4 class="col-md-12 text-center">Tahun {{ substr($data[0]->tg_trans,0,4) }}</h3>
                        </div>

                        <hr>

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

                          <br>
                          <br>
                          <br>
                          <br>
                          <br>
                          <table class="signs">
                            <tr>
                              <td>
                                Mengetahui
                              </td>
                              <td>
                                {{ date('d-m-Y', strtotime($data[0]->updated_at)) }}
                              </td>
                            </tr>
                            <tr>
                              <td>
                                Kepala Desa {{ $profil_desa->kepala_desa }}
                              </td>
                              <td>
                                Sekretaris Desa {{ $profil_desa->sekretaris_desa }}
                              </td>
                            </tr>
                            <tr>
                              <td></td>
                              <td></td>
                            </tr>
                            <tr>
                              <td></td>
                              <td></td>
                            </tr>
                            <tr>
                              <td></td>
                              <td></td>
                            </tr>
                            <tr>
                              <td></td>
                              <td></td>
                            </tr>
                            <tr>
                              <td></td>
                              <td></td>
                            </tr>
                            <tr>
                              <td></td>
                              <td></td>
                            </tr>
                            <tr>
                              <td></td>
                              <td></td>
                            </tr>
                            <tr>
                              <td></td>
                              <td></td>
                            </tr>
                            <tr>
                              <td></td>
                              <td></td>
                            </tr>

                            <tr>
                              <td>
                                {{ $profil_desa->nik_kepala_desa }}
                              </td>
                              <td>
                                {{ $profil_desa->nik_sekretaris_desa }}
                              </td>
                            </tr>
                          </table>
                      </div>
                      <!-- /.col-lg-12 -->
                  </div>
                  <!-- /.row -->
              </div>
              <!-- /.container-fluid -->
          </div>
          <!-- /#page-wrapper -->

      </div>
      <!-- /#wrapper -->

  </body>
</html>
