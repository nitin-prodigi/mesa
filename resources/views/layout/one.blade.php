<!doctype html>
<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <title>Mesa's site</title>
      {!! Html::style('css/reset.css') !!}
      {!! Html::style('css/styles.css') !!}
      {!! Html::style('css/nt-awesome.min.css') !!}
      {!! Html::script('js/jquery.js') !!}
      {!! Html::script('js/superfish.js') !!}
      {!! Html::script('js/custom.js') !!}
      <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
   </head>
   <body class="{{ $page or 'common' }}">
      <div id="container">
         <header>
         </header>
         <div id="body">
            <div class="width">
               <section id="content" class="one-column">
               	@yield('content')
               </section>
               <div class="clear"></div>
            </div>
         </div>
         <footer>
            <div class="footer-content width">
               <ul>
                  <li>
                     <h4>Proin accumsan</h4>
                  </li>
                  <li><a href="#">Rutrum nulla a ultrices</a></li>
                  <li><a href="#">Blandit elementum</a></li>
                  <li><a href="#">Proin placerat accumsan</a></li>
                  <li><a href="#">Morbi hendrerit libero </a></li>
                  <li><a href="#">Curabitur sit amet tellus</a></li>
               </ul>
               <ul>
                  <li>
                     <h4>Condimentum</h4>
                  </li>
                  <li><a href="#">Curabitur sit amet tellus</a></li>
                  <li><a href="#">Morbi hendrerit libero </a></li>
                  <li><a href="#">Proin placerat accumsan</a></li>
                  <li><a href="#">Rutrum nulla a ultrices</a></li>
                  <li><a href="#">Cras dictum</a></li>
               </ul>
               <ul>
                  <li>
                     <h4>Suspendisse</h4>
                  </li>
                  <li><a href="#">Morbi hendrerit libero </a></li>
                  <li><a href="#">Proin placerat accumsan</a></li>
                  <li><a href="#">Rutrum nulla a ultrices</a></li>
                  <li><a href="#">Curabitur sit amet tellus</a></li>
                  <li><a href="#">Donec in ligula nisl.</a></li>
               </ul>
               <ul class="endfooter">
                  <li>
                     <h4>Suspendisse</h4>
                  </li>
                  <li>
                     Integer mattis blandit turpis, quis rutrum est. Maecenas quis arcu vel felis lobortis iaculis fringilla at ligula. Nunc dignissim porttitor dolor eget porta. <br /><br />
                     <div class="social-icons">
                        <a href="#"><i class="fa fa-facebook fa-2x"></i></a>
                        <a href="#"><i class="fa fa-twitter fa-2x"></i></a>
                        <a href="#"><i class="fa fa-youtube fa-2x"></i></a>
                        <a href="#"><i class="fa fa-instagram fa-2x"></i></a>
                     </div>
                  </li>
               </ul>
               <div class="clear"></div>
            </div>
            <div class="footer-bottom">
               
            </div>
         </footer>
      </div>
      @include('partials.popup')
   </body>
</html>