@extends('layout.two')
@section('left')
	 @include('partials.admin.menus')
	 @include('partials.admin.menulist')
@stop

@section('content')
<div class="top frame">
	<div class="left">
		<h3>{{ $pagetitle }}</h3>
	</div>
	<div class="right">
		<input type="button" class="add" value=" Add "/>
		<input type="hidden" name="pageslug" id="pageslug" value="{{ $pageslug }}" />		
	</div>
</div>

@include('partials.admin.topics', array('topics' => $topics,'currmenu' => $currmenu))
<div class="bottom frame">
	
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