@extends('auth.master')

@section('content')
<div>entries</div>

<form action="/admin/entries" method="POST" enctype="multipart/form-data">
    {!! csrf_field() !!}
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    <input type="hidden" name="action" value="add">
    <ul>
       <li>Title<input type="text" name="title"></li>
       <li>Category<input type="text" name="category"></li>
       <li>Content<textarea rows="8" cols="40"></textarea></li>
       <li></li>
   </ul>
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
