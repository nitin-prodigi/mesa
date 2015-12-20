<ul>
	@foreach($topics as $key=>$topic)
		<li @if($topicid == $topic['id']) class="active" @endif>
			<a href="{{ URL::route('civil', array('action' => 'topic')).'?id='. $topic['id'] }}">{{ $topic['title'] }}</a>
			@if(isset($topic['child']))
				@include('partials.civil.topic', array(
					'topics' => $topic['child'],
					'topicid' => $topicid
				))
			@endif
		</li>
	@endforeach
</ul>