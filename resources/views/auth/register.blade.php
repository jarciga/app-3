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
                                    <span class="input-group-addon"><i class="icon-user-following"></i>
                                    </span>
                                  
                                    <?php
                                        $role = isset($role) ? $role : old('role');
                                    ?>

                                    <select name="role" class="form-control" id="role" required autofocus>
                                        <option value="">Role</option>
                                        
                                        <option value="1" <?php echo ($role == '1') ? 'selected' : ''; ?>>Administrator</option>

                                        <option value="2" <?php echo ($role == '2') ? 'selected' : ''; ?>>User</option>
                                    </select>


                                    @if ($errors->has('role'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('role') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="input-group mb-3{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <span class="input-group-addon"><i class="icon-user"></i>
                                    </span>
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Full name" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group mb-3{{ $errors->has('username') ? ' has-error' : '' }}">
                                    <span class="input-group-addon"><i class="icon-user"></i>
                                    </span>
                                    <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Username" required>

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
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email (Optional)">

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

                                    <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>

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
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Password Confirmation" required>
                            </div>

                            <button type="submit" class="btn btn-block btn-success">Register</button>

                        </form>
                        
                    </div>
                    
                </div>
            </div>
        </div>
    </div>


@endsection
