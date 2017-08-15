@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-xs-8 col-lg-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Jawab Pertanyaan Rahasia</div>

                <div class="panel-body">
                    @if (session('failed'))
                        <div class="alert alert-danger">
                            {{ session('failed') }}
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ route('sandi.ubah') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">
                        <input type="hidden" name="email" value="{{ $email }}">

                        <div class="form-group{{ $errors->has('secret_question') ? ' has-error' : '' }}">
                            <label class="col-md-4 col-xs-4 col-lg-4 control-label">Pertanyaan</label>

                              <p class="col-md-8 col-xs-8 col-lg-8">{{ $secret_question }}</p>
                        </div>

                        <div class="form-group{{ $errors->has('secret_answer') ? ' has-error' : '' }}">
                            <label for="secret_answer" class="col-md-4 col-xs-4 col-lg-4 control-label">Jawaban</label>

                            <div class="col-md-6 col-xs-6 col-lg-6">
                                <input id="password" type="text" class="form-control" name="secret_answer" required>

                                @if ($errors->has('secret_answer'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('secret_answer') }}</strong>
                                    </span>
                                @endif
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
