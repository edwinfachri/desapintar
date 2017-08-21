<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;
use App\BukuRencanaAnggaranBiaya;
use App\ProfilDesa;
use DB;
use PDF;
use Excel;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;


class RencanaAnggaranBiayaController extends Controller
{
  public function __construct() {
    $this->middleware('auth');
    $this->title = 'Laporan Rencana Anggaran Biaya';
  }

  public function Index(Request $request) {
    $this->validate($request, [
        'waktu_pelaksanaan' => 'date|nullable',
    ], [
        'date' => 'Kolom :attribute diisi dengan format hh/bb/tttt.',
    ]);
    $buku_rencana_anggaran_biaya = BukuRencanaAnggaranBiaya::where('tahun', 'like', $request->tahun.'%')->
    where('bidang', 'like', $request->bidang.'%')->where('kegiatan', 'like', $request->kegiatan.'%')->
    where('waktu_pelaksanaan', 'like', $request->waktu_pelaksanaan.'%')->orderBy('id')->paginate();
    return view('rencana_anggaran_biaya.index', ['title' => $this->title, 'data' => $buku_rencana_anggaran_biaya]);
  }

  public function memberIndex(Request $request, $buku_rencana_anggaran_biaya_id) {
    $profil_desa = ProfilDesa::first();
    if (empty($profil_desa)) {
      Session::flash('failed_message', "Profil Desa Belum Terisi");
      return redirect('profil_desa');
    }
    $buku_rencana_anggaran_biaya = BukuRencanaAnggaranBiaya::find($buku_rencana_anggaran_biaya_id);
    $rencana_anggaran_biaya = $buku_rencana_anggaran_biaya->rencana_anggaran_biaya()->paginate();
    return view('rencana_anggaran_biaya.member_index', ['title' => $this->title, 'data' => $rencana_anggaran_biaya,
      'buku_rencana_anggaran_biaya_id'=>$buku_rencana_anggaran_biaya_id, 'profil_desa'=>$profil_desa,
      'buku_rencana_anggaran_biaya'=>$buku_rencana_anggaran_biaya]);
  }

  public function Create() {
    return view('rencana_anggaran_biaya.create', ['title' => $this->title]);
  }

  public function memberCreate($buku_rencana_anggaran_biaya_id) {
    return view('rencana_anggaran_biaya.member_create', ['title' => $this->title, 'buku_rencana_anggaran_biaya_id'=>$buku_rencana_anggaran_biaya_id]);
  }

  public function Store(Request $request) {
    $this->validate($request, [
        'tahun' => 'required|digits:4',
        'waktu_pelaksanaan' => 'required|date',
        'bidang' => 'required',
        'kegiatan' => 'required',
    ], [
        'required' => 'Kolom :attribute wajib diisi.',
        'date' => 'Kolom :attribute diisi dengan format hh/bb/tttt.',
        'digits' => 'Kolom :attribute diisi dengan 4 karakter numerik.',
    ]);
    $buku_rencana_anggaran_biaya = new BukuRencanaAnggaranBiaya;
    $buku_rencana_anggaran_biaya->tahun = $request->get('tahun');
    $buku_rencana_anggaran_biaya->waktu_pelaksanaan = Carbon::parse($request->get('waktu_pelaksanaan'))->format('Y/m/d');
    $buku_rencana_anggaran_biaya->kegiatan = $request->get('kegiatan');
    $buku_rencana_anggaran_biaya->bidang = $request->get('bidang');
    $saved = $buku_rencana_anggaran_biaya->save();
    // if (!$saved) {
    //   Session::flash('success_message', "Profil Desa Belum Terisi");
    //   return Redirect::back();
    // }
    Session::flash('success_message', "Buku Rencana Anggaran Biaya Berhasil Ditambahkan");
    return redirect('rencana_anggaran_biaya');
  }

  public function memberStore(Request $request, $buku_rencana_anggaran_biaya_id) {
    $this->validator($request->all())->validate();
    $buku_rencana_anggaran_biaya = BukuRencanaAnggaranBiaya::find($buku_rencana_anggaran_biaya_id);
    $rencana_anggaran_biaya = $buku_rencana_anggaran_biaya->rencana_anggaran_biaya()->create([
      'uraian' => $request->get('uraian'), 'volume' => $request->get('volume'),
      'harga_satuan' => $request->get('harga_satuan'), 'jumlah' => $request->get('volume') * $request->get('harga_satuan'),
    ]);
    Session::flash('success_message', "Baris pada Buku Rencana Anggaran Biaya Berhasil Ditambahkan");
    return redirect('/rencana_anggaran_biaya/'.$buku_rencana_anggaran_biaya_id.'/members');
  }

  public function Edit($id) {
    $buku_rencana_anggaran_biaya = BukuRencanaAnggaranBiaya::find($id);
    return view('rencana_anggaran_biaya.edit', ['title'=>$this->title, 'data'=>$buku_rencana_anggaran_biaya, 'type'=>'edit']);
  }

  public function memberEdit($buku_rencana_anggaran_biaya_id, $rencana_anggaran_biaya_id) {
    $buku_rencana_anggaran_biaya = BukuRencanaAnggaranBiaya::find($buku_rencana_anggaran_biaya_id);
    $rencana_anggaran_biaya = $buku_rencana_anggaran_biaya->rencana_anggaran_biaya()->find($rencana_anggaran_biaya_id);
    return view('rencana_anggaran_biaya.member_edit', ['title'=>$this->title, 'data'=>$rencana_anggaran_biaya, 'type'=>'edit',
      'buku_rencana_anggaran_biaya_id'=>$buku_rencana_anggaran_biaya_id, 'rencana_anggaran_biaya_id'=>$rencana_anggaran_biaya_id]);
  }

  public function Update(Request $request, $buku_rencana_anggaran_biaya_id) {
    $this->validate($request, [
        'tahun' => 'required|digits:4',
        'waktu_pelaksanaan' => 'required|date',
        'bidang' => 'required',
        'kegiatan' => 'required',
    ], [
        'required' => 'Kolom :attribute wajib diisi.',
        'date' => 'Kolom :attribute diisi dengan format hh/bb/tttt.',
        'digits' => 'Kolom :attribute diisi dengan 4 karakter numerik.',
    ]);
    $buku_rencana_anggaran_biaya = BukuRencanaAnggaranBiaya::find($buku_rencana_anggaran_biaya_id);
    $buku_rencana_anggaran_biaya->tahun = $request->get('tahun');
    $buku_rencana_anggaran_biaya->waktu_pelaksanaan = Carbon::parse($request->get('waktu_pelaksanaan'))->format('Y/m/d');
    $buku_rencana_anggaran_biaya->kegiatan = $request->get('kegiatan');
    $buku_rencana_anggaran_biaya->bidang = $request->get('bidang');
    $saved = $buku_rencana_anggaran_biaya->save();
    Session::flash('success_message', "Buku Rencana Anggaran Biaya Berhasil Diubah");
    return redirect('rencana_anggaran_biaya');
  }

  public function memberUpdate(Request $request, $buku_rencana_anggaran_biaya_id, $rencana_anggaran_biaya_id) {
    $this->validate($request, [
        'uraian' => 'required',
        'volume' => 'required|integer',
        'harga_satuan' => 'required|integer',
    ], [
        'required' => 'Kolom :attribute wajib diisi.',
        'integer' => 'Kolom :attribute hanya berisikan angka.'
    ]);
    $buku_rencana_anggaran_biaya = BukuRencanaAnggaranBiaya::find($buku_rencana_anggaran_biaya_id);
    $rencana_anggaran_biaya = $buku_rencana_anggaran_biaya->rencana_anggaran_biaya()->find($rencana_anggaran_biaya_id)->update($request->all());
    Session::flash('success_message', "Baris pada Buku Rencana Anggaran Biaya Berhasil Diubah");
    return redirect('/rencana_anggaran_biaya/'.$buku_rencana_anggaran_biaya_id.'/members');
  }

  public function Destroy($id) {
    $buku_rencana_anggaran_biaya = BukuRencanaAnggaranBiaya::findOrFail($id);
    $buku_rencana_anggaran_biaya->delete();
    Session::flash('failed_message', "Buku Rencana Anggaran Berhasil Dihapus");
    return redirect('rencana_anggaran_biaya');
  }

  public function memberDestroy($buku_rencana_anggaran_biaya_id, $rencana_anggaran_biaya_id) {
    $buku_rencana_anggaran_biaya = BukuRencanaAnggaranBiaya::find($buku_rencana_anggaran_biaya_id);
    $rencana_anggaran_biaya = $buku_rencana_anggaran_biaya->rencana_anggaran_biaya()->find($rencana_anggaran_biaya_id);
    $rencana_anggaran_biaya->delete();
    Session::flash('failed_message', "Baris pada Buku Rencana Anggaran Biaya Berhasil Dihapus");
    return redirect('/rencana_anggaran_biaya/'.$buku_rencana_anggaran_biaya_id.'/members');
  }

  public function getFilter() {

    return view('rencana_anggaran_biaya.filter', ['title'=>$this->title]);
  }

  public function getDownload($id) {
    $profil_desa = ProfilDesa::first();
    $buku_rencana_anggaran_biaya = BukuRencanaAnggaranBiaya::findOrFail($id);
    $rencana_anggaran_biaya = $buku_rencana_anggaran_biaya->rencana_anggaran_biaya()->get();
    $pdf = PDF::loadView('rencana_anggaran_biaya.download', ['rencana_anggaran_biaya'=>$rencana_anggaran_biaya,
      'buku_rencana_anggaran_biaya'=>$buku_rencana_anggaran_biaya, 'title'=>$this->title, 'profil_desa'=>$profil_desa]);
    return $pdf->download('rencana_anggaran_biaya.pdf');
  }

  public function getPrint($buku_rencana_anggaran_biaya_id) {
    $profil_desa = ProfilDesa::first();
    if (empty($profil_desa)) {
      Session::flash('failed_message', "Profil Desa Belum Terisi");
      return redirect('profil_desa');
    }
    $buku_rencana_anggaran_biaya = BukuRencanaAnggaranBiaya::find($buku_rencana_anggaran_biaya_id);
    $rencana_anggaran_biaya = $buku_rencana_anggaran_biaya->rencana_anggaran_biaya()->paginate();
    return view('rencana_anggaran_biaya.print', ['title' => $this->title, 'data' => $rencana_anggaran_biaya,
      'buku_rencana_anggaran_biaya_id'=>$buku_rencana_anggaran_biaya_id, 'profil_desa'=>$profil_desa,
      'buku_rencana_anggaran_biaya'=>$buku_rencana_anggaran_biaya]);
  }

  public function getExcel($buku_rencana_anggaran_biaya_id) {
    return Excel::create('Filename', function($excel) use($buku_rencana_anggaran_biaya_id){
        $excel->sheet('Sheetname', function($sheet) use($buku_rencana_anggaran_biaya_id){
          $sheet->setStyle(array(
          'font' => array(
              'name'      =>  'Calibri',
              'size'      =>  12,
              'bold'      =>  true
          )
        ));

          $profil_desa = ProfilDesa::first();
          $buku_rencana_anggaran_biaya = BukuRencanaAnggaranBiaya::find($buku_rencana_anggaran_biaya_id);

          $rencana_anggaran_biaya = $buku_rencana_anggaran_biaya->rencana_anggaran_biaya()->paginate();
          $sheet->loadView('rencana_anggaran_biaya.excel', array('title' => $this->title, 'data' => $rencana_anggaran_biaya,
            'profil_desa'=>$profil_desa, 'buku_rencana_anggaran_biaya_id' => $buku_rencana_anggaran_biaya_id,
            'buku_rencana_anggaran_biaya'=>$buku_rencana_anggaran_biaya));
        });
    })->export('xls');
  }

  protected function validator(array $data)
  {
      return Validator::make($data, [
          'uraian' => 'required',
          'volume' => 'required|integer',
          'harga_satuan' => 'required|integer',
      ], [
          'required' => 'Kolom :attribute wajib diisi.',
          'integer' => 'Kolom :attribute hanya berisikan angka.'
      ]);
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
  //   $rencana_anggaran_biaya = DB::select("select * from rencana_anggaran_biaya where bidang like '".$bidang."%' and kegiatan
  //     like '".$kegiatan."%' and waktu_pelaksanaan like '".$waktu_pelaksanaan."%' and waktu_pelaksanaan like '".$tahun."%' order by id")->paginate();
  //   setlocale(LC_TIME, 'IND');
  //   $tanggal = Carbon::now()->formatLocalized('%d-%m-%Y');
  //   $profil_desa = ProfilDesa::first();
  //   return view('rencana_anggaran_biaya.member_index', ['title' => $this->title, 'data' => $rencana_anggaran_biaya,
  //     'date'=>$tanggal, 'profil_desa'=>$profil_desa]);
  // }
}
