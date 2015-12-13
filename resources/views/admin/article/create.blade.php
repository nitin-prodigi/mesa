@extends('layout.one')

@section('content')
<div class="top frame">
	<div class="left">
		<h3>{{ $id ? 'Edit' : 'Add' }} Article</h3>
	</div>
	<div class="right">
	</div>
</div>


<?php
	$menu_id = isset($populate['article']['menu_id']) ? $populate['article']['menu_id'] : 0;
	$seltopic = isset($populate['article']['topic_id']) ? $populate['article']['topic_id'] : 0;
?>
<script type="text/javascript">
	var refers = '<?php echo json_encode($populate['references']); ?>';
</script>
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
								<option value="{{ $submenu['slug'] }}" @if($menu_id == $submenu['id']) selected="selected" @endif>{{ $submenu['title'] }}</option>
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
			<span class="gr_right">{!! Form::text('title',isset($populate['article']['title']) ? $populate['article']['title'] : '') !!}</span>
		</div>
	</section>
	<section>
			<div class="secwrap">
				<span class="gr_left">Content</span>
				<span class="gr_right"></span>
			</div>
			<div class="secwrap">
				<span>{!! Form::textarea('content',isset($populate['article']['content']) ? $populate['article']['content']: '') !!}</span>
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