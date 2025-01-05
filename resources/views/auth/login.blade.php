@extends('layouts.auth')

@section('content')

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card-group mb-0">
                    <div class="card p-4">
                        <div class="card-block">

                            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}

                                <h1>Login</h1>
                                <p class="text-muted">Sign In to your account</p>
                                <div class="form-group">
                                    <div class="input-group mb-3 {{ $errors->has('username') ? ' has-error' : '' }}">
                                            <span class="input-group-addon"><i class="icon-user"></i></span>

                                            <input id="username" type="username" class="form-control" name="username" value="{{ old('username') }}" placeholder="Username" required autofocus>


                                    </div>

                                    @if ($errors->has('username'))
                                        <p class="form-text text-muted">
                                            <strong>{{ $errors->first('username') }}</strong>
                                        </p>
                                    @endif

                                </div>

                                <div class="form-group">
                                    <div class="input-group mb-4 {{ $errors->has('password') ? ' has-error' : '' }}">
                                        
                                            <span class="input-group-addon"><i class="icon-lock"></i></span>
                                            <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
                       
                                    </div>

                                     @if ($errors->has('password'))
                                        <p class="form-text text-muted">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </p>
                                    @endif

                                </div>    


                                <div class="input-group mb-3">
                                    <!--div class="col-md-6 col-md-offset-4"-->
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                            </label>
                                        </div>
                                    <!--/div-->
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <button type="submit" class="btn btn-primary px-4">Login</button>
                                    </div>
                                    <div class="col-6 text-right invisible">
                                        <a class="btn btn-link px-0" href="{{ route('password.request') }}">
                                            Forgot Your Password?
                                        </a>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>
                    <div class="card card-inverse card-primary py-5 d-md-down-none" style="width:44%">
                        <div class="card-block text-center">
                            <div>
                                <h2>
                                <img src="{{ url('/img') }}/favicon.png" width="64" height="64">
                                <br>
                                Santolan Pawnshop System
                                </h2>
                                <p>Version 1.0.0</p>
                                <a href="{{ route('register') }}" class="btn btn-primary active mt-3">Register Now!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
