<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;
use App\TransaksiBank;
use App\ProfilDesa;
use DB;
use PDF;
use Excel;

class BankDesaController extends Controller
{
  protected $profil_desa;
  public function __construct() {
    $this->cek_profil_desa();
    $this->middleware('auth');
    $this->title = 'Laporan Bank Desa';
  }

  public function Index(Request $request) {
    $transaksi = TransaksiBank::  orderBy('tg_trans')->get();
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
        if (substr($v['jenis_transaksi'],0,1) == 3 || substr($v['jenis_transaksi'],0,1) == 1) {
          $penerimaan[$index_pointer] += $v['harga'];
        } else {
          $pengeluaran[$index_pointer] += $v['harga'];
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
    return view('administrasi_keuangan.bank_desa.index', ['title' => $this->title, 'data' => $data]);
  }

  public function getView($id) {
    $data = TransaksiBank::where('tg_trans', 'like', $id.'%')->get();
    return view('administrasi_keuangan.bank_desa.view', ['title' => $this->title, 'data' => $data,
      'profil_desa' => $this->profil_desa]);
  }

  public function getDownload($id) {
    $data = TransaksiBank::where('tg_trans', 'like', $id.'%')->get();
    $pdf = PDF::loadView('administrasi_keuangan.bank_desa.download', ['data'=>$data,
      'title'=>$this->title, 'profil_desa'=>$this->profil_desa]);
    return $pdf->download('bank_desa.pdf');
  }

  public function getPrint($id) {
    $data = TransaksiBank::where('tg_trans', 'like', $id.'%')->get();
    return view('administrasi_keuangan.bank_desa.print', ['title' => $this->title, 'data' => $data,
      'profil_desa'=>$this->profil_desa]);
  }

  public function getExcel($id) {
    return Excel::create('bank_desa', function($excel) use($id){
        $excel->sheet('data', function($sheet) use($id){
          $sheet->setStyle(array(
          'font' => array(
              'name'      =>  'Calibri',
              'size'      =>  12,
              'bold'      =>  true
          )
        ));

          $data = TransaksiBank::where('tg_trans', 'like', $id.'%')->get();
          $sheet->loadView('administrasi_keuangan.bank_desa.excel', array('title' => $this->title, 'data' => $data,
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
