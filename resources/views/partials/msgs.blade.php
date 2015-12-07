@if (Session::has('onetime'))
<?php
	$msgs = Session::get('onetime');
	print_r($msgs);
?>
<div class="sitemsgs">
	@foreach($msgs as $msgtype=>$msg)
		<p class="{{ $msgtype }}">{{ $msg }}</p>
	@endforeach
</div>
<script type="text/javascript">
	setTimeout(sitemsgs, 2000);
</script>
@endif