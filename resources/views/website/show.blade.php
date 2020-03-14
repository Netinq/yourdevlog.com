@extends('layouts.app', ['styles'=> ['websites/show']])

@section('title', $website->name)
@section('content')
@if ( Session::has('success') )
<div class="popup offset-md-1 col-md-11 col-10 offset-2">
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Fermer">
      <span aria-hidden="true">&times;</span>
      <span class="sr-only">Fermer</span>
    </button>
    {{ Session::get('success') }}
  </div>
</div>
@endif
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
        <div class="info">
          <a href="{{route('websites.index')}}"><div class="btn website-man">manage</div></a>
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
        <h3>{{$article->name}}   <span class="name">{{$website->name}}</span></h3>
        <span class="type">{{$article->type}}</span>
        <span class="version">{{$article->version}}</span>
        <p class="date">published on {{$article->date}}</p>
      </div>
      <div class="article-body">
        <p>{{$article->content}}</p>
        <a href="{{route('articles.edit', $article->id)}}"><div class="btn article-edit">edit</div></a>
        <a href="{{route('websites.show', $website->id)}}" onclick="event.preventDefault();document.getElementById('website_delete-form').submit();" ><div class="btn article-del" title="WARNING, you will delete the article">delete</div></a>
        <form id="website_delete-form" action="{{ route('articles.destroy', [$article->id]) }}" method="POST">
          @csrf
          @method('DELETE')
        </form>
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
        <div class="info">
          <a href="{{route('websites.index')}}"><div class="btn website-man">manage</div></a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection