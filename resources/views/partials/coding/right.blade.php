<ul>
	<li class="color-bg">
		<h4>Topics</h4>
		@include('partials.coding.topic', array(
			'topics' => $topics,
			'topicid' => $topicid
		))
	</li>
	<li>
		<h4>Plan</h4>
		<ul class="newslist">
		   <li>
		      <p><span class="newslist-date">Jul 21</span>
		         Quisque hendrerit lorem sit amet dui viverra dictum. Phasellus imperdiet magna sit amet arcu tristique ultricies ut in dui.
		      </p>
		   </li>
		   <li>
		      <p><span class="newslist-date">May 09</span>
		         Mauris et felis semper, congue dui ac, iaculis ipsum. Fusce non rhoncus risus, quis luctus nisl. Donec vitae velit tincidunt, tincidunt felis eu, suscipit nibh. 
		      </p>
		   </li>
		</ul>
	</li>
</ul>