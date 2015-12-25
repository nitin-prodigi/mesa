<ul>
	@foreach($menus as $key=>$menu)
		<li @if($menuid == $menu['id']) class="active" @endif>
			<a href="{{ URL::route('coding', array('action' => 'menu')).'?id='. $menu['id'] }}">{{ $menu['title'] }}</a>
			@if(isset($menu['child']))
				@include('partials.coding.menus', array(
					'menus' => $menu['child'],
					'menuid' => $menuid
				))
			@endif
		</li>
	@endforeach
</ul>