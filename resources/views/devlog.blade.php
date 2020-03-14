@extends('layouts.app', ['styles' => ['devlog'], 'noHeader' => true])

@section('title', 'Devlog')
@section('content')
<div class="branding col-sm-4">
    <img alt="YourDevlog's logo" src="{{asset('images/logo.png')}}">
    <h1>yourdevlog</h1>
    <span>See our devlog</span>
    <a href="{{route('home')}}"><div class="btn btn-home">Back to home</div></a>
</div>
<div class="articles-content col-sm-8">
  <div class="articles-content">
    @foreach($articles as $article)
    <div class="article" data-article-id="{{ $article->id }}">
      <div class="article-header">
        <h3>{{$article->name}}</h3>
        <span class="name">{{$article->website_name}}</span>
        <span class="type">{{$article->type}}</span>
      </div>
      <div class="article-body">
        <p>{{$article->content}}</p>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection

{{-- <iframe id="yourdevlog_iframe" title="YourDevlog : YourDevlog" width="100%" height="100%" allowfullscreen=true style="border: none;" src="http://127.0.0.1:8000/data/31ff85f2-2c06-45fe-b863-a15b26f7979d"> --}}