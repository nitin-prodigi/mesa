<!doctype html>
<html>
   <head>
      @include('layout.head')
   </head>
   <body class="{{ $page or 'common' }}">
      <div id="container" class="fixed-header">
         <header>
         </header>
         <div id="body">
            <div class="width">
               <aside class="sidebar big-sidebar left-sidebar">
                  @section('left')
                  <ul>
                     <li class="color-bg">
                        <h4>Categories</h4>
                        <ul>
                           <li><a href="index.html">Home Page</a></li>
                           <li>
                              <a href="examples.html">Style Examples</a>
                              <ul>
                                 <li><a href="three-column.html">Three Column</a></li>
                                 <li><a href="one-column.html">One column / no sidebar</a></li>
                                 <li><a href="text.html">Text / left sidebar</a></li>
                              </ul>
                           </li>
                           <li><a href="three-column.html">Three column layout example</a></li>
                           <li><a href="#">Sed aliquam libero ut velit bibendum</a></li>
                           <li><a href="#">Maecenas condimentum velit vitae</a></li>
                        </ul>
                     </li>
                     <li class="bg">
                        <h4>About us</h4>
                        <ul>
                           <li class="text">
                              <p style="margin: 0;">Aenean nec massa a tortor auctor sodales sed a dolor. Duis vitae lorem sem. Proin at velit vel arcu pretium luctus.                <a href="#" class="readmore">Read More &raquo;</a></p>
                           </li>
                        </ul>
                     </li>
                     <li>
                        <h4>Search site</h4>
                        <ul>
                           <li class="text">
                              <form method="get" class="searchform" action="#" >
                                 <p>
                                    <input type="text" size="32" value="" name="s" class="s" />
                                 </p>
                              </form>
                           </li>
                        </ul>
                     </li>
                     <li>
                        <h4>Helpful Links</h4>
                        <ul>
                           <li><a href="http://www.themeforest.net/?ref=spykawg" title="premium templates">Premium HTML web templates from $10</a></li>
                           <li><a href="http://www.dreamhost.com/r.cgi?259541" title="web hosting">Cheap web hosting from Dreamhost</a></li>
                           <li><a href="http://tuxthemes.com" title="Tux Themes">Premium WordPress themes</a></li>
                        </ul>
                     </li>
                  </ul>
                  @show
               </aside>
               
               <section id="content" class="two-column with-left-sidebar">
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
   </body>
</html>