@extends('layouts.app', ['styles' => ['articles/create']])

@section('title', 'Create an article')
@section('content')
<div class="form col-md-8 col-lg-6 row">
  <div class="form-container col-10 offset-1 col-sm-8 offset-sm-2">
    <h1>publish an article</h1>
    <form method="POST" action="{{ route('articles.store') }}">
      @csrf
      <div class="form-group">
        <label for="name">Name</label>
        <input type="name" class="form-control" id="name" name="name" placeholder="Summer update 📢">
        @if ($errors->has('name'))
          <span class="text-danger">{{ $errors->first('name') }}</span>
        @endif
      </div>
      <div class="form-group">
        <label for="website">select website</label>
        <select class="form-control" id="website" name="website_id">
          @foreach($websites as $website)
            <option value="{{ $website->id }}" data-website-id="{{ $website->id }}">
              {{ $website->name }} | {{ $website->url }}
            </option>
          @endforeach
        </select>
        @if ($errors->has('website_id'))
          <span class="text-danger">{{ $errors->first('website_id') }}</span>
        @endif
      </div>
      <div class="form-group">
        <label for="type">Type Select</label>
        <input type="type" class="form-control" id="type" name="type" placeholder="Release">
        @if ($errors->has('type'))
          <span class="text-danger">{{ $errors->first('type') }}</span>
        @endif
      </div>
      <div class="form-group">
        <label for="version">Version</label>
        <input style="width: 45%;" type="version" class="form-control" id="version" name="version" placeholder="beta-0.1.0">
        @if ($errors->has('version'))
          <span class="text-danger">{{ $errors->first('version') }}</span>
        @endif
      </div>
      <div class="form-group">
        <label for="content">content</label>
        <textarea id="content" class="form-control" name="content" placeholder="- New Design
- We are introduce a new search engine" ></textarea>
        @if ($errors->has('content'))
          <span class="text-danger">{{ $errors->first('content') }}</span>
        @endif
      </div>
      <div class="form-group row">
        <div class="col-6 offset-3">
          <button type="submit" class="btn btn-primary">
            publish
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
</div> --}}
@endsection