@extends('layouts.app', ['styles' => ['users/index']])

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
    <div class="profil-body">
      <div class="profil-info">
        <h3>E-Mail adress</h3>
        <h5>{{$user->email}}</h5>
        <a href="{{route('users.edit', $user->id)}}"><div class="btn user-edit">edit</div></a>
      </div>
    </div>
  </div>
</div>
@endsection
