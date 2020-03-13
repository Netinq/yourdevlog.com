@extends('layouts.app', ['styles' => ['websites/create']])

@section('content')
<div class="form col-md-8 col-lg-6 row">
  <div class="form-container col-10 offset-1 col-sm-8 offset-sm-2">
    <h1>register a new website</h1>
    <form method="POST" action="{{ route('websites.store') }}">
      @csrf
      <div class="form-group">
        <label for="name">Name</label>
        <input type="name" class="form-control @if($errors->has('name')) is-invalid @endif" id="name" name="name" placeholder="Enter name" value="{{ old('name') }}">
        @if ($errors->has('name'))
          <span class="text-danger">{{ $errors->first('name') }}</span>
        @endif
      </div>
      <div class="form-group">
        <label for="url">url</label>
        <input class="form-control @if($errors->has('url')) is-invalid @endif" id="url" name="url" placeholder="url" 
        value="@if(old('url') == null || ($errors->has('url')))http://@else{{old('url')}}@endif">
        @if ($errors->has('url'))
        <span class="text-danger">{{ $errors->first('url') }}</span>
        @endif
      </div>
      <div class="form-group row">
        <div class="col-6 offset-3">
          <button type="submit" class="btn btn-primary">
            register
          </button>
        </div>
      </div>
    </form>
  </div>
</div>
<div class="exemple col-md-6">
</div>
{{-- <div class="container">
  <div class="row justify-content-center">
    <form action="{{ route('websites.store') }}" method="POST">
      @csrf
      <div class="form-group">
        <label for="name">Name</label>
        <input type="name" class="form-control" id="name" name="name" placeholder="Enter name">
        @if ($errors->has('name'))
          <span class="text-danger">{{ $errors->first('name') }}</span>
        @endif
      </div>
      <div class="form-group">
        <label for="url">url</label>
        <input type="url" class="form-control" id="url" name="url" placeholder="url">
        @if ($errors->has('url'))
          <span class="text-danger">{{ $errors->first('url') }}</span>
        @endif
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div> --}}
@endsection