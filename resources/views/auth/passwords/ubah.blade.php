@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-xs-8 col-lg-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reset Password</div>

                <div class="panel-body">
                  @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                  @endif

                    <form class="form-horizontal" method="POST" action="{{ route('sandi.ulang') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">
                        <input type="hidden" name="email" value="{{ $email }}">

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 col-xs-4 col-lg-4 control-label">ID Pengguna</label>

                            <div class="col-md-6 col-xs-6 col-lg-6">
                                <input id="email" type="text" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>

                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 col-xs-4 control-label">Kata Sandi</label>

                            <div class="col-md-6 col-xs-6">
                                <input id="password" type="password" class="form-control" name="password" placeholder="********" required>

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 col-xs-4 control-label">Konfirmasi Kata Sandi</label>

                            <div class="col-md-6 col-xs-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="********" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-xs-6 col-lg-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Reset Password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
