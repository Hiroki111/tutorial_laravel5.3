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

<div id="imageDivContainer">
	@if(!empty($images))
	@foreach($images as $image)
	<span class="imageSpan">
		<img src="/image/{{$image->filePath}}" style="width:304px;height:228px;"/>
		<span>{{$image->title}}</span>
	</span>
	@endforeach
	@endif
</div>

@endsection
