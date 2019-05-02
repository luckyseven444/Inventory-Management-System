@extends('layouts.app-02')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="md-form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                            <input id="name" type="text" name="name" class="md-input" value="{{ old('name') }}" required autofocus>

                            @if ($errors->has('name'))
                                <span>
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                            <label>Name</label>
                        </div>
                        <div class="md-form-group">
                            <input id="email" type="email" class="md-input" name="email" value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                            <label>Email</label>
                        </div>
                        <div class="md-form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                            <input id="password" type="password" class="md-input" name="password" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                            <label>Password</label>
                        </div>

                        <div class="md-form-group">
                            <input id="password-confirm" type="password" class="md-input" name="password_confirmation" required>
                            <label>Confirm Password</label>
                        </div>

                        <button type="submit" class="btn primary btn-block p-x-md">Sign up</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
