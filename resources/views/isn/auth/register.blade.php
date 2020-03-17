@extends('layouts.app', ['styles' => ['auth/form'], 'noHeader' => true])

@section('title', 'Create a new account')
@section('content')
<div class="branding col-sm-7">
    <img alt="YourDevlog's logo" src="{{asset('images/logo.png')}}">
    <h1>ISN inscription</h1>
    <span>veuillez créer un compte</span>
    <a href="{{route('welcome')}}"><div class="btn btn-home">Retour à l'accueil</div></a>
</div>
<div class="form col-sm-5">
    <form method="POST" action="{{ route('register') }}" class="col-md-8">
        @csrf
        <div class="form-group">
            <label for="name" class="col-form-label text-md-right">Nom, Prénom</label>
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
            <label for="password" class="col-form-label text-md-right">mot de passe (stockage sécurisé)</label>
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
            <label for="password-confirm" class="col-form-label text-md-right">confirmer mot de passe</label>
            <div>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
            </div>
        </div>
        <div class="form-group">
            <label for="code" class="col-form-label text-md-right">votre code projet</label>
            <div class="col-6">
                <input id="code" type="code" class="form-control" name="code" required>
            </div>
        </div>
        <div class="form-group">
            <div class="col-6 offset-3">
                <button type="submit" class="btn btn-primary">
                    inscription
                </button>
            </div>
        </div>
        <div class="form-group message">
            <a href="{{route('isn.login')}}">J'ai déjà un compte ?</a>
        </div>
    </form>
</div>
@endsection
