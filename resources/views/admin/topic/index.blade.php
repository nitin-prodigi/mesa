@extends('layout.two')
@section('left')
	 @include('partials.admin.menus')
@stop

@section('content')
<div class="top">
<h3>{{ $pagetitle }}</h3>
<input type="hidden" name="pageslug" id="pageslug" value="{{ $pageslug }}" />
</div>

@include('partials.admin.topics', array('topics' => $topics))
<div class="bottom">
	
</div>
@stop


@section('popupcontent')
	<div class="popup add">
		<form>
			<input type="text" name="add" />
			<a href="javascript:void(0)">Add</a>
		</form>
	</div>

	<div class="popup edit">
		<form>
			<input type="text" name="edit" />
			<a href="javascript:void(0)">Edit</a>
		</form>
	</div>

	<div class="popup delete">
			<p>Are you sure you want to delete</p>
			<a href="javascript:void(0)">Yes</a>
	</div>
@stop

<?php
 // \Mesa::prr($topics);
?>