@extends('layout.three')

@section('left')
	 @include('partials.civil.left', array(
	 	'menuid' => $menuid
	 ))
@stop

@section('content')
<article>
<h2>Articles</h2>
@foreach($articles as $article)
	<li>
		<a href="{{ URL::route('civil', array('action' => 'article')).'?id='. $article['id'] }}">{{ $article['title'] }}</a>
	</li>
@endforeach
</article>
@stop

@section('right')
	 @include('partials.civil.right', array(
	 	'topicid' => $topicid
	 ))
@stop