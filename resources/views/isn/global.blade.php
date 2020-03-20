@extends('layouts.app', ['styles' => ['home'], 'noHeader' => true])

@section('title', 'Websites home')
@section('content')
<div class="container col-11 offset-1">
  @foreach($websites as $website)
  {{-- <div class="box-web" data-website-id="{{ $website->id }}">
    <div class="box-header">
      <h3>{{$website->name}}</h3>
      <span>{{$website->students}}</span>
    </div>
    <div class="box-body">
      <div class="info">
        <h4>{{$website->articles}} suivis du projet</h4>
        <a href="{{ route('isn.view', $website->id) }}"><div class="btn">voir</div></a>
      </div>
    </div>
  </div> --}}
  @foreach($website->users as $user)
  <div class="box-web" data-website-id="{{ $website->id }}">
    <div class="box-header">
      <h3>{{$website->name}}</h3>
      <span>{{$user}}</span>
    </div>
    <div class="box-body">
      <div class="info">
        <h4>{{$website->articles}} suivis du projet</h4>
        <a href="{{ route('isn.byuser', [$website->id, $user]) }}"><div class="btn">voir</div></a>
      </div>
    </div>
  </div>
  @endforeach
  @endforeach
</div>
@endsection
