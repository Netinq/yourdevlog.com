@extends('layouts.app')

@section('content')
<div class="container">
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
</div>
@endsection