@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <form action="{{ route('websites.update', $website->id) }}" method="POST">
      @csrf
      @method('PATCH')
      <div class="form-group">
        <label for="name">Name</label>
        <input type="name" class="form-control" id="name" name="name" value="{{$website->name}}">
        @if ($errors->has('name'))
          <span class="text-danger">{{ $errors->first('name') }}</span>
        @endif
      </div>
      <div class="form-group">
        <label for="url">url</label>
        <input type="url" class="form-control" id="url" name="url" value="{{$website->url}}">
        @if ($errors->has('url'))
          <span class="text-danger">{{ $errors->first('url') }}</span>
        @endif
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>
@endsection