@extends('layout.two')
@section('left')
	 @include('partials.admin.menus')
@stop

@section('content')
<div class="top frame">
	<div class="left">
		<h3>{{ $pagetitle }}</h3>
	</div>
	<div class="right">
	</div>
	<div class="full">
		{!! Form::open(array('url' => 'admin/article/listing', 'method' => 'get')) !!}
			<select id="menu" name="menu">
				@foreach ($menus as $menu)
					<option disabled>-------{{ $menu['title'] }}-------</option>
					@if(isset($menu['child']))
						@foreach ($menu['child'] as $submenu)
							<option value="{{ $submenu['slug'] }}" @if($selmenu == $submenu['slug']) selected="selected" @endif>{{ $submenu['title'] }}</option>
						@endforeach
					@endif
				@endforeach
			</select>
			<select id="topic" name="topic">
				<option>--choose--</option>
			</select>
			<input type="hidden" name="page" value="1" />
			{!! Form::submit('Search') !!}
		{!! Form::close() !!}
		<input type="hidden" name="topic" id="seltopic" value="{{ $seltopic }}" />
	</div>
</div>
<?php
	$counter = 1;
?>
<div class="grunth">
<table>
	<thead>
		<tr>
			<td>S.No</td>
			<td>Article</td>
			<td>Status</td>
			<td>Action</td>
		</tr>
	</thead>
	<tbody>
		@foreach ($articles as $article)
		<tr id="article_{{ $article['id'] }}">
			<td>{{ $counter++ }}. {!! Form::checkbox('article', $article['id']) !!}</td>
			<td>{{ $article['title'] }}</td>
			<td>{{ $article['status'] ? 'Active':'Deactive' }}</td>
			<td>
				<a href="{{ url('admin/article/create') . '?id='.$article['id'] }}" class="edit">Edit</a>
				<a href="javascript:void(0)" class="status">{{ $article['status'] ? 'Deactivate':'Activate' }}</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
</div>
<div class="bottom frame">
	<div class="left">
		
	</div>
	<div class="right">
		<a class="button" href="{{ url('admin/article/create') }}" rel="add">Add</a>
		<a class="button delete" href="javascript:void(0)">Delete</a>
	</div>
</div>
@stop


@section('popupcontent')
	<div class="popup delete">
			<p>Are you sure you want to delete</p>
			<a href="javascript:void(0)">Yes</a>
	</div>
@stop