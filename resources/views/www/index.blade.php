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
    <div class="top">
        Laravel Tutorial
    </div>
    <div class="left">
        <ul>
            <li><a class="active" href="/">Home</a></li>
            @foreach($entries as $entry)
            <li><a href="{{$entry->url}}">{{$entry->title}}</a></li>
            @endforeach
        </ul>
    </div>
    <div class="main">
        {!!$currentEntry->content!!}
        
    </div>
</body>
</html>
