@extends('layouts.app', ['styles' => ['auth/form'], 'noHeader' => true])

@section('title', 'Create a new account')
@section('content')
<div class="branding col-sm-7">
    <img alt="YourDevlog's logo" src="{{asset('images/logo.png')}}">
    <h1>welcome to yourdevlog</h1>
    <span>create a new account now</span>
    <a href="{{route('welcome')}}"><div class="btn btn-home">Back to home</div></a>
</div>
<div class="form col-sm-5">
    <form method="POST" action="{{ route('register') }}" class="col-md-8">
        @csrf
        <div class="form-group">
            <label for="name" class="col-form-label text-md-right">{{ __('Name') }}</label>
            <div>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="email" class="col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
            <div>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>
            <div>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="password-confirm" class="col-form-label text-md-right">{{ __('Confirm Password') }}</label>
            <div>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
            </div>
        </div>
        <div class="form-group">
            <div class="col-6 offset-3">
                <button type="submit" class="btn btn-primary">
                    {{ __('Register') }}
                </button>
            </div>
        </div>
        <div class="form-group message">
            <a href="{{route('login')}}">I already have an account ? </a>
        </div>
    </form>
</div>
@endsection
