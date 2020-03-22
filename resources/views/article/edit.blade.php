@extends('layouts.app', ['styles' => ['articles/create']])

@section('title', 'Create an article')
@section('content')
<div class="form col-md-8 col-lg-6 row">
  <div class="form-container col-10 offset-1 col-sm-8 offset-sm-2">
    <h1>edit an article</h1>
    <form method="POST" action="{{ route('articles.update', [$article->id]) }}">
      @csrf
      @method('PUT')
      <div class="form-group">
        <label for="name">Name</label>
        <input type="name" class="form-control" id="name" name="name" value="{{$article->name}}">
        @if ($errors->has('name'))
          <span class="text-danger">{{ $errors->first('name') }}</span>
        @endif
      </div>
      <div class="form-group">
        <label for="website">select website</label>
        <select class="form-control" id="website" name="website_id">
          <option value="{{ $website->id }}" data-website-id="{{ $website->id }}">
            {{ $website->name }} | {{ $website->url }}
          </option>
        </select>
        @if ($errors->has('website_id'))
          <span class="text-danger">{{ $errors->first('website_id') }}</span>
        @endif
      </div>
      <div class="form-group">
        <label for="type">Type Select</label>
        <input type="type" class="form-control" id="type" name="type" value="{{$article->type}}">
        @if ($errors->has('type'))
          <span class="text-danger">{{ $errors->first('type') }}</span>
        @endif
      </div>
      <div class="form-group">
        <label for="version">Version</label>
        <input style="width: 45%;" type="version" class="form-control" id="version" name="version" value="{{$article->version}}">
        @if ($errors->has('version'))
          <span class="text-danger">{{ $errors->first('version') }}</span>
        @endif
      </div>
      <div class="form-group">
        <label for="content">content</label>
        <textarea id="content" class="form-control" name="content">{{$article->content}}</textarea>
        @if ($errors->has('content'))
          <span class="text-danger">{{ $errors->first('content') }}</span>
        @endif
      </div>
      <div class="form-group row">
        <div class="col-6 offset-3">
          <button type="submit" class="btn btn-primary">
            modify
          </button>
        </div>
      </div>
    </form>
  </div>
</div>
<div class="exemple col-md-6 d-none d-sm-block">
  <div class="articles-content">
    <div class="article" data-article-id="{{ $article->id }}">
      <div class="article-header">
        <h3>{{$article->name}}   <span class="name">{{$website->name}}</span></h3>
        <span class="type">{{$article->type}}</span>
        <span class="version">{{$article->version}}</span>
        <p class="date">published on {{$article->date}}</p>
      </div>
      <div class="article-body">
        <p>{{$article->content}}</p>
      </div>
    </div>
  </div>
</div>
@endsection