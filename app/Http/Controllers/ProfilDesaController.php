<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Input;
use Intervention\Image\ImageManagerStatic as Image;
use App\ProfilDesa;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class ProfilDesaController extends Controller
{
    public function __construct() {
      $this->middleware('auth');
      $this->title = 'Profil Desa';
    }

    public function Store(Request $request) {
      $this->validator($request->all())->validate();
      $profil_desa = new ProfilDesa;
      if( $request->hasFile('logo')) {
          $image = $request->file('logo');
          $request['imagename'] = time() . '.' .strtolower($image->getClientOriginalExtension());

          $destinationPath = public_path('/images/uploads');
          $img = Image::make($image->getRealPath());
          $img->resize(150, 150, function ($constraint) {
      		    $constraint->aspectRatio();
      		})->save($destinationPath.'/'.$request['imagename']);

          // $destinationPath = public_path('/images');
          // $image->move($destinationPath, $request['imagename']);

          // $this->postImage->add($request);

        }
      $profil_desa->logo = $request['imagename'];
      $profil_desa->nik_kepala_desa = $request->get('nik_kepala_desa');
      $profil_desa->kepala_desa = $request->get('kepala_desa');
      $profil_desa->nik_sekretaris_desa = $request->get('nik_sekretaris_desa');
      $profil_desa->sekretaris_desa = $request->get('sekretaris_desa');
      $profil_desa->provinsi = $request->get('provinsi');
      $profil_desa->kota = $request->get('kota');
      $profil_desa->kecamatan = $request->get('kecamatan');
      $profil_desa->desa = $request->get('desa');
      $profil_desa->alamat = $request->get('alamat');
      $profil_desa->kode_pos = $request->get('kode_pos');
      $profil_desa->telp = $request->get('telp');
      $profil_desa->fax = $request->get('fax');
      $profil_desa->email = $request->get('email');
      $profil_desa->website = $request->get('website');
      $profil_desa->save();
      // if( $request->hasFile('logo')) {
      //     $file = $request->file('logo');
      //     $ext = strtolower($file->getClientOriginalExtension());
      //     $imageName = time() . '.' .$ext;
      //     $request->file('logo')->move(
      //         base_path() . '/public/images/uploads/', $imageName
      //     );
      //     Image::make($file->getRealPath())->resize(200, 200)->save('/public/images/uploads/'.$imageName);
      // }

      Session::flash('success_message', 'Data Berhasil Dimasukan');
      return redirect('profil_desa');
    }

    public function Show($id) {
      $profil_desa = ProfilDesa::findOrFail($id);
      return view('rencana_anggaran_biaya.show', ['title'=>$this->title, 'data'=>$profil_desa, 'type'=>'show']);
    }

    public function Edit() {
      $profil_desa = ProfilDesa::first();
      if ($profil_desa == null) {
        return view('profil_desa.create', ['title' => $this->title]);
      }
      return view('profil_desa.edit', ['title'=>$this->title, 'data'=>$profil_desa, 'type'=>'edit']);
    }

    public function Update(Request $request) {
      $this->validator($request->all())->validate();
      $result = ProfilDesa::first()->update($request->all());
      if( $request->hasFile('logo')) {
          $image = $request->file('logo');
          $request['imagename'] = time() . '.' .strtolower($image->getClientOriginalExtension());

          $destinationPath = public_path('/images/uploads');
          $img = Image::make($image->getRealPath());
          $img->resize(200, 200)->save($destinationPath.'/'.$request['imagename']);

          // $destinationPath = public_path('/images');
          // $image->move($destinationPath, $request['imagename']);

          // $this->postImage->add($request);
          ProfilDesa::first()->update(['logo'=>$request['imagename']]);
        }

      if ($result) {
        Session::flash('success_message', 'Data Berhasil Diubah');
        return redirect('profil_desa');
      } else {
        Session::flash('failed_message', 'Data Gagal Diubah');
        return redirect('profil_desa');
      }
    }

    protected function validator(array $profil_desa)
    {
        return Validator::make($profil_desa, [
            'logo' => 'nullable|image',
            'kepala_desa' => 'required',
            'sekretaris_desa' => 'nullable',
            'provinsi' => 'required',
            'kota' => 'required',
            'kecamatan' => 'required',
            'desa' => 'required',
            'alamat' => 'required',
            'kode_pos' => 'required|digits:5',
            'telp' => 'required|digits_between:6,15',
            'fax' => 'nullable|digits_between:6,15',
            'email' => 'nullable|email',
            'website' => 'nullable',
        ], [
            'required' => 'Kolom :attribute wajib diisi.',
            'digits' => 'Kolom :attribute diisi dengan 5 karakter numerik.',
            'digits_between' => 'Kolom :attribute diisi dengan 6 hingga 15 karakter numerik.',
            'email' => 'Kolom :attribute diisi dengan format surel. Contoh: email@google.com.',
            'url' => 'Kolom :attribute diisi dengan format URL. Contoh: www.google.com.',
        ]);
    }
}
