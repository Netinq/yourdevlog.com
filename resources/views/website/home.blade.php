@extends('layouts.app', ['styles' => ['website/home']])

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      @endif 
      @foreach($websites as $website)
        <div class="card"  data-website-id="{{ $website->id }}">
          <div class="card-header">{{$website->name}}</div>
          <div class="card-body">{{$website->url}}</div>
          <a href="{{ route('websites.show', $website->id) }}"><button class="btn btn-primary">Show</button></a>
        </div>
      @endforeach
    </div>
  </div>
</div>
@endsection