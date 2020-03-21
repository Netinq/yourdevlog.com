@extends('layouts.app', ['styles' => ['websites/home']])

@section('title', 'Websites list')
@section('content')
@include('layouts.delete')
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
          <div onclick="delete_confirm('{{$website->name}}', '{{ route('websites.destroy', ['c8f34c48-5ad1-41a7-96af-2e2f01618488']) }}');" class="btn web-del">delete</div></a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection