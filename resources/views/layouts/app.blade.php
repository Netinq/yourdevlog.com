@section('description', '')

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <meta name="keywords" content="cuisine, dev, log">
        <meta name="description" content="@yield('description')">
        <meta name="author" content="Quentin Sar">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="reply-to" content="contact@sarquentin.fr">
        <meta name='subject' content="YourDevlog">
        <meta name='language' content='FR'>
        <meta name='owner' content='Quentin Sar'>
        <meta name='url' content='yourdevlog.com'>
        <meta name='identifier-URL' content='yourdevlog.com'>
        <meta name='target' content='all'>
        <meta name="theme-color" content="#2D3145">

        <link rel='shortcut icon' type='image/ico' href='{{ asset('images/logo.png') }}'>
        <link rel='logo' type='image/png' href='{{ asset('images/logo.png') }}'>

        <meta property="og:title" content="@hasSection('title') {{Config::get('app.name')}} - @yield('title') @else {{Config::get('app.name')}} @endif" />
        <meta property="og:description" content="@yield('description')" />
        <meta property="og:image" content="{{asset('images/meta.png')}}" />
        <meta property="og:site_name" content="@hasSection('title') {{Config::get('app.name')}} - @yield('title') @else {{Config::get('app.name')}} @endif" />
        <meta property="og:type" content="website" />
        <meta property="og:locale" content="fr_FR" />

        <meta name="twitter:card" content="summary" />
        <meta name="twitter:site" content="@Netinq" />
        <meta name="twitter:title" content="@hasSection('title') {{Config::get('app.name')}} - @yield('title') @else {{Config::get('app.name')}} @endif" />
        <meta name="twitter:description" content="@yield('description')" />
        <meta name="twitter:image" content="{{asset('images/meta.png')}}" />

        <title>
            @hasSection('title') {{Config::get('app.name')}} : @yield('title') 
            @else {{Config::get('app.name')}} @endif
        </title>

        <meta http-equiv="content-language" content="fr">

        <!-- STATIC Stylesheet -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/layouts/navbar.css') }}">

        @hasSection('noMaster') @else
        <link rel="stylesheet" type="text/css" href="{{ asset('css/master.css') }}">
        @endif

        <!-- GENERATE Stylesheet -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        @if($styles ?? null)
            @foreach($styles as $style)
            <link rel="stylesheet" type="text/css" 
            href="{{ asset('css/'.$style.'.css') }}">
            @endforeach
        @endif

    </head>
    @if(!isset($noHeader))@include('layouts.navbar')@endif
    <body class="row">
        @yield('content')
    </body>
        
    <script src="{{ asset('js/app.js') }}"></script>
</html>
