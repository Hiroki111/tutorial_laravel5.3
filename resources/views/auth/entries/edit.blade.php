@extends('auth.master')

@section('content')
@if ( session()->has('message') )
<span style="color:red;margin-left:2em; font-size: 10pt">{{ session()->get('message') }}</span>
@endif

@if(isset($entry))
<h3 style="border-bottom: solid 1px #ddd;">Editing Entry</h3>
@else
<h3 style="border-bottom: solid 1px #ddd;">Add New Entry</h3>
@endif

@if (count($errors) > 0)
<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif

@if(isset($entry))
<form action="/admin/entries/{{$entry->id}}" method="POST" enctype="multipart/form-data">
  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
  <input type="hidden" name="_method" value="PUT">
  <input type="hidden" name="action" value="add">
  @else

  <form action="/admin/entries" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    <input type="hidden" name="action" value="add">
    @endif

    <div class="row">
      <div class="col-sm-9">
        <div class="control-group">
          <ul>
            @if(isset($entry))
            <li>Title<input type="text" name="title" value="{{$entry->title}}"></li>
            <li>Category<input type="text" name="category" value="{{$entry->category}}"></li>
            <li>Content<textarea rows="8" cols="40" name="content">{{$entry->content}}</textarea></li>
            @else
            <li>Title<input type="text" name="title"></li>
            <li>Category<input type="text" name="category"></li>
            <li>Content<textarea rows="8" cols="40" name="content"></textarea></li>
            @endif
          </ul>
          <div class="control-group">
            <input class="submit btn btn-primary pull-right" type="submit" value="Save"/>
            <a class="cancel btn btn-primary pull-right" href="/admin/entries">Cancel</a>
          </div>
        </div>
      </div>
    </div>
  </form>

  <pre class="brush: php">
   &lt;?php

   namespace App\Http\Controllers;

   use App\User;
   use App\Http\Controllers\Controller;

   class UserController extends Controller
   {
   /**
   * Show the profile for the given user.
   *
   * @param  int  $id
   * @return Response
   */
   public function show($id)
   {
   return view('user.profile', ['user' => User::findOrFail($id)]);
 }
}
</pre>

<script type="text/javascript">
SyntaxHighlighter.all();
</script>


@endsection
