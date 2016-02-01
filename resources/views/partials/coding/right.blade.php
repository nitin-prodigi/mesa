<ul>
	<li class="color-bg">
		<h4>Topics</h4>
		@include('partials.coding.topic', array(
			'topics' => $topics,
			'topicid' => $topicid
		))
	</li>
</ul>