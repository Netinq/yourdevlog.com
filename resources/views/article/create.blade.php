@extends('layouts.app', ['styles' => ['articles/create'], 'scripts' => ['articles/create']])

@section('title', 'Create an article')
@section('content')
<div class="form col-md-8 col-lg-6 row">
  <div class="form-container col-10 offset-1 col-sm-8 offset-sm-2">
    <h1>publish an article</h1>
    <form method="POST" action="{{ route('articles.store') }}">
      @csrf
      <div class="form-group">
        <label for="name">Name</label>
        <input type="name" class="form-control @if($errors->has('name')) is-invalid @endif" id="name" name="name" placeholder="Summer update 📢" value="{{ old('name') }}">
        @if ($errors->has('name'))
          <span class="text-danger">{{ $errors->first('name') }}</span>
        @endif
      </div>
      <div class="form-group">
        <label for="website">select website</label>
        <select class="form-control @if($errors->has('website_id')) is-invalid @endif" id="website" name="website_id">
          @foreach($websites as $website)
            <option 
            {{ (collect(old('website_id'))->contains($website->id))
            || ($website->select == true) ? 'selected':'' }} value="{{ $website->id }}" data-website-id="{{ $website->id }}">
              {{ $website->name }} | {{ $website->url }}
            </option>
          @endforeach
          @foreach($websites_col as $website)
            <option {{ (collect(old('website_id'))->contains($website->id))
              || ($website->select == true) ? 'selected':'' }} value="{{ $website->id }}" data-website-id="{{ $website->id }}">
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
        <input type="type" class="form-control @if($errors->has('type')) is-invalid @endif" id="type" name="type" placeholder="Release" value="{{ old('type') }}">
        @if ($errors->has('type'))
          <span class="text-danger">{{ $errors->first('type') }}</span>
        @endif
      </div>
      <div class="form-group">
        <label for="version">Version</label>
        <input style="width: 45%;" type="version" class="form-control @if($errors->has('version')) is-invalid @endif" id="version" name="version" placeholder="beta-0.1.0" value="{{ old('version') }}">
        @if ($errors->has('version'))
          <span class="text-danger">{{ $errors->first('version') }}</span>
        @endif
      </div>
      <div class="form-group">
        <label for="content">content</label>
        <textarea id="content" class="form-control @if($errors->has('content')) is-invalid @endif" name="content" placeholder="- New Design
- We are introduce a new search engine" >{{ old('content') }}</textarea>
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
<div class="exemple col-md-6 d-none d-sm-block">
  <div class="articles-content">
    <div class="article">
      <div class="article-header">
        <h3 id="exemple_name">name   <span id="exemple_website" class="name">website</span></h3>
        <span class="type" id="exemple_type">type</span>
        <span class="version" id="exemple_version">version</span>
        <p class="date" id="exemple_date">published on date</p>
      </div>
      <div class="article-body">
        <p id="exemple_content">content</p>
      </div>
    </div>
  </div>
</div>
@endsection