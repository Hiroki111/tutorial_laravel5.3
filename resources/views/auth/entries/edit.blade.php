@extends('auth.master')

@section('content')
@if ( session()->has('message') )
<span style="color:red;margin-left:2em; font-size: 10pt">{{ session()->get('message') }}</span>
@endif
<div>entries</div>


@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="/admin/entries" method="POST" enctype="multipart/form-data">
  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
  <input type="hidden" name="action" value="add">
  <ul>
   <li>Title<input type="text" name="title"></li>
   <li>Category<input type="text" name="category"></li>
   <li>Content<textarea rows="8" cols="40" name="content"></textarea></li>
 </ul>
 <div class="control-group">
  <input class="submit btn btn-primary pull-right" type="submit" value="Save"/>
  <a class="cancel btn btn-primary pull-right" href="/admin/entries">Cancel</a>
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
