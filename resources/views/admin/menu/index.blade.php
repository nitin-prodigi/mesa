@extends('layout.two')
@section('left')
	 @include('partials.admin.menus')
@stop

@section('content')
<div class="top frame">
	<a class="button" href="#">Save Position</a>
</div>
<ul>
<ul class="width_listing" id="menu_listing">
@foreach ($menus as $topmenu)
	<li id="{{ $topmenu['slug'].'_'.$topmenu['level'].'_'.$topmenu['id'].'_'.$topmenu['parent'] }}">
		<span>{{ $topmenu['title'] }}</span>
		<span class="actions">
			<a href="javascript:void(0)" rel="add" title="Add new menu">add</a>
			<a href="javascript:void(0)" rel="edit" title="Edit name">edit</a>
		</span>
		@if(isset($topmenu['child']))
			<ul>
			@foreach ($topmenu['child'] as $firstmenu)
				<li id="{{ $firstmenu['slug'].'_'.$firstmenu['level'].'_'.$firstmenu['id'].'_'.$firstmenu['parent'] }}">
					<span><a href="{{ url('/admin/topic/' . $firstmenu['slug']) }}">{{ $firstmenu['title'] }}</a></span>
					<span class="actions">
						<a href="javascript:void(0)" rel="add" title="Add new menu">add</a>
						<a href="javascript:void(0)" rel="edit" title="Edit name">edit</a>
						<a href="javascript:void(0)" rel="delete" title="Edit menu">delete</a>
					</span>
					@if(isset($firstmenu['child']))
						<ul>
							@foreach ($firstmenu['child'] as $secondmenu)
								<li id="{{ $secondmenu['slug'].'_'.$secondmenu['level'].'_'.$secondmenu['id'].'_'.$secondmenu['parent'] }}">
									<span>{{ $secondmenu['title'] }}</span>
									<span class="actions">
										<a href="javascript:void(0)" rel="edit" title="Edit name">edit</a>
										<a href="javascript:void(0)" rel="delete" title="Edit menu">delete</a>
									</span>
								</li>
							@endforeach
						</ul>
					@endif
				</li>
			@endforeach
			</ul>
		@endif
	</li>

@endforeach

</ul>
<div class="bottom frame">
	
</div>
@stop


@section('popupcontent')
	<div class="popup add">
		<form>
			<input type="text" name="addmenu" class="addmenu" />
			<a href="javascript:void(0)">Add</a>
		</form>
	</div>

	<div class="popup edit">
		<form>
			<input type="text" name="editmenu" class="editmenu" />
			<a href="javascript:void(0)">Edit</a>
		</form>
	</div>

	<div class="popup delete">
			<p>Are you sure you want to delete</p>
			<a href="javascript:void(0)">Yes</a>
	</div>
@stop