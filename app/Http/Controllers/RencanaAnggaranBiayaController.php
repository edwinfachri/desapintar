<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;
use App\TransaksiTunai;
use App\ProfilDesa;
use DB;
use PDF;
use Excel;


class RencanaAnggaranBiayaController extends Controller
{
  protected $profil_desa;
  public function __construct() {
    $this->cek_profil_desa();
    $this->middleware('auth');
    $this->title = 'Laporan Rencana Anggaran Biaya';
  }

  public function Index(Request $request) {
    $data = TransaksiTunai::where('kd_rek', 'like', '211%')->orWhere('kd_rek', 'like', '212%')
      ->orWhere('kd_rek', 'like', '213%')->orWhere('kd_rek', 'like', '214%')->orWhere('kd_rek', 'like', '221%')
      ->orWhere('kd_rek', 'like', '222%')->orWhere('kd_rek', 'like', '223%')->orWhere('kd_rek', 'like', '231%')
      ->orWhere('kd_rek', 'like', '232%')->orWhere('kd_rek', 'like', '241%')->orWhere('kd_rek', 'like', '242%')
      ->orWhere('kd_rek', 'like', '251%')->orWhere('kd_rek', 'like', '262%')->distinct()->paginate();
    return view('administrasi_keuangan.rencana_anggaran_biaya.index', ['title' => $this->title, 'data' => $data]);
  }

  public function getView($id) {
    if (count($id) >= 3) {
      $data = TransaksiTunai::where('kd_rek', 'like', substr($id,0,3).'%')->get();
    } else {
      $data = TransaksiTunai::where('kd_rek', 'like', substr($id,0,2).'%')->get();
    }
    return view('administrasi_keuangan.rencana_anggaran_biaya.view', ['title' => $this->title, 'data' => $data,
      'profil_desa' => $this->profil_desa]);
  }

  public function getDownload($id) {
    if (count($id) >= 3) {
      $data = TransaksiTunai::where('kd_rek', 'like', substr($id,0,3).'%')->get();
    } else {
      $data = TransaksiTunai::where('kd_rek', 'like', substr($id,0,2).'%')->get();
    }
    $pdf = PDF::loadView('administrasi_keuangan.rencana_anggaran_biaya.download', ['data'=>$data,
      'title'=>$this->title, 'profil_desa'=>$this->profil_desa]);
    return $pdf->download('rencana_anggaran_biaya.pdf');
  }

  public function getPrint($id) {
    if (count($id) >= 3) {
      $data = TransaksiTunai::where('kd_rek', 'like', substr($id,0,3).'%')->get();
    } else {
      $data = TransaksiTunai::where('kd_rek', 'like', substr($id,0,2).'%')->get();
    }
    return view('administrasi_keuangan.rencana_anggaran_biaya.print', ['title' => $this->title, 'data' => $data,
      'profil_desa'=>$this->profil_desa]);
  }

  public function getExcel($id) {
    return Excel::create('rencana_anggaran_biaya', function($excel) use($id){
        $excel->sheet('data', function($sheet) use($id){
          $sheet->setStyle(array(
          'font' => array(
              'name'      =>  'Calibri',
              'size'      =>  12,
              'bold'      =>  true
          )
        ));

          if (count($id) >= 3) {
            $data = TransaksiTunai::where('kd_rek', 'like', substr($id,0,3).'%')->get();
          } else {
            $data = TransaksiTunai::where('kd_rek', 'like', substr($id,0,2).'%')->get();
          }

          $sheet->loadView('administrasi_keuangan.rencana_anggaran_biaya.excel', array('title' => $this->title, 'data' => $data,
            'profil_desa'=>$this->profil_desa));
        });
    })->export('xls');
  }

  protected function cek_profil_desa() {
    $this->profil_desa = ProfilDesa::first();
    if (empty($this->profil_desa)) {
      Session::flash('failed_message', "Profil Desa Belum Terisi");
      return redirect('profil_desa');
    }
  }

  // public function memberIndexBackup(Request $request) {
  //   // Check whether user input spesific year
  //   if ($request->tahun != null || $request->tahun != '' || $request->tahun < 2000) {
  //     $tahun = $request->tahun;
  //   } else {
  //     $tahun = '';
  //   }
  //
  //   // Check whether user input spesific field
  //   if ($request->bidang != null || $request->bidang != '') {
  //     $bidang = $request->bidang;
  //   } else {
  //     $bidang = '';
  //   }
  //
  //   // Check whether user input spesific activity
  //   if ($request->kegiatan != null || $request->kegiatan != '') {
  //     $kegiatan = $request->kegiatan;
  //   } else {
  //     $kegiatan = '';
  //   }
  //
  //   // Check whether user input spesific time
  //   if ($request->waktu_pelaksanaan != null || $request->waktu_pelaksanaan != '') {
  //     $waktu_pelaksanaan = $request->waktu_pelaksanaan;
  //   } else {
  //     $waktu_pelaksanaan = '';
  //   }
  //
  //   // Querrying the data
  //   // select * from rencana_anggaran_biaya where bidang like $bidang and kegiatan
  //   // like $kegiatan and waktu_pelaksanaan like $waktu_pelaksanaan and tanggal like $tahun
  //   $data = DB::select("select * from rencana_anggaran_biaya where bidang like '".$bidang."%' and kegiatan
  //     like '".$kegiatan."%' and waktu_pelaksanaan like '".$waktu_pelaksanaan."%' and waktu_pelaksanaan like '".$tahun."%' order by id")->paginate();
  //   setlocale(LC_TIME, 'IND');
  //   $tanggal = Carbon::now()->formatLocalized('%d-%m-%Y');
  //   $this->profil_desa = ProfilDesa::first();
  //   return view('rencana_anggaran_biaya.member_index', ['title' => $this->title, 'data' => $data,
  //     'date'=>$tanggal, 'profil_desa'=>$this->profil_desa]);
  // }
}
