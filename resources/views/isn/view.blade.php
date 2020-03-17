@extends('layouts.app', ['styles' => ['isn/global'], 'noHeader' => true])

@section('title', 'Devlog')
@section('content')
<div class="branding col-sm-4">
    <h1>{{$project->name}}</h1>
    <span>{{$project->students}}</span>
    <a href="{{route('isn.global')}}"><div class="btn btn-home">Back to home</div></a>
</div>
<div class="articles-content col-sm-8 offset-sm-4">
    @foreach($articles as $article)
    <div class="article" data-article-id="{{ $article->id }}">
      <div class="article-header">
        <h3>{{$article->name}}   <span class="name">{{$article->website_name}}</span></h3>
        <span class="type">{{$article->type}}</span>
        <span class="version">{{$article->version}}</span>
        <p class="date">published on {{$article->date}}</p>
      </div>
      <div class="article-body">
        <p>{{$article->content}}</p>
      </div>
    </div>
    @endforeach
</div>
@endsection