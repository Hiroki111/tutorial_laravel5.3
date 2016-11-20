<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel Tutorial</title>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script src="/js/theme.min.js"></script>  
    <script src="/js/admin/entries.js"></script>
    <script src="/js/admin/images.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Code Highligter-->
    <script src="http://alexgorbatchev.com/pub/sh/current/scripts/shCore.js" type="text/javascript"></script>
    <script src="http://alexgorbatchev.com/pub/sh/current/scripts/shAutoloader.js" type="text/javascript"></script>
    <script src="http://alexgorbatchev.com/pub/sh/current/scripts/shBrushPhp.js" type="text/javascript"></script>
    <script src="http://alexgorbatchev.com/pub/sh/current/scripts/shBrushXml.js" type="text/javascript"></script>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/admin/admin.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine">
    <!-- Code Highligter-->
    <link href="/css/shCore.css" rel="stylesheet" type="text/css" />
    <link href="/css/shThemeDefault.css" rel="stylesheet" type="text/css" />   
    
    <script>
    window.Laravel = <?php echo json_encode([
        'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    
</head>
<body>
    @if (!Auth::guest())
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ url('/admin') }}">Laravel Tutorial - Backend</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Auth::user()->name }} 
                    </a>
                    <li  class="dropdown">
                        <a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </li>
            </ul>
        </div>
    </nav>
    @endif
    <div class="left">
        <ul>
            <li><a href="/admin/entries">Entries</a></li>
            <li><a href="/admin/images">Images</a></li>            
            <li><a href="/admin/settings">Settings</a></li>
        </ul>
    </div>
    <div class="container">
        @if (Auth::guest())
        @yield('content')
        @else
        <div class="main">
            @yield('content')
        </div>
        <div class="clear"></div>
        @endif
    </div>


</body>
</html>
