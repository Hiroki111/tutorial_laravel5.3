<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/css/www/www.css" rel="stylesheet">
    <title>Laravel Tutorial</title>

</head>
<body>
    <div class="header">
        Laravel Tutorial
    </div>
    <div class="subheader">
        Free & comprehensive tutorial series for Laravel 5.3
    </div>
    <div class="left">
        <ul>
            @foreach($entries as $entry)
            @if($currentEntry->url == $entry->url)
            <li><a class="active" href="{{$entry->url}}">{{$entry->title}}</a></li>
            @else
            <li><a href="{{$entry->url}}">{{$entry->title}}</a></li>
            @endif
            @endforeach
        </ul>
    </div>
    <div class="main">
        {!!$currentEntry->content!!} 
    </div>

</body>
</html>
