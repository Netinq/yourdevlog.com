@extends('layouts.app', ['styles'=> ['websites/show']])

@section('title', $website->name)
@section('content')
<div class="offset-2 col-10 informations d-block d-md-none">
  <div class="website">
    <div class="box-web">
      <div class="box-header">
        <h3>{{$website->name}}</h3>
        <span>{{$website->url}}</span>
      </div>
      <div class="box-body">
        <div class="info">
            <h4>{{count($articles)}} articles</h4>
        </div>
        <div class="info">
            <h4>data uuid</h4>
            <code class="uuid">{{$website->id}}</code>
        </div>
        <div class="info">
          <h4>iframe</h4>
          <code class="iframe" type="html">&lt;iframe id="yourdevlog_iframe" 
title="YourDevlog : {{$website->name}}"
width="100%" height="100%" allowfullscreen=true style="border: none;" 
src="{{ route('data.show', $website->id) }}"&gt
</iframe>
          </code>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="col-md-7 articles">
  <div class="articles-content col-md-10 col-10 offset-2 offset-md-2">
    @foreach($articles as $article)
    <div class="article" data-article-id="{{ $article->id }}">
      <div class="article-header">
        <h3>{{$article->name}}</h3>
        <span class="name">{{$website->name}}</span>
        <span class="type">{{$article->type}}</span>
      </div>
      <div class="article-body">
        <p>{{$article->content}}</p>
      </div>
    </div>
    @endforeach
  </div>
</div>
<div class="col-md-5 offset-2 offset-md-0 informations d-none d-md-block">
  <div class="website">
    <div class="box-web">
      <div class="box-header">
        <h3>{{$website->name}}</h3>
        <span>{{$website->url}}</span>
      </div>
      <div class="box-body">
        <div class="info">
            <h4>{{count($articles)}} articles</h4>
        </div>
        <div class="info">
            <h4>data uuid</h4>
            <code class="uuid">{{$website->id}}</code>
        </div>
        <div class="info">
          <h4>iframe</h4>
          <code class="iframe" type="html">&lt;iframe id="yourdevlog_iframe" 
title="YourDevlog : {{$website->name}}"
width="100%" height="100%" allowfullscreen=true style="border: none;" 
src="{{ route('data.show', $website->id) }}"&gt
</iframe>
          </code>
        </div>
      </div>
    </div>
  </div>
</div>
{{-- <div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{$website->name}}</div>
        <div class="card-body">{{$website->url}}</div>
          <form action="{{ route('websites.destroy', [$website->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">supprimer</button>
          </form>
          <a href="{{ route('websites.edit', [$website->id]) }}">
            <button class="btn btn-warning">edit</button>
          </a>
          <a href="{{ route('articles.create') }}">
            <button class="btn btn-primary">creer</button>
          </a>
          <a href="{{ route('data.show', $website->id) }}">
            <button class="btn btn-primary">data</button>
          </a>
      </div>
      @foreach($articles as $article)
        <div class="card"  data-article-id="{{ $article->id }}">
        <div class="card-header">{{$article->name}}</div>
          <div class="card-body" style="white-space: pre-wrap">{{$article->content}}</div>
          <a href="{{ route('articles.show', $article->id) }}"><button class="btn btn-primary">Show</button></a>
        </div>
      @endforeach
    </div>
  </div>
</div> --}}
@endsection