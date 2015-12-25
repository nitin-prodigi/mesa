@extends('layout.three')

@section('heead_append')
  	{!! Html::script('js/ckeditor/ckeditor.js') !!}
  	{!! Html::script('js/ckeditor/sample.js') !!}

{!! Html::style('js/ckeditor/plugins/codesnippet/lib/highlight/styles/zenburn.css') !!}
{!! Html::script('js/ckeditor/plugins/codesnippet/lib/highlight/highlight.pack.js') !!}
<script>hljs.initHighlightingOnLoad();</script>
@stop

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