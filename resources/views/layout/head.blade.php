  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Mesa - {{ $pagetitle or '' }}</title>
  <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
  <meta name="csrf-token" content="{{ csrf_token() }}" />

  {!! Html::style('css/reset.css') !!}
  {!! Html::style('css/jquery.fancybox.css') !!}

  {!! Html::style('css/styles.css') !!}


  {!! Html::script('js/jquery-2.1.4.min.js') !!}
  {!! Html::script('js/superfish.js') !!}
  {!! Html::script('js/jquery.fancybox.js') !!}

  {!! Html::script('js/custom.js') !!}
  
  @yield('heead_append','')