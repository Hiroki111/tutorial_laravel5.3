@extends('auth.master')
@section('title', 'Image List')

@section('content')
<h3>Image List</h3>

<div>
	<div id="imageSubmitContainer">
		<form action="/admin/images" method="POST" enctype="multipart/form-data">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<input type="file" name="image" accept="image/*" required>
			<span>Title</span><input type="text" name="title"><br>
			<input type="submit" value="Upload Image" required>
		</form>
	</div>
	<div id="deleteListDiv">
		<h4>Deleting the folloing images</h4>
		<div id="deleteList"></div>
		<form method="POST" action="/admin/images/delete" onsubmit="return confirmationForDeletingImages()">
			{!! csrf_field() !!}
			<div id="imagesToDelete"></div>
			<input type="submit"  class="btn btn-link text-danger" value="Submit Delete">
		</form>
	</div>
</div>

@if ( session()->has('message') )
<span style="color:red;margin-left:2em; font-size: 10pt">{{ session()->get('message') }}</span>
@endif

<div id="imageDivContainer" >
	@if(!empty($images))
	@foreach($images as $image)
	<div id="image_{{$image->id}}" class="imageDiv">
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
