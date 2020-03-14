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
</body>
<style>
.articles-content
{
  display: flex;
  flex-direction: column;
  align-items: center;
  padding: 15px
}
.articles-content .article
{
  width: calc(100% - 80px);
  padding: 25px;
  padding-left: 40px;
  padding-right: 40px;
  margin-bottom: 25px;
  background-color: #f7f7f7;
  box-shadow: 5px 5px 7px #f1f1f1, 
  -5px -5px 7px #ffffff;
  border-radius: 15px;
}
.articles-content .article .article-header
{
  margin-bottom: 15px;
  padding-bottom: 15px;
  border-bottom: 1px solid #27252427;
}
.articles-content .article .article-header h3
{
  color: #272524;
  font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
  margin: 0;
}
.articles-content .article .article-header .type
{
  background-color: rgba(27, 27, 27, 0.05);
  padding-left: 5px;
  padding-right: 5px;
  border-radius: 5px;
  font-family: 'Courier New', Courier, monospace;
  font-size: 1rem;
}
.articles-content .article .article-header .name
{
  font-size: .9rem;
  font-weight: bold;
  margin-left: 2.5px;
}
</style>