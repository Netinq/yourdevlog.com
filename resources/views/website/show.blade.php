@extends('layouts.app', ['styles'=> ['websites/show']])

@section('title', $website->name)
@section('content')
@include('layouts.delete')
<div id="add_collaborator" class="add-collaborator">
  <div class="add-box col-10 offset-1 col-sm-8 offset-sm-2 col-md-6 offset-md-3">
    <div class="close-add" onclick="$('#add_collaborator').hide();">x</div>
    <h3>Add collaborator</h3>
    <div id="search-form" class="search-form js-search-form">
      <form class="form-search" action="{{route('collaborators.store')}}" method="post">
        @csrf
        <div class="input-group">
          <select class="form-control col-3 @if($errors->has('website_id')) is-invalid @endif" id="website" name="website_id">
              <option value="{{$website->id}}">
                {{ $website->name }} | {{ $website->url }}
              </option>
          </select>
          <input type="email" class="form-control" placeholder="User e-mail" name="email">
          <div class="input-group-append">
            <button class="btn add" type="submit">add</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
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
@if ( Session::has('error') )
<div class="popup offset-md-1 col-md-11 col-10 offset-2">
  <div class="alert alert-error alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Fermer">
      <span aria-hidden="true">&times;</span>
      <span class="sr-only">Fermer</span>
    </button>
    {{ Session::get('error') }}
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
    @if (count($articles) <= 0)
    <div class="empty">
        <h3>You don't have any article register</h3>
        <h4>Create an article now, and publish it</h4>
        <a href="{{route('articles.createid', $website->id)}}"><div class="btn">create new articles</div></a>
    </div>
    @else
    <div class="empty">
        <a href="{{route('articles.createid', $website->id)}}"><div class="btn">create new articles</div></a>
    </div>
    @endif
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
        <div class="btn article-del" onclick="delete_confirm('{{$article->name}}', '{{ route('articles.destroy', [$article->id]) }}')">delete</div>
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
        @if (isset($website->collaborators))
        <div class="info">
          <h4>Collaborators</h4>
          <div class="coll coll-add" onclick="collaborator_add();"><img src="{{asset('images/icons/plus-orange.svg')}}"></div>
          @foreach($website->collaborators as $collaborator)
          <div class="coll" onclick="delete_confirm('Collaborator: {{$collaborator->name}}', '{{ route('collaborators.destroy', [$collaborator->id, $website->id]) }}')">{{$collaborator->name}}<div class="coll-delete">x</div></div>
          @endforeach
        </div>
        @endif
        <div class="info">
          <a href="{{route('websites.index')}}"><div class="btn website-man">manage</div></a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection