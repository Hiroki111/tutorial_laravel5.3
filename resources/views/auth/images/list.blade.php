@extends('auth.master')
@section('title', 'Image List')

@section('content')
<h3>Image List</h3>

<form action="/admin/images" method="POST" enctype="multipart/form-data">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<input type="file" name="image" accept="image/*" required>
	<span>Title</span><input type="text" name="title"><br>
	<input type="submit" value="Upload Image" required>
</form>

@if ( session()->has('message') )
<span style="color:red;margin-left:2em; font-size: 10pt">{{ session()->get('message') }}</span>
@endif

<div id="imageDivContainer">
	@if(!empty($images))
	@foreach($images as $image)
	<div id="image_{{$image->id}}" class="imageDiv" style="width:300px; height:300px; float: left;">
		<img src="/image/{{$image->filePath}}" 
		style="max-width:290px; max-height:250px;"/>
		<p>{{$image->title}}</p>
		<input type="button" value="Delete" onclick="deleteImage('{{$image->title}}', '{{$image->id}}')"
			></input>
		</div>
		@endforeach
		@endif
</div>

	@endsection
