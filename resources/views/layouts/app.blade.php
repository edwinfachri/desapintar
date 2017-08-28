<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Desa Pintar v1.0</title>
    <link href = "{{url('images/logo.png')}}" rel="icon" type="image/gif">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap Core CSS -->
    <link href="{!! asset('template/vendor/bootstrap/css/bootstrap.min.css') !!}" media="screen" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{!! asset('template/vendor/metisMenu/metisMenu.min.css') !!}" media="screen" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{!! asset('template/dist/css/sb-admin-2.css') !!}" media="screen" rel="stylesheet">

    <!-- Print CSS -->
    <!-- <link href="{!! asset('css/print.css') !!}" rel="stylesheet" media="print" type="text/css"> -->

    <!-- Morris Charts CSS -->
    <link href="{!! asset('template/vendor/morrisjs/morris.css') !!}" media="screen" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{!! asset('template/vendor/font-awesome/css/font-awesome.min.css') !!}" media="screen" rel="stylesheet" type="text/css">

    <!-- Datepicker -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css" media="screen">
</head>

<body>

    <div id="wrapper" style="background-color:#F5F5F5;">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top no-print" role="navigation" style="margin-bottom: 0">

            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div>
                  <img src="{{url('images/logo.png')}}"  height="50" width="50" style="margin-left: 10px">
                  <a class="navbar-brand pull-right" href="{{ url('/') }}">Desa Pintar</a>
                </div>

            </div>
            <ul class="nav navbar-top-links navbar-right">

                <!-- /.dropdown -->
                <li>
                    <a href="{{ url('/profil_desa') }}" style="color:white;">Profil Desa</a>
                    <!-- /.nav-second-level -->
                </li>
                <!-- /.dropdown -->
                @if (Auth::guest())
                  <li><a href="{{ route('register') }}" style="color:white;">Daftar</a></li>
                  <li><a href="{{ route('login') }}" style="color:white;">Masuk</a></li>
                @else
                  <li>
                      <a href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();"  style="color:white;">
                          Keluar
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          {{ csrf_field() }}
                      </form>
                  </li>
                @endif
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
            <div class="navbar-default sidebar" role="navigation"  style="background-color:#F5F5F5;">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu" style="color:white;">
                        <li>
                            <a href="{{ url('/') }}">Beranda</a>
                        </li>
                        <li role="separator" class="divider">
                          &nbsp;
                        </li>
                        @if (!Auth::guest())
                        <li>
                            <a href="#">Administrasi Umum Desa<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">Peraturan Desa</a>
                                </li>
                                <li>
                                    <a href="#">Keputusan Kepala Desa</a>
                                </li>
                                <li>
                                    <a href="#">Inventaris dan Kekayaan Desa</a>
                                </li>
                                <li>
                                    <a href="#">Aparat Pemerintah Desa</a>
                                </li>
                                <li>
                                    <a href="#">Tanah Kas Desa</a>
                                </li>
                                <li>
                                    <a href="#">Tanah Desa</a>
                                </li>
                                <li>
                                    <a href="#">Agenda</a>
                                </li>
                                <li>
                                    <a href="#">Ekspedisi</a>
                                </li>
                                <li>
                                    <a href="#">Lembaran Desa dan Berita Desa</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#">Administrasi Kependudukan Desa<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{url('/induk_penduduk')}}">Buku Induk Penduduk</a>
                                </li>
                                <li>
                                    <a href="#">Mutasi Penduduk Desa</a>
                                </li>
                                <li>
                                    <a href="#">Rekapitulasi Jumlah Penduduk</a>
                                </li>
                                <li>
                                    <a href="#">Penduduk Sementara</a>
                                </li>
                                <li>
                                    <a href="#">Kartu Penduduk dan Buku Kartu Keluarga</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#">Administrasi Keuangan Desa<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{url('/transaksi_tunai')}}">Transaksi Tunai Desa</a>
                                </li>
                                <li>
                                    <a href="{{url('/transaksi_bank')}}">Transaksi Perbankan Desa</a>
                                </li>
                                <li>
                                    <a href="#">Report<span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="#">Anggaran Pendapatan dan Belanja Desa</a>
                                        </li>
                                        <li>
<<<<<<< HEAD
                                            <a href="{{url('/rencana_anggaran_biaya')}}">Rencana Anggaran Biaya</a>
=======
                                            <a href="{{url('/rencana_anggaran_biaya?tahun=&bidang=&kegiatan=&waktu_pelaksanaan=')}}">Rencana Anggaran Biaya</a>
>>>>>>> 369706428542cd386d4d4b5562afdf3db50512d7
                                        </li>
                                        <li>
                                            <a href="#">Kas Pembantu Kegiatan</a>
                                        </li>
                                        <li>
<<<<<<< HEAD
                                            <a href="{{url('/kas_umum')}}">Kas Umum</a>
=======
                                            <a href="#">Kas Umum</a>
>>>>>>> 369706428542cd386d4d4b5562afdf3db50512d7
                                        </li>
                                        <li>
                                            <a href="#">Kas Pembantu</a>
                                        </li>
                                        <li>
<<<<<<< HEAD
                                            <a href="{{url('/bank_desa')}}">Bank Desa</a>
=======
                                            <a href="#">Bank Desa</a>
>>>>>>> 369706428542cd386d4d4b5562afdf3db50512d7
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#">Administrasi Pembangunan Desa<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">Rencana Kerja Pembangunan</a>
                                </li>
                                <li>
                                    <a href="#">Kegiatan Pembangunan</a>
                                </li>
                                <li>
                                    <a href="#">Inventaris Hasil-hasil Pembangunan</a>
                                </li>
                                <li>
                                    <a href="#">Pemberdayaan Masyarakat</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li role="separator" class="divider">
                          &nbsp;
                        </li>
                        <li>
                          <a href="#">Surat-surat<span class="fa arrow"></span></a>
                          <ul class="nav nav-second-level">
                              <li>
                                  <a href="{{url('/ket_tidak_mampu')}}">Keterangan Tidak Mampu</a>
                              </li>
                              <li>
                                  <a href="#">Keterangan Tidak Mampu (Pelajar)</a>
                              </li>
                              <li>
                                  <a href="#">Pengantar Bank</a>
                              </li>
                              <li>
                                  <a href="#">Keterangan Belum Menikah</a>
                              </li>
                              <li>
                                  <a href="#">Keterangan Nikah</a>
                              </li>
                              <li>
                                  <a href="#">Formulir Biodata</a>
                              </li>
                              <li>
                                  <a href="#">Keterangan Domisili</a>
                              </li>
                              <li>
                                  <a href="#">Keterangan Kepemilikan Tanah</a>
                              </li>
                              <li>
                                  <a href="#">Keterangan Umum</a>
                              </li>
                              <li>
                                  <a href="#">Keterangan Usaha</a>
                              </li>
                              <li>
                                  <a href="#">Formulir KTP</a>
                              </li>
                              <li>
                                  <a href="#">Keterangan</a>
                              </li>
                              <li>
                                  <a href="#">Keterangan KTP Sementara</a>
                              </li>
                              <li>
                                  <a href="#">Keterangan Luas Garapan Sawah/Ladang</a>
                              </li>
                              <li>
                                  <a href="#">Keterangan Kepemilikan Kendaraan Bermotor</a>
                              </li>
                              <li>
                                  <a href="#">Pengunduran Diri</a>
                              </li>
                              <li>
                                  <a href="#">Formulir Permohonan Perubahan KK</a>
                              </li>
                              <li>
                                  <a href="#">Keterangan Berkelakuan Baik (SKCK)</a>
                              </li>
                          </ul>
                          <!-- /.nav-second-level -->
                        </li>
                        <li role="separator" class="divider">
                          &nbsp;
                        </li>
                        <li>
                            <a href="#">Laporan<span class="fa arrow"></span></a>
                            <!-- /.nav-second-level -->
                        </li>


                        @endif
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper" style="background-color:white;">
            <div class="container-fluid">
                <div class="row">
                    <div class="container col-lg-12 col-xs-12 col-md-12">
                      <br />
                      @if(Session::has('success_message'))
                          <div class="alert alert-success">
                              {{ Session::get('success_message') }}
                          </div>
                      @endif
                      @if(Session::has('failed_message'))
                          <div class="alert alert-danger">
                              {{ Session::get('failed_message') }}
                          </div>
                      @endif
                      @yield('content')

                      <hr />

                    <!-- /.col-lg-12 -->
                </div>
                <!-- <footer class="footer" style="
                  position: absolute;
                  right: 0;
                  bottom: 0;
                  left: 0;
                  padding: 1rem;
                  text-align: center;">
                 <small>&copy; Copyright 2017</small>
                </footer> -->
                <!-- /.row -->
            </div>
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
    $( function() {
      $( ".datepicker" ).datepicker();
      $( "#format" ).on( "change", function() {
        $( ".datepicker" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
      });
    });
    $(".delete").on("submit", function(){
          return confirm("Apakah anda yakin untuk menghapus data ini?");
    });
    </script>

</body>


      </html>
