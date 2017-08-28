<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;
use App\TransaksiBank;
use App\TransaksiBukti;
use Carbon\Carbon;
use Intervention\Image\ImageManagerStatic as Image;

class TransaksiBankController extends Controller
{
    public function __construct() {
      $this->middleware('auth');
      $this->title = 'Transaksi Perbankan Desa';
    }

    public function Index() {
      $transaksi_bank = TransaksiBank::all();
      return view('administrasi_keuangan.transaksi_bank.index', ['title' => $this->title,
        'data' => $transaksi_bank]);
    }

    public function Create() {
      return view('administrasi_keuangan.transaksi_bank.create', ['title' => $this->title]);
    }

    public function Store(Request $request) {
      $this->validator($request->all())->validate();
      if( $request->hasFile('bukti')) {
          $image = $request->file('bukti');
          $request['imagename'] = time() . '.' .strtolower($image->getClientOriginalExtension());

          $destinationPath = public_path('/images/bukti_transaksi_bank');
          $img = Image::make($image->getRealPath());
          $img->save($destinationPath.'/'.$request['imagename']);

          // $destinationPath = public_path('/images');
          // $image->move($destinationPath, $request['imagename']);

          // $this->postImage->add($request);

      }
      $transaksi_bank = new TransaksiBank;

      $transaksi_bank->tg_trans = Carbon::parse($request->get('tg_trans'))->format('Y/m/d');
      $transaksi_bank->uraian = $request->get('uraian');
      $transaksi_bank->harga = $request->get('harga');
      $transaksi_bank->volume = $request->get('volume');
      $transaksi_bank->jenis_transaksi = $request->get('jenis_transaksi');
      $transaksi_bank->bukti = $request['imagename'];
      $transaksi_bank->saldo = Null;
      $transaksi_bank->biaya_adm = $request->get('biaya_adm');
      $transaksi_bank->ket = $request->get('ket');

      $result = $transaksi_bank->save();
      if ($result) {
        Session::flash('success_message', 'Data Berhasil Ditambahkan');
        return redirect('transaksi_bank');
      } else {
        Session::flash('failed_message', 'Data Gagal Ditambahkan');
        return redirect('transaksi_bank');
      }
    }

    public function Edit($id) {
      $transaksi_bank = TransaksiBank::find($id);
      return view('administrasi_keuangan.transaksi_bank.edit', ['title'=>$this->title, 'data'=>$transaksi_bank, 'type'=>'edit']);
    }


    public function Update(Request $request, $id) {
      $this->validator($request->all())->validate();
      $result = TransaksiBank::first()->update($request->all());
      if( $request->hasFile('bukti')) {
          $image = $request->file('bukti');
          $request['imagename'] = time() . '.' .strtolower($image->getClientOriginalExtension());

          $destinationPath = public_path('/images/bukti_transaksi_bank');
          $img = Image::make($image->getRealPath());
          $img->save($destinationPath.'/'.$request['imagename']);

          // $destinationPath = public_path('/images');
          // $image->move($destinationPath, $request['imagename']);

          // $this->postImage->add($request);
          TransaksiBank::find($id)->update(['bukti'=>$request['imagename']]);
      }
      if ($result) {
        Session::flash('success_message', 'Data Berhasil Diubah');
        return redirect('transaksi_bank');
      } else {
        Session::flash('failed_message', 'Data Gagal Diubah');
        return redirect('transaksi_bank');
      }
    }

    public function View($id) {
      $transaksi_bank = TransaksiBank::find($id);
      return view('administrasi_keuangan.transaksi_bank.edit', ['title'=>$this->title, 'data'=>$transaksi_bank, 'type'=>'view']);
    }

    public function Destroy($id) {
      $transaksi_bank = TransaksiBank::find($id);
      $result = $transaksi_bank->delete();
      if ($result) {
        Session::flash('success_message', 'Data Berhasil Dihapus');
        return redirect('transaksi_bank');
      } else {
        Session::flash('failed_message', 'Data Gagal Dihapus');
        return redirect('transaksi_bank');
      }
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'tg_trans' => 'required',
            'uraian' => 'required',
            'harga' => 'required|integer',
            'volume' => 'required|integer',
            'jenis_transaksi' => 'required',
            'bukti' => 'nullable|image',
            'biaya_adm' => 'integer',
            'ket' => 'nullable',
        ], [
            'required' => 'Kolom :attribute wajib diisi.',
            'integer' => 'Kolom :attribute hanya berisikan angka.',
            'image' => 'Kolom :attribute hanya berisikan file dengan format gambar (JPG, PNG, dll).'
        ]);
    }
}
