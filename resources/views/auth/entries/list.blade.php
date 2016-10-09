@extends('auth.master')
@section('title', 'Entry List')

@section('content')
<div>Entry List</div>

<a href="/admin/entries/create" class="btn btn-sm btn-primary pull-right">Add New Entry</a>


<table cellspacing="0" cellpadding="0" border="0" class="table table-striped">
	<tr>
		<th style="width: 150px;">Title</th>
		<th style="width: 150px;">Category</th>
		<th>Content</th>
		<th></th>
	</tr>
	@foreach($entries as $entry)
	<tr>
		<td>{{$entry->title}}</td>
		<td>{{$entry->category}}</td>
		<td class="entry-container">
			<div>
				{!!$entry->content!!}
			</div>
		</td>
		<td>
			<a class="btn btn-link"  href={{"/admin/entries/".$entry->id."/edit"}}>Edit</a>
			<form method="POST" action="/admin/entries/{{$entry->id}}" onsubmit=" return confirmationForDeletingEntry('{{$entry->title}}')">
				{!! csrf_field() !!}
				<input type="hidden" name="_method" value="DELETE">
				<input type="submit"  class="btn btn-link text-danger" value="Delete">
			</form>
		</td>
	</tr>
	@endforeach
</table>
@endsection
