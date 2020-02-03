@section('content')
@foreach($articles as $article)
  <div class="card"  data-article-id="{{ $article->id }}">
  <div class="card-header">{{$article->name}}</div>
    <div class="card-body" style="white-space: pre-wrap">{{$article->content}}</div>
    <a href="{{ route('articles.show', $article->id) }}"><button class="btn btn-primary">Show</button></a>
  </div>
@endforeach
@endsection