@extends('layout.three')

@section('left')
	 @include('partials.coding.left', array(
	 	'menuid' => $menuid
	 ))
@stop

@section('content')
<article>
<h1>Articles</h1>
<ul>
@foreach($articles as $article)
	<li>
		<a href="{{ URL::route('coding', array('action' => 'article')).'?id='. $article['id'] }}">{{ $article['title'] }}</a>
	</li>
@endforeach
</ul>
</article>
@stop

@section('right')
	 @include('partials.coding.right', array(
	 	'topicid' => $topicid
	 ))
@stop