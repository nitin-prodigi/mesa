@extends('layout.three')

@section('left')
	 @include('partials.coding.left', array(
	 	'menuid' => $menuid
	 ))
@stop

@section('content')
<article>
<h2>Articles</h2>
@foreach($articles as $article)
	<li>
		<a href="{{ URL::route('coding', array('action' => 'article')).'?id='. $article['id'] }}">{{ $article['title'] }}</a>
	</li>
@endforeach
</article>
@stop

@section('right')
	 @include('partials.coding.right', array(
	 	'topicid' => $topicid
	 ))
@stop