@extends('layouts.app', ['styles' => ['websites/home']])

@section('title', 'Websites list')
@section('content')
<div class="website offset-2 col-md-10 offset-md-1 col-lg-8 offset-lg-2">
  <table class="table">
    <thead>
      <tr class="start-tr">
        <th scope="col" style="width: 16.66%">{{count($websites)}}</th>
        <th scope="col">Name</th>
        <th scope="col">URL</th>
        <th scope="col">Manage</th>
      </tr>
    </thead>
    <tbody>
      @foreach($websites as $index => $website)
      <tr data-website-id="{{ $website->id }}">
        <th scope="row">{{$index}}</th>
        <td>{{ $website->name }}</td>
        <td>{{ $website->url }}</td>
        <td class="manage">
          <a href="{{route('websites.edit', $website->id)}}"><div class="btn website-edit">edit</div></a>
          <a href="{{route('websites.index')}}" onclick="event.preventDefault();document.getElementById('website_delete-form').submit();" ><div class="btn web-del" title="WARNING, you will delete the website">delete</div></a>
        </td>
        <form id="website_delete-form" action="{{ route('websites.destroy', [$website->id]) }}" method="POST">
          @csrf
          @method('DELETE')
        </form>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection