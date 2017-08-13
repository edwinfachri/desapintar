<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class UbahController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest');
    }

    public function getLupa()
    {
        return view ('auth.passwords.email');
    }
    public function postJawab(Request $request)
    {
        $data = User::where('email', $request->email)->first();
        if (!$data) {
          return redirect('/login')->with('failed', 'ID Tidak Terdaftar');
        }
        return view ('auth.passwords.jawab', ['token' => $data->remember_token,
          'secret_question' => $data->secret_question, 'email' => $data->email]);
    }
    public function postUbah(Request $request)
    {
        $data = User::where('email', $request->email)->firstOrFail();
        if (\Hash::check($request->secret_answer, $data->secret_answer)) {
          return view ('auth.passwords.ubah', ['token' => $data->remember_token, 'email' => $data->email]);
        } else {
           return redirect('/login')->with('failed', 'Jawaban Tidak Sesuai');
        }
    }

    public function postUlang(Request $request)
    {
        $this->validator($request->all())->validate();
        $data = User::where('email', $request->email)->first();
        $data->forceFill([
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60),
        ])->save();
        if (!$data) {
          return redirect('/login')->with('failed', 'ID Tidak Terdaftar');
        }
        return redirect('/login')->with('success', 'Kata Sandi Berhasil Diubah');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'password' => 'required|string|min:6|confirmed',
        ],[
          'min' => 'Kolom :attribute diisi minimal 6 karakter',
        ]);
    }
}
