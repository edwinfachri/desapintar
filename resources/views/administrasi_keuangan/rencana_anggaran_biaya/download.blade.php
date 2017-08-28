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
                          <table>
                            <tr>
                              <td>1. Bidang</td>
                              <td>:</td>
                              <td>{{ Helper::generateReftext('99999',substr($data[0]->kd_rek,0,2)) }}</td>
                            </tr>
                            <tr>
                              <td>2. Kegiatan</td>
                              <td>:</td>
                              <td>{{ Helper::generateReftext('99999',substr($data[0]->kd_rek,0,3)) }}</td>
                            </tr>
                            <tr>
                              <td>3. Waktu Pelaksanaan</td>
                              <td>:</td>
                              <td>{{ date('d-m-Y', strtotime($data[0]->tg_trans)) }}</td>
                            </tr>
                          </table>
                        </div>

                        <hr>

                        <div class="table-responsive">
                          <table class="table table-bordered">
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
                                  Rp. {{ number_format( $datum->harga , 0 , '.' , ',' ) }}
                                </td>
                                <td>
                                  Rp. {{ number_format( ($datum->harga*$datum->volume) , 0 , '.' , ',' ) }}
                                </td>
                              </tr>
                              <?php $grand_total += $datum->harga*$datum->volume?>
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
