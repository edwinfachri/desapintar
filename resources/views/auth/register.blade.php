@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-xs-8 col-md-offset-2">
            <div class="">
                <div class="text-center"><h1>Daftar</h1></div>
                <hr>
                <br>
                <div class="">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 col-xs-4 control-label">Nama</label>

                            <div class="col-md-6 col-xs-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Surahmat" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 col-xs-4 control-label">ID Pengguna</label>

                            <div class="col-md-6 col-xs-6">
                                <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" placeholder="surahmat2017"required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 col-xs-4 control-label">Kata Sandi</label>

                            <div class="col-md-6 col-xs-6">
                                <input id="password" type="password" class="form-control" name="password" placeholder="********" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 col-xs-4 control-label">Konfirmasi Kata Sandi</label>

                            <div class="col-md-6 col-xs-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="********" required>
                            </div>
                        </div>

                        <hr>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 col-xs-4 control-label">&nbsp;</label>

                            <div class="col-md-6 col-xs-6">
                              <h5>Data dibawah ini diperlukan apabila pengguna lupa kata sandi</h5>
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('secret_question') ? ' has-error' : '' }}">
                            <label for="secret_question" class="col-md-4 col-xs-4 control-label">Pertanyaan</label>

                            <div class="col-md-6 col-xs-6">
                                <input id="secret_question" type="text" class="form-control" name="secret_question" value="{{ old('secret_question') }}" placeholder="Nama Hewan Peliharaan" required>

                                @if ($errors->has('secret_question'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('secret_question') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('secret_answer') ? ' has-error' : '' }}">
                            <label for="secret_answer" class="col-md-4 col-xs-4 control-label">Jawaban</label>

                            <div class="col-md-6 col-xs-6">
                                <input id="secret_answer" type="text" class="form-control" name="secret_answer" value="{{ old('secret_answer') }}" placeholder="Bleki" required>

                                @if ($errors->has('secret_answer'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('secret_answer') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-xs-6 col-md-offset-4">
                                <button type="submit" class="btn btn-lg btn-primary">
                                    Daftar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
