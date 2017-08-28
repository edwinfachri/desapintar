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

class KasUmumController extends Controller
{
  protected $profil_desa;
  public function __construct() {
    $this->cek_profil_desa();
    $this->middleware('auth');
    $this->title = 'Laporan Kas Umum';
  }

  public function Index(Request $request) {
    $transaksi = TransaksiTunai::where('kd_rek', 'like', '1%')->orWhere('kd_rek', 'like', '2%')->orderBy('tg_trans')->get();
    $year = [];
    $year_counter = array_fill(0, 20, 0);
    $counter = 0;
    $pointer = "";
    $index_pointer = 0;
    $penerimaan = array_fill(0, 20, 0);
    $pengeluaran = array_fill(0, 20, 0);
    $data = array();
    foreach($transaksi as $k=>$v) {
      $pointer = substr($v['tg_trans'], 0, 4);
      if (substr($v['tg_trans'], 0, 4) == $pointer ) {
        $counter += 1;
        $year[$index_pointer] = substr($v['tg_trans'], 0, 4);
        $year_counter[$index_pointer] = $counter;
        if (substr($v['kd_rek'],0,1) == 1) {
          $penerimaan[$index_pointer] += $v['harga'] * $v['volume'];
        } else {
          $pengeluaran[$index_pointer] += $v['harga'] * $v['volume'];
        }
        continue;
      } else {
        $counter = 0;
        $index_pointer += 1;
      }
    }
    foreach($year as $k=>$v) {
      $data[$k]['year'] = $v;
      $data[$k]['counter'] = $year_counter[$k];
      $data[$k]['penerimaan'] = $penerimaan[$k];
      $data[$k]['pengeluaran'] = $pengeluaran[$k];
    }
    return view('administrasi_keuangan.kas_umum.index', ['title' => $this->title, 'data' => $data]);
  }

  public function getView($id) {
    $data = TransaksiTunai::where('tg_trans', 'like', $id.'%')->get();
    return view('administrasi_keuangan.kas_umum.view', ['title' => $this->title, 'data' => $data,
      'profil_desa' => $this->profil_desa]);
  }

  public function getDownload($id) {
    $data = TransaksiTunai::where('tg_trans', 'like', $id.'%')->get();
    $pdf = PDF::loadView('administrasi_keuangan.kas_umum.download', ['data'=>$data,
      'title'=>$this->title, 'profil_desa'=>$this->profil_desa]);
    return $pdf->download('kas_umum.pdf');
  }

  public function getPrint($id) {
    $data = TransaksiTunai::where('tg_trans', 'like', $id.'%')->get();
    return view('administrasi_keuangan.kas_umum.print', ['title' => $this->title, 'data' => $data,
      'profil_desa'=>$this->profil_desa]);
  }

  public function getExcel($id) {
    return Excel::create('kas_umum', function($excel) use($id){
        $excel->sheet('data', function($sheet) use($id){
          $sheet->setStyle(array(
          'font' => array(
              'name'      =>  'Calibri',
              'size'      =>  12,
              'bold'      =>  true
          )
        ));

          $data = TransaksiTunai::where('tg_trans', 'like', $id.'%')->get();
          $sheet->loadView('administrasi_keuangan.kas_umum.excel', array('title' => $this->title, 'data' => $data,
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
}
