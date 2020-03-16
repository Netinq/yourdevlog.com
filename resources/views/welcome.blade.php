@extends('layouts.app', ['styles' => ['welcome'], 'noHeader' => true])

@section('title', 'Create and manage your devlog with YourDevlog')
@section('content')
<div class="navbar row">
    <div class="items left col-6">
        <div class="item"><a href="{{route('welcome')}}">about</a></div>
        <div class="item"><a href="{{route('devlog')}}">devlog</a></div>
    </div>
    <div class="items right col-6">
        <div class="item"><a href="{{route('register')}}">register</a></div>
        <div class="item"><a href="{{route('login')}}">login</a></div>
    </div>
</div>
<div class="brand">
    <div class="title col-sm-6 offset-sm-3 col-10 offset-1">
        <img alt="Logo" src="{{asset('images/logo.png')}}"/>
        <h1>create and manage your devlog now</h1>
        <h3>yourdevlog</h3>
        <a href="{{route('register')}}">
            <div class="btn join">create my first devlog</div>
        </a>
    </div>
    <div class="article col-md-6 offset-md-3">
        <div class="article-header">
            <h3>☕ New release is up !   <span class="name">YourDevlog</span></h3>
            <span class="type">Release</span>
            <span class="version">v1.0.0</span>
            <p class="date">published on 14/03/20</p>
        </div>
        <div class="article-body">
          <p>A new version of youdevlog is available !
We have working to build a lite full version.</p>
        </div>
    </div>
</div>
<div class="infos col-md-10 offset-md-1 row">
    <div class="info-box">
        <div class="icon">
            <img alt="Book" src="{{asset('images/icons/book-orange.svg')}}"/>
        </div>
        <div class="info-content">
            <h4>WHAT'S A DEVLOG</h4>
            <p>A "devlog" is a log that allows you to list changes made to your program so that users or staff of your team can be informed of the latest changes. It also allows you to view changes after an update or maintenance.
                It is a handy tool that allows you to communicate with your community and keep them informed of the latest developments.</p>
        </div>
    </div>
    <div class="info-box">
        <div class="icon">
            <img alt="Book" src="{{asset('images/icons/book-orange.svg')}}"/>
        </div>
        <div class="info-content">
            <h4>ARTICLES</h4>
            <p>With our platform you can create and manage articles related to your different sites.
                You can then integrate these articles into your site via an iframe to include in the code of your web pages.
                It is a practical tool to simplify your projects and the management of the devlog.</p>
        </div>
    </div>
    <div class="info-box">
        <div class="icon">
            <img alt="Book" src="{{asset('images/icons/book-orange.svg')}}"/>
        </div>
        <div class="info-content">
            <h4>CUSTOMIZE</h4>
            <p>You can customize your devlogs for better integration with your website. Dark theme or light theme, main color and secondary you can change everything.</p>
        </div>
    </div>
    <div class="info-box">
        <div class="icon">
            <img alt="Book" src="{{asset('images/icons/book-orange.svg')}}"/>
        </div>
        <div class="info-content">
            <h4>JOIN OUR COMMUNITY</h4>
            <p>Reach our dozens of users and you also choose simplicity and speed with yourdevlog</p>
        </div>
    </div>
</div>
<div class="footer">
    <p>yourdevlog 2020 &copy copyright</p>
    <div class="info">
      <div class="box social">
        <a target="_blank" href="https://discord.gg/5G4TAp8"
        data-toggle="tooltip" 
        data-placement="auto" 
        data-container="body"
        title="discord">
          <img src="{{asset('images/icons/discord.svg')}}" alt="Discord">
        </a>
        <a target="_blank" href="https://twitter.com/YourDevlogOff"
        data-toggle="tooltip" 
        data-placement="auto" 
        data-container="body"
        title="twitter">
          <img src="{{asset('images/icons/twitter.svg')}}" alt="Twitter">
        </a>
        <a target="_blank" href="https://www.instagram.com/yourdevlog/"
        data-toggle="tooltip" 
        data-placement="auto" 
        data-container="body"
        title="instagram">
          <img src="{{asset('images/icons/instagram.svg')}}" alt="Instagram">
        </a>
        <a href="https://yourdevlog.com/devlog" 
        data-toggle="tooltip" 
        data-placement="auto" 
        data-container="body"
        title="devlog">
          <img src="{{asset('images/icons/book.svg')}}" alt="Book">
        </a>
      </div>
    </div>
</div>
@endsection
