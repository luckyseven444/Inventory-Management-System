@extends('layouts.app-02')

@section('content')
    <div class="center-block w-xxl w-auto-xs p-y-md">

        <div class="p-a-md box-color r box-shadow-z1 text-color m-a">
            <div class="m-b text-sm">
                Sign in with your Account
            </div>
            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}

                <div class="md-form-group float-label {{ $errors->has('email') ? ' has-error' : '' }}">
                    <input id="email" type="email" class="md-input" name="email" value="{{ old('email') }}" required autofocus>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    <label>Email</label>
                </div>

                <div class="md-form-group float-label {{ $errors->has('password') ? ' has-error' : '' }}">
                    <input id="password" type="password" class="md-input" name="password" required>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                    <label>Password</label>
                </div>
                <div class="m-b-md">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                        </label>
                    </div>
                </div>

                <button type="submit" class="btn primary btn-block p-x-md">
                    Login
                </button>
            </form>
        </div>
        <div class="p-v-lg text-center">
            <div class="m-b">
                <a href="{{ route('password.request') }}" class="text-primary _600">
                    Forgot Your Password?
                </a>
            </div>
        </div>
    </div>
@endsection