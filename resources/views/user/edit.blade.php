@extends('layouts.app', ['styles' => ['users/form']])

@section('title', $user->name)
@section('content')
@if ( Session::has('success') )
<div class="popup offset-md-1 col-md-11 col-10 offset-2">
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Fermer">
      <span aria-hidden="true">&times;</span>
      <span class="sr-only">Fermer</span>
    </button>
    {{ Session::get('success') }}
  </div>
</div>
@endif
<div class="offset-2 offset-md-1 col-10 col-md-6 informations">
  <div class="profil">
    <div class="profil-header">
      <div class="profil-icon"><img src="{{asset('images/icons/people-orange.svg')}}"></div>
      <div class="profil-title">
        <h1>{{$user->name}}</h1>
        <h4>created at {{$user->created_at->format('d/m/y')}}</h4>
      </div>
    </div>
    <div class="profil-body form">
      <form method="POST" action="{{ route('users.update', $user->id) }}" class="col-md-8">
        @csrf
        @method('PUT')
        <div class="profil-info">
          <div class="form-group">
            <label for="name" class="col-form-label text-md-right">{{ __('Name') }}</label>
            <div>
              <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
               value="{{$user->name}}" autofocus>
              @error('name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
          </div>
        </div>
        <div class="profil-info">
          <div class="form-group">
            <label for="email" class="col-form-label text-md-right">{{ __('email') }}</label>
            <div>
              <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email"
               value="{{$user->email}}">
              @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
          </div>
        </div>
        <div class="profil-info">
          <div class="form-group">
            <button type="submit" class="btn btn-primary">
                modify
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
