@extends('layouts.auth')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mx-4">
                    <div class="card-block p-4">
                        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                            <h1>Register</h1>
                            <p class="text-muted">Create your account</p>

                            <div class="form-group">
                                <div class="input-group mb-3{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <span class="input-group-addon"><i class="icon-user"></i>
                                    </span>
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group mb-3{{ $errors->has('username') ? ' has-error' : '' }}">
                                    <span class="input-group-addon">@</span>
                                    <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required>

                                    @if ($errors->has('username'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('username') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="input-group mb-3{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <span class="input-group-addon">@</span>
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="input-group mb-3 {{ $errors->has('password') ? ' has-error' : '' }}">
                                    <span class="input-group-addon"><i class="icon-lock"></i>
                                    </span>

                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif

                                </div>
                            </div>

                            <div class="input-group mb-4">
                                <span class="input-group-addon"><i class="icon-lock"></i>
                                </span>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>

                            <button type="submit" class="btn btn-block btn-success">Register</button>

                        </form>
                        
                    </div>
                    
                </div>
            </div>
        </div>
    </div>


@endsection
