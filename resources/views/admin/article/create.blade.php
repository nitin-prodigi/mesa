@extends('layout.one')

@section('content')
<div class="top frame">
	<div class="left">
		<h3>{{ $id ? 'Edit' : 'Add' }} Article</h3>
	</div>
	<div class="right">
	</div>
</div>

<div class="grunth">
	{!! Form::open(array('url' => 'admin/article/create')) !!}
	<section>
		<div class="secwrap">
			<span class="gr_left">Menu</span>
			<span class="gr_right">
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
			</span>
		</div>
		<div class="secwrap">
			<span class="gr_left">Topic</span>
			<span class="gr_right">
				<select id="topic" name="topic">
					<option>--choose--</option>
				</select>
			</span>
		</div>
		<div class="secwrap">
			<span class="gr_left">Reference</span>
			<span class="gr_right">
				 <select multiple id="reference" name="formarr[reference][]">
				  <option>--choose--</option>
				</select> 
			</span>
		</div>
		<div class="secwrap">
			<span class="gr_left">Title</span>
			<span class="gr_right">{!! Form::text('title') !!}</span>
		</div>
	</section>
	<section>
			<div class="secwrap">
				<span class="gr_left">Content</span>
				<span class="gr_right"></span>
			</div>
			<div class="secwrap">
				<span>{!! Form::textarea('content'); !!}</span>
			</div>
	</section>
</div>
<div class="bottom frame">
	<div class="left">
		
	</div>
	<div class="right">
		{!! Form::submit('Create',array(
			'class' => 'button'
		)) !!}
	</div>
</div>
	{!! Form::hidden('id',$id) !!}
	{!! Form::close() !!}
	<input type="hidden" name="topic" id="seltopic" value="{{ $seltopic }}" />
@stop


@section('popupcontent')
	<div class="popup add">
	</div>

	<div class="popup delete">
	</div>
@stop