@extends('layouts.app')

@section('content')
<div class="container center">
        <div class="row">
            <div class="card col s12 m6 offset-m3 authform z-depth-4">
                <div class="card-title">Log In</div>

                <div class="card-content">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row">
                            <div class="input-field col s8 offset-m2">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                                <label for="email"">E-Mail Address</label>

                                @if ($errors->has('email'))
                                    <span class="red-text">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>                                
                        </div>

                        <div class="row">

                            <div class="input-field col s8 offset-m2">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                <label for="password">Password</label>

                                @if ($errors->has('password'))
                                    <span class="red-text">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col s8 offset-m2">
                                <button type="submit" class="waves-effect waves-light btn col s12">
                                    Login
                                </button>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s8 offset-m2">
                                    <input type="checkbox" name="remember" id="remember">
                                    <label for="remember">Remember Me {{ old('remember') ? 'checked' : '' }}</label>
                            </div>
                        </div>

                        <div class="row">                        
                            <div class="col s12">
                                <a href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div>
@endsection
