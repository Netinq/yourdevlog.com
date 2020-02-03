<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  </head>
<body>
  <div id="app">
    @foreach($articles as $article)
      <div class="card"  data-article-id="{{ $article->id }}">
      <div class="card-header">{{$article->name}}</div>
        <div class="card-body" style="white-space: pre-wrap">{{$article->content}}</div>
      </div>
    @endforeach
  </div>
</body>