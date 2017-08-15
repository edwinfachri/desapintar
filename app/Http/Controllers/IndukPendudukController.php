<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;
use App\IndukPenduduk;
use DB;
use Carbon\Carbon;

class IndukPendudukController extends Controller
{
    public function __construct() {
      $this->middleware('auth');
      $this->title = 'Buku Induk Penduduk';
    }

    public function Index() {
      $induk_penduduk = IndukPenduduk::orderBy('id')->paginate();
      $tanggal = Carbon::now()
      return view('induk_penduduk.index', ['title'=>$this->title, 'data'=>$induk_penduduk, 'date'=>$tanggal]);
    }

    public function Show($id) {
      $induk_penduduk = IndukPenduduk::findOrFail($id);
      return view('induk_penduduk.show', ['title'=>$this->title, 'data'=>$induk_penduduk, 'type'=>'show']);
    }

    public function Create() {
      return view('induk_penduduk.create', ['title' => $this->title]);
    }

    public function Store(Request $request) {
      $input = $request;
      $induk_penduduk = new IndukPenduduk;
      $induk_penduduk->nama = $input->get('nama');
      $induk_penduduk->kelamin = $input->get('kelamin');
      $induk_penduduk->stat_kawin = $input->get('stat_kawin');
      $induk_penduduk->tempat_lahir = $input->get('tempat_lahir');
      $induk_penduduk->tg_lahir = Carbon::parse($input->get('tg_lahir'))->format('Y/m/d');
      $induk_penduduk->pendidikan = $input->get('pendidikan');
      $induk_penduduk->pekerjaan = $input->get('pekerjaan');
      $induk_penduduk->baca_huruf = $input->get('baca_huruf');
      $induk_penduduk->kewarganegaraan = $input->get('kewarganegaraan');
      $induk_penduduk->alamat = $input->get('alamat');
      $induk_penduduk->ked_keluarga = $input->get('ked_keluarga');
      $induk_penduduk->nik = $input->get('nik');
      $induk_penduduk->no_kk = $input->get('no_kk');
      $induk_penduduk->ket = $input->get('ket');
      $induk_penduduk->save();
      Session::flash('alert-success', 'Data Berhasil Dimasukan');
      return redirect('induk_penduduk');
    }

    public function Edit($id) {
      $induk_penduduk = IndukPenduduk::find($id);
      return view('induk_penduduk.edit', ['title'=>$this->title, 'data'=>$induk_penduduk, 'type'=>'edit']);
    }

    public function Update(Request $request, $id) {
      IndukPenduduk::find($id)->update($request->all());
      Session::flash('alert-success', 'Data Berhasil Diubah');
      return redirect('induk_penduduk');
    }

    public function Destroy($id) {
      $induk_penduduk = IndukPenduduk::findOrFail($id);
      $induk_penduduk->delete();
      Session::flash('alert-success', 'Data Berhasil Dimasukan');
      return redirect('induk_penduduk');
    }

    public function getPrint($id) {
      $induk_penduduk = IndukPenduduk::findOrFail($id);
      $pdf = App::make('dompdf.wrapper');
      $pdf->loadHTML($induk_penduduk);
      return $pdf->download('induk_penduduk.pdf');;
    }
}
