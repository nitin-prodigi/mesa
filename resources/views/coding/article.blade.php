@extends('layout.two')

@section('heead_append')
  	{!! Html::script('js/ckeditor/ckeditor.js') !!}
  	{!! Html::script('js/ckeditor/sample.js') !!}

{!! Html::style('js/ckeditor/plugins/codesnippet/lib/highlight/styles/zenburn.css') !!}
{!! Html::script('js/ckeditor/plugins/codesnippet/lib/highlight/highlight.pack.js') !!}
<script>hljs.initHighlightingOnLoad();</script>
@stop

@section('left')
	 @include('partials.coding.left', array(
	 	'menuid' => $article['menu_id']
	 ))

	 @include('partials.coding.right', array(
	 	'topicid' => $article['topic_id']
	 ))
@stop

@section('content')
<article>
 <h1>{{ $article['title'] }}</h1>
{!! $article['content'] !!}
</article>
@stop
