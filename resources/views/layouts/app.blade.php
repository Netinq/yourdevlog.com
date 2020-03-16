@section('description', 'Create a devlog and manage it. You can register our websites to create a devlog for our comminunty/staff. 
It\'s simple, fast and practice.')

<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Default meta -->
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    
        <meta name='author' content='Quentin Sar, Netinq'>
        <meta name='owner' content='Quentin Sar'>
        <meta name='subject' content="Devlog">
        
        <meta name='identifier-URL' content='yourdevlog.com'>
        <meta name='keywords' content='quentin, sar'>
        <meta name="description" content="@yield('description')">
        <meta name='reply-to' content='contact@sarquentin.fr'>
        
        <meta name='language' content='EN'>
        <meta name='target' content='all'>
        <meta name='theme-color' content='#D65A31'>
      
        <link rel='shortcut icon' type='image/png' href='{{ asset('images/logo.png') }}'>
        <link rel='logo' type='image/png' href='{{ asset('images/logo.png') }}'>
        <link rel="apple-touch-icon" href="{{ asset('images/logo.png') }}" />
    
        <!-- Twitter Card meta -->
        <meta name='twitter:card' content='summary'>
        <meta name="twitter:site" content="@Netinq" />
        <meta name="twitter:title" content="@hasSection('title') {{Config::get('app.name')}} - @yield('title') @else {{Config::get('app.name')}} @endif" />
        <meta name='twitter:url' content='https://yourdevlog.com' />
        <meta name='twitter:domain' content='yourdevlog.com' />
        <meta name="twitter:description" content="@yield('description')" />
        <meta name="twitter:image" content="{{asset('images/meta.png')}}" />
        
        <!-- Open Graph meta -->
        <meta property='og:title' content='@hasSection('title') {{Config::get('app.name')}} - @yield('title') @else {{Config::get('app.name')}} @endif' />
        <meta property="og:description" content="@yield('description')" />
        <meta property="og:image" content="{{asset('images/meta.png')}}" />
        <meta property='og:type' content='website' />
        <meta property='og:url' content='https://yourdevlog.com' />
        <meta property='og:site_name' content='{{Config::get('app.name')}}' />
        <meta property='author' content='Quentin Sar' />
        <meta property='profile:gender' content='male' />
        <meta property="og:locale" content="en_EN" />
    
        <!-- IOS meta -->
        <meta name="apple-mobile-web-app-title" content="{{Config::get('app.name')}}">
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />

        <title>
            @hasSection('title') {{Config::get('app.name')}} : @yield('title') 
            @else {{Config::get('app.name')}} : Create and manage our devlogs @endif
        </title>

        <meta http-equiv="content-language" content="en">

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
    <script src="{{ asset('js/delete.js') }}"></script>
    @if($scripts ?? null)
        @foreach($scripts as $script)
        <script src="{{ asset('js/'.$script.'.js') }}"> </script>
        @endforeach
    @endif
    <script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
      })
    </script>
</html>
