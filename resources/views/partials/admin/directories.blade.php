<ul>
	@foreach($dirs as $key=>$childdir)
		@if(is_array($childdir))
		<?php
			$dirarr = explode('/', $key);
			$dirname = array_pop($dirarr);
		?>
		<li><a href="javascript:void(0)" rel="{{ $key }}" >{{ $dirname }}</a>
			@if(!empty($childdir))
				@include('partials.admin.directories', array('parent_path' => $key, 'dirs' => $childdir))
			@endif
		</li>
		@endif
	@endforeach
</ul>