@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <form action="{{ route('articles.store') }}" method="POST">
      @csrf
      <div class="form-group">
        <label for="name">Name</label>
        <input type="name" class="form-control" id="name" name="name" placeholder="Enter name">
        @if ($errors->has('name'))
          <span class="text-danger">{{ $errors->first('name') }}</span>
        @endif
      </div>
      <div class="form-group">
        <label for="website">Website select</label>
        <select class="form-control" id="website" name="website_id">
          @foreach($websites as $website)
            <option value="{{ $website->id }}" data-website-id="{{ $website->id }}">
              {{ $website->name }} ( {{ $website->url }} )
            </option>
          @endforeach
        </select>
        @if ($errors->has('website_id'))
          <span class="text-danger">{{ $errors->first('website_id') }}</span>
        @endif
      </div>
      <div class="form-group">
        <label for="type">Type Select</label>
        <input type="type" class="form-control" id="type" name="type" placeholder="Enter type">
        @if ($errors->has('type'))
          <span class="text-danger">{{ $errors->first('type') }}</span>
        @endif
        @if ($errors->has('type'))
          <span class="text-danger">{{ $errors->first('type') }}</span>
        @endif
      </div>
      <div class="form-group">
        <label for="content">content</label>
        <textarea id="content" class="form-control" name="content" placeholder="Contenue" ></textarea>
        @if ($errors->has('content'))
          <span class="text-danger">{{ $errors->first('content') }}</span>
        @endif
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>
@endsection