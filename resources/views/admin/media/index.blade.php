@extends('layout.two')
@section('left')
	 @include('partials.admin.menus')
	<ul>
		<li class="color-bg dirstructure">
		<h4>Media</h4>
			@include('partials.admin.directories', array('parent_path' => $basemedia, 'dirs' => $dirs))
		</li>
	</ul>
@stop

@section('content')
<?php
	$mediadirs = json_encode($dirs); 
	$dirs = array_pop($dirs);
?>
<script type="text/javascript">
	var mediajson = <?php echo $mediadirs; ?>;
</script>
<div class="top">
	<div class="left">
		<h3>{{ $pagetitle }}</h3>
	</div>
	<div class="right">
		<a class="button" href="javascript:void(0)" rel="add">Add Folder</a>
		<a class="button" href="javascript:void(0)" rel="delete">Delete Folder</a>
	</div>
</div>
<ul class="listing">
</ul>
<div class="bottom">
	{!! Form::open(array('url'=>'admin/media/upload','method'=>'POST', 'files'=>true)) !!}
    	<span class="path">
    		<span>Media</span>
    		{!! Form::text('path', null, ['readonly' => 'readonly', 'size' => '50%']) !!}
    	</span>
    	<br /><br />

    	<span>upload</span>
    	{!! Form::file('images[]', array('multiple'=>true)) !!}
		@if(Session::has('error'))
			<p class="errors">{!! Session::get('error') !!}</p>
		@endif
		{!! Form::submit('Submit', array('class'=>'send-btn')) !!}
		{!! Form::close() !!}
</div>
@stop


@section('popupcontent')
	<div class="popup add">
		<form>
			<input type="text" name="addmedia" class="addmedia" />
			<a href="javascript:void(0)">Add</a>
		</form>
	</div>

	<div class="popup delete">
			<p>Are you sure you want to delete</p>
			<a href="javascript:void(0)">Yes</a>
	</div>
@stop