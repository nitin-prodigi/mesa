@extends('layout.three')

@section('left')
	 @include('partials.civil.left', array(
	 	'menuid' => $article['menu_id']
	 ))
@stop

@section('content')
<article>
 <h2>{{ $article['title'] }}</h2>
{!! $article['content'] !!}
</article>
@stop

@section('right')
	 @include('partials.civil.right', array(
	 	'topicid' => $article['topic_id']
	 ))
@stop