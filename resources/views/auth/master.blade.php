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

    <!-- Code Highligter-->
    <script src="http://alexgorbatchev.com/pub/sh/current/scripts/shCore.js" type="text/javascript"></script>
    <script src="http://alexgorbatchev.com/pub/sh/current/scripts/shAutoloader.js" type="text/javascript"></script>
    <script src="http://alexgorbatchev.com/pub/sh/current/scripts/shBrushPhp.js" type="text/javascript"></script>
    <script src="http://alexgorbatchev.com/pub/sh/current/scripts/shBrushXml.js" type="text/javascript"></script>
    <script>tinymce.init({ selector:'textarea' });</script>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/admin/admin.css" rel="stylesheet">
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
                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/admin') }}">
                   Laravel Tutorial - Backend
               </a>
           </div>
           <a href="/admin/entries">Entries</a>
           <a href="/admin/settings">Settings</a>
           <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Auth::user()->name }} <span class="caret"></span>
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
    </div>
</nav>
@endif

<div class="container">
    @if (Auth::guest())
    @yield('content')
    @else
    <div class="pageContent">
        @yield('content')
    </div>
    <div class="clear"></div>
    @endif
</div>


</body>
</html>
