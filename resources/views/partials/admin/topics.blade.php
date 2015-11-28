<ul>
	@foreach($topics as $key=>$topic)
		<li id="topic_{{ $topic['level'] }}_{{ $topic['id'] }}_{{ $topic['parent'] }}">
			<span>{{ $topic['title'] }}</span>
			<span class="actions">
				<a href="javascript:void(0)" rel="add" title="Add new menu">add</a>
				<a href="javascript:void(0)" rel="edit" title="Edit name">edit</a>
				<a href="javascript:void(0)" rel="delete" title="Edit menu">delete</a>
			</span>
			@if(isset($topic['child']))
				@include('partials.admin.topics', array('topics' => $topic['child']))
			@endif
		</li>
	@endforeach
</ul>