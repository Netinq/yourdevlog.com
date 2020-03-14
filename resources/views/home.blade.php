@extends('layouts.app', ['styles' => ['home']])

@section('title', 'Websites home')
@section('content')
<div class="container col-10 offset-1">
    @if (count($websites) <= 0)
    <div class="empty offset-2">
        <h3>You don't have any website register</h3>
        <h4>To create a devlog, you need to register a website</h4>
        <a href="{{route('websites.create')}}"><div class="btn">Register new website</div></a>
    </div>
    @endif
    @foreach($websites as $website)
    <div class="box-web" data-website-id="{{ $website->id }}">
        <div class="box-header">
          <h3>{{$website->name}}</h3>
          <span>{{$website->url}}</span>
        </div>
        <div class="box-body">
            <div class="info">
                <h4>{{$website->articles}} articles</h4>
                <a href="{{ route('websites.show', $website->id) }}"><div class="btn">show</div></a>
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
  @endforeach
</div>
@endsection
