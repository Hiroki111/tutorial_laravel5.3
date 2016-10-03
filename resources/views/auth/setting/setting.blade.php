@extends('auth.master')

@section('title', 'Set The Email Recipient')

@section('content')

<h3>Set contact form recipient</h3>

<form action="/admin/settings/update" method="POST">
	<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
	<input type="hidden" name="_method" value="PUT">
	<input type="hidden" name="action" value="add">

	<div class="control-group">
		<label>Current Recipient</label>
		<input type="text" value="{{$recipient}}" disabled="disabled"/>
	</div>
	<div class="control-group">
		<label>Set New Recipient</label>
		<input type="email" name="recipient" placeholder="Insert email address" required/>
	</div>
	<input type="submit" class="btn btn-primary" value="Save">
</form>

@endsection