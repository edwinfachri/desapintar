<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;
use App\TransaksiTunai;
use App\TransaksiBukti;
use Carbon\Carbon;
use Intervention\Image\ImageManagerStatic as Image;


class TransaksiTunaiController extends Controller
{
    public function __construct() {
      $this->middleware('auth');
      $this->title = 'Transaksi Tunai Desa';
    }
    public function Index() {
      $transaksi_tunai = TransaksiTunai::all();
      return view('administrasi_keuangan.transaksi_tunai.index', ['title' => $this->title,
        'data' => $transaksi_tunai]);
    }

    public function Create() {
      return view('administrasi_keuangan.transaksi_tunai.create', ['title' => $this->title]);
    }

    public function Store(Request $request) {
      $this->validator($request->all())->validate();
      if( $request->hasFile('bukti')) {
          $image = $request->file('bukti');
          $request['imagename'] = time() . '.' .strtolower($image->getClientOriginalExtension());

          $destinationPath = public_path('/images/bukti_transaksi_tunai');
          $img = Image::make($image->getRealPath());
          $img->save($destinationPath.'/'.$request['imagename']);

          // $destinationPath = public_path('/images');
          // $image->move($destinationPath, $request['imagename']);

          // $this->postImage->add($request);

      }
      $transaksi_tunai = new TransaksiTunai;

      $transaksi_tunai->tg_trans = Carbon::parse($request->get('tg_trans'))->format('Y/m/d');
      $transaksi_tunai->kd_rek = $request->get('kd_rek');
      $transaksi_tunai->uraian = $request->get('uraian');
      $transaksi_tunai->harga = $request->get('harga');
      $transaksi_tunai->volume = $request->get('volume');
      $transaksi_tunai->jenis_dana = $request->get('jenis_dana');
      $transaksi_tunai->bukti = $request['imagename'];
      $transaksi_tunai->saldo = Null;
      $transaksi_tunai->ket = $request->get('ket');

      $result = $transaksi_tunai->save();
      if ($result) {
        Session::flash('success_message', 'Data Berhasil Ditambahkan');
        return redirect('transaksi_tunai');
      } else {
        Session::flash('failed_message', 'Data Gagal Ditambahkan');
        return redirect('transaksi_tunai');
      }
    }

    public function Edit($id) {
      $transaksi_tunai = TransaksiTunai::find($id);
      return view('administrasi_keuangan.transaksi_tunai.edit', ['title'=>$this->title, 'data'=>$transaksi_tunai, 'type'=>'edit']);
    }


    public function Update(Request $request, $id) {
      $this->validator($request->all())->validate();
      $result = TransaksiTunai::first()->update($request->all());
      if( $request->hasFile('bukti')) {
          $image = $request->file('bukti');
          $request['imagename'] = time() . '.' .strtolower($image->getClientOriginalExtension());

          $destinationPath = public_path('/images/bukti_transaksi_tunai');
          $img = Image::make($image->getRealPath());
          $img->save($destinationPath.'/'.$request['imagename']);

          // $destinationPath = public_path('/images');
          // $image->move($destinationPath, $request['imagename']);

          // $this->postImage->add($request);
          TransaksiTunai::find($id)->update(['bukti'=>$request['imagename']]);
      }
      if ($result) {
        Session::flash('success_message', 'Data Berhasil Diubah');
        return redirect('transaksi_tunai');
      } else {
        Session::flash('failed_message', 'Data Gagal Diubah');
        return redirect('transaksi_tunai');
      }
    }

    public function View($id) {
      $transaksi_tunai = TransaksiTunai::find($id);
      return view('administrasi_keuangan.transaksi_tunai.edit', ['title'=>$this->title, 'data'=>$transaksi_tunai, 'type'=>'view']);
    }

    public function Destroy($id) {
      $transaksi_tunai = TransaksiTunai::find($id);
      $result = $transaksi_tunai->delete();
      if ($result) {
        Session::flash('success_message', 'Data Berhasil Dihapus');
        return redirect('transaksi_tunai');
      } else {
        Session::flash('failed_message', 'Data Gagal Dihapus');
        return redirect('transaksi_tunai');
      }
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'tg_trans' => 'required',
            'kd_rek' => 'required',
            'uraian' => 'required',
            'harga' => 'required|integer',
            'volume' => 'required|integer',
            'jenis_dana' => 'required',
            'bukti' => 'nullable|image',
            'ket' => 'nullable',
        ], [
            'required' => 'Kolom :attribute wajib diisi.',
            'integer' => 'Kolom :attribute hanya berisikan angka.',
            'image' => 'Kolom :attribute hanya berisikan file dengan format gambar (JPG, PNG, dll).'
        ]);
    }
}
