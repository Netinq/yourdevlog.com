@extends('layouts.app', ['styles' => ['auth/form'], 'noHeader' => true])

@section('title', 'Login to your account')
@section('content')
<div class="branding col-sm-7">
    <img alt="YourDevlog's logo" src="{{asset('images/logo.png')}}">
    <h1>ISN connexion</h1>
    <span>Connectez-vous à votre compte</span>
    <a href="{{route('welcome')}}"><div class="btn btn-home">Retour à l'accueil</div></a>
</div>
<div class="form col-sm-5">
    <form method="POST" action="{{ route('login') }}" class="col-md-8">
        @csrf
        <div class="form-group">
            <label for="email" class="col-form-label text-md-right">Votre e-mail</label>
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
            <label for="password" class="col-form-label text-md-right">votre mot de passe</label>
            <div>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <div class="col-6 offset-3">
                <button type="submit" class="btn btn-primary">
                    connexion
                </button>
            </div>
        </div>
        <div class="form-group message">
            <a href="{{route('isn.register')}}">Je n'ai pas de compte ?</a>
        </div>
    </form>
</div>
@endsection
