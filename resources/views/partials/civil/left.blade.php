<ul>
   <li class="color-bg">
      <h4>Menus</h4>
         <ul>
            @foreach($menus as $topmenu)
               @if($topmenu['slug'] == 'civil')
                  @foreach($topmenu['child'] as $civil)
                     <li @if($menuid == $civil['id']) class="active" <?php if(isset($civil['child'])){ $refrences = $civil['child'];}  ?> @endif>
                        <a href="{{ URL::route('civil', array('controller' => 'menu')).'?id='. $civil['id'] }}">{{ $civil['title'] }}</a>
                     </li>
                  @endforeach
               @endif
            @endforeach
         </ul>
   </li>
   <li class="bg">
      <h4>Related Articles</h4>
      <ul>
         <li class="text">
            <p style="margin: 0;">Aenean nec massa a tortor auctor sodales sed a dolor. Duis vitae lorem sem. Proin at velit vel arcu pretium luctus. 					<a href="#" class="readmore">Read More &raquo;</a></p>
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
   @if(isset($refrences))
      <li>
         <h4>Refrencess</h4>
         <ul>
             @foreach($refrences as $ref)
               <li><a href="{{ URL::route('civil', array('controller' => 'menu','action' => 'reference')).'?id='. $ref['id'] }}" >{{ $ref['title'] }}</a></li>
             @endforeach
         </ul>
      </li>
   @endif
</ul>