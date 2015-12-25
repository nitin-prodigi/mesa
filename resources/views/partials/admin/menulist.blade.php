<ul>
	<li class="color-bg dirstructure">
	<h4>Menu List</h4>
		<ul>
				@foreach ($menus as $menu)
					<li><a href="{{ url('/admin/topic/'.$menu['slug'] ) }}">{{ $menu['title'] }}</a>
					@if(isset($menu['child']))
						<ul>
						@foreach ($menu['child'] as $submenu)
							<li><a href="{{ url('/admin/topic/'.$submenu['slug'] ) }}">{{ $submenu['title'] }}</a></li>
						@endforeach
						</ul>
					@endif
					</li>
				@endforeach
		</ul>
	</li>
</ul>