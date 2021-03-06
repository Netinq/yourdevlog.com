@extends('layouts.app', ['styles' => ['websites/create']])

@section('title', 'edit a website')
@section('content')
<div class="form col-md-8 col-lg-6 row">
  <div class="form-container col-10 offset-1 col-sm-8 offset-sm-2">
    <h1>edit a website</h1>
    <form method="POST" action="{{ route('websites.update', $website->id) }}">
      @csrf
      @method('PUT')
      <div class="form-group">
        <label for="name">Name</label>
        <input type="name" class="form-control @if($errors->has('name')) is-invalid @endif" id="name" name="name" value="{{$website->name}}">
        @if ($errors->has('name'))
          <span class="text-danger">{{ $errors->first('name') }}</span>
        @endif
      </div>
      <div class="form-group">
        <label for="url">url</label>
        <input class="form-control @if($errors->has('url')) is-invalid @endif" id="url" name="url" placeholder="url" 
        value="{{$website->url}}">
        @if ($errors->has('url'))
        <span class="text-danger">{{ $errors->first('url') }}</span>
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
  <div class="box-web col-md-8 offset-md-2 col-lg-6 offset-lg-3">
    <div class="box-header">
      <h3 id="exemple_name">{{$website->name}}</h3>
      <span id="exemple_url">{{$website->url}}</span>
    </div>
    <div class="box-body">
        <div class="info">
            <h4>0 articles</h4>
            <a href="#"><div class="btn">show</div></a>
        </div>
        <div class="info">
            <h4>data uuid</h4>
            <code class="uuid">44zae45e-4ee4z-5g8z68</code>
        </div>
        <div class="info">
            <h4>iframe</h4>
            <code class="iframe" type="html">&lt;iframe id="inlineFrameExample" 
title="Inline Frame Example"
width="100%"
height="100%"
src="https://yourdevlogs.com/data/example"&gt
</iframe>
            </code>
        </div>
    </div>
</div>
</div>
@endsection