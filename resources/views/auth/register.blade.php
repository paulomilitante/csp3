@extends('layouts.app')

@section('title')
    myExpenses
@endsection

@section('content')
<div class="container center">
    <div class="row">
        <div class="card col s12 m6 offset-m3 authform z-depth-4">
            <div class="card-title">Register</div>

            <div class="card-content">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="row">
                        <div class="input-field col s8 offset-s2">
                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                            <label for="name">Name</label>

                            @if ($errors->has('name'))
                                <span class="red-text">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="row">

                        <div class="input-field col s8 offset-s2">
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                            <label for="email">E-Mail Address</label>

                            @if ($errors->has('email'))
                                <span class="red-text">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="row">

                        <div class="input-field col s8 offset-s2">
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

                        <div class="input-field col s8 offset-s2">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            <label for="password-confirm">Confirm Password</label>
                        </div>

                    </div>

                    <div class="row">
                        <div class="input-field col s8 offset-s2">
                            <button type="submit" class="waves-effect waves-light btn col s12">
                                Register
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
