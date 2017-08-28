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
                              <td>
                                <h5>No</h5>
                              </td>
                              <td>
                                <h5>Tanggal</h5>
                              </td>
                              <td>
                                <h5>Kode Rekening</h5>
                              </td>
                              <td>
                                <h5>Uraian</h5>
                              </td>
                              <td>
                                <h5>Penerimaan</h5>
                              </td>
                              <td>
                                <h5>Pengeluaran</h5>
                              </td>
                              <td>
                                <h5>No Bukti</h5>
                              </td>
                              <td>
                                <h5>Jumlah Pengeluaran Komulatif</h5>
                              </td>
                              <td>
                                <h5>Saldo</h5>
                              </td>
                            </tr>
                            <tr>
                              <td>1</td>
                              <td>2</td>
                              <td>3</td>
                              <td>4</td>
                              <td>5</td>
                              <td>6</td>
                              <td>7</td>
                              <td>8</td>
                              <td>9</td>
                            </tr>
                            <?php $kumulatif=0 ?>
                            @foreach ($data as $index => $datum)
                              <tr>
                                <td>
                                  {{ $index+1 }}
                                </td>
                                <td>
                                  {{ $datum->tg_trans }}
                                </td>
                                <td>
                                  {{ $datum->kd_rek }}
                                </td>
                                <td>
                                  {{ $datum->uraian }}
                                </td>
                                @if (substr($datum->kd_rek,0,1)==1)
                                <td>
                                  {{ $datum->harga * $datum->volume }}
                                </td>
                                <td>
                                  &nbsp;
                                </td>
                                @endif
                                @if (substr($datum->kd_rek,0,1)==2)
                                <td>
                                  &nbsp;
                                </td>
                                <td>
                                  {{ $datum->harga * $datum->volume }}
                                </td>
                                @endif
                                <td>
                                  {{ $datum->bukti }}
                                </td>
                                <td>
                                  <?php if (substr($datum->kd_rek,0,1)==2) {
                                    $kumulatif += $datum->harga * $datum->volume;
                                  } ?>
                                  {{ $kumulatif }}
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
