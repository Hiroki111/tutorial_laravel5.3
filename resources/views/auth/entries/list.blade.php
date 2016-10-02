@extends('auth.master')
@section('title', 'Entry List')

@section('content')
<div>Entry List</div>

<a href="/admin/entries/create" class="btn btn-sm btn-primary pull-right">Add New Entry</a>


<table>
	<tr>
		<th>Title</th>
		<th>Category</th>
		<th>Content</th>
	</tr>
	@foreach($entries as $entry)
	<tr>
		<td>{{$entry->title}}</td>
		<td>{{$entry->category}}</td>
		<td>{!!$entry->content!!}</td>
	</tr>
	@endforeach
</table>
@endsection
