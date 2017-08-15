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
                        <div class="row letter-head-pdf">
                          <img class="col-md-6" src="{{ asset('/images/uploads/'.$profil_desa->logo) }}"
                              style="max-width: 100px; max-height: 100px; position: absolute;">
                          <div class="col-md-6">
                            <div class="row">
                              <div class="col-md-4">
                              </div>
                              <h3 class="col-md-8 text-center">
                                PEMERINTAH KABUPATEN {{ strtoupper($profil_desa->kota) }}
                              </h3>
                            </div>
                            <div class="row">
                              <div class="col-md-4">
                              </div>
                              <h4 class="col-md-8 text-center">
                                KECAMATAN {{ strtoupper($profil_desa->kecamatan) }}
                              </h4>
                            </div>
                            <div class="row">
                              <div class="col-md-4">
                              </div>
                              <h4 class="col-md-8 text-center">
                                DESA {{ strtoupper($profil_desa->desa) }}
                              </h4>
                            </div>
                            <div class="row">
                              <div class="col-md-4">
                              </div>
                              <p class="col-md-8 text-center">
                                <?php   echo "Alamat ".preg_replace('/(?!^)[A-Z]{2,}(?=[A-Z][a-z])|[A-Z][a-z]/', ' $0', ucfirst(camel_case($profil_desa->alamat)))
                                           . ". Desa ".preg_replace('/(?!^)[A-Z]{2,}(?=[A-Z][a-z])|[A-Z][a-z]/', ' $0', ucfirst(camel_case($profil_desa->desa)))
                                           . ". Kecamatan ".preg_replace('/(?!^)[A-Z]{2,}(?=[A-Z][a-z])|[A-Z][a-z]/', ' $0', ucfirst(camel_case($profil_desa->kecamatan)))
                                           . ". Kabupaten ".preg_replace('/(?!^)[A-Z]{2,}(?=[A-Z][a-z])|[A-Z][a-z]/', ' $0', ucfirst(camel_case($profil_desa->kota)))
                                           . ". Kode Pos ".$profil_desa->kode_pos."."?>
                              </p>
                            </div>
                          </div>
                        </div>
                        <br />
                        <div class="row">
                          <h3 class="title text-center">{{ $title }}</h1>
                          <h4 class="col-md-12 text-center">Tahun {{ $buku_rencana_anggaran_biaya->tahun }}</h3>
                          <table>
                            <tr>
                              <td>1. Bidang</td>
                              <td>:</td>
                              <td>{{ $buku_rencana_anggaran_biaya->bidang }}</td>
                            </tr>
                            <tr>
                              <td>2. Kegiatan</td>
                              <td>:</td>
                              <td>{{ $buku_rencana_anggaran_biaya->kegiatan }}</td>
                            </tr>
                            <tr>
                              <td>3. Waktu Pelaksanaan</td>
                              <td>:</td>
                              <td>{{ date('d-m-Y', strtotime($buku_rencana_anggaran_biaya->waktu_pelaksanaan)) }}</td>
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

                              @foreach ($rencana_anggaran_biaya as $index => $datum)
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
                                {{ date('d-m-Y', strtotime($buku_rencana_anggaran_biaya->updated_at)) }}
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
