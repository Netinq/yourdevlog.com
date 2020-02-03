@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{$article->name}}</div>
        <div class="card-body">{{$article->content}}</div>
        <div class="col-6">
          <form action="{{ route('articles.destroy', [$article->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">supprimer</button>
          </form>
        </div>
        <div class="col-6">
        <a href="{{ route('articles.edit', [$article->id]) }}">
          <button class="btn btn-warning">edit</button>
        </a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection