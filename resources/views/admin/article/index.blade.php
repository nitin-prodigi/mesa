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
<ul>
@foreach ($menus as $topmenu)
	<li>
		{{ $topmenu['title'] }}
		@if(isset($topmenu['child']))
			<ul>
			@foreach ($topmenu['child'] as $firstmenu)
				<li>
					{{ $firstmenu['title'] }}
					@if(isset($firstmenu['child']))
						<ul>
							@foreach ($firstmenu['child'] as $secondmenu)
								<li>{{ $secondmenu['title'] }}</li>
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