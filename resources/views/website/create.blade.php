@extends('layouts.app')

@section('content')
<div class="container">
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
</div>
@endsection