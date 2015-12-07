<!doctype html>
<html>
   <head>
      @include('layout.head')
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
               @include('layout.footer')
               <div class="clear"></div>
            </div>
            <div class="footer-bottom">
               
            </div>
         </footer>
      </div>
      @include('partials.popup')
      @include('partials.msgs')
   </body>
</html>