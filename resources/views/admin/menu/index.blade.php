@extends('layout.two')
                  @section('left')
                  <ul>
                     <li class="color-bg">
                        <h4>Menus</h4>
                        <ul>
                           <li><a href="{{ url('/article/') }}">Menus</a></li>
                           <li><a href="{{ url('/article/article') }}">Articles</a></li>
                        </ul>
                     </li>
                  </ul>
                  @stop

@section('content')
<ul class="width_listing">
@foreach ($menus as $topmenu)
	<li>
		<span id="{{ $topmenu['slug'].'_'.$topmenu['level'].'_'.$topmenu['id'].'_'.$topmenu['parent'] }}">{{ $topmenu['title'] }}</span>
		<span class="actions">
			<a href="javascript:void(0)" class="add">new</a>
			<a href="javascript:void(0)" class="edit">edit</a>
			<a href="javascript:void(0)" class="delete">delete</a>
		</span>
		@if(isset($topmenu['child']))
			<ul>
			@foreach ($topmenu['child'] as $firstmenu)
				<li>
					<span id="{{ $firstmenu['slug'].'_'.$firstmenu['level'].'_'.$firstmenu['id'].'_'.$firstmenu['parent'] }}">{{ $firstmenu['title'] }}</span>
					<span class="actions">
						<a href="javascript:void(0)" class="add">new</a>
						<a href="javascript:void(0)" class="edit">edit</a>
						<a href="javascript:void(0)" class="delete">delete</a>
					</span>
					@if(isset($firstmenu['child']))
						<ul>
							@foreach ($firstmenu['child'] as $secondmenu)
								<li>
									<span id="{{ $secondmenu['slug'].'_'.$secondmenu['level'].'_'.$secondmenu['id'].'_'.$secondmenu['parent'] }}">{{ $secondmenu['title'] }}</span>
									<span class="actions">
										<a href="javascript:void(0)" class="add">new</a>
										<a href="javascript:void(0)" class="edit">edit</a>
										<a href="javascript:void(0)" class="delete">delete</a>
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
@stop