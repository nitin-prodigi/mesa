<ul>
   <li class="color-bg">
      <h4>Menus</h4>
         <ul>
            @foreach($menus as $topmenu)
               @if($topmenu['slug'] == 'coding')
                  @foreach($topmenu['child'] as $coding)
                     <li @if($menuid == $coding['id']) class="active" <?php if(isset($coding['child'])){ $refrences = $coding['child'];}  ?> @endif>
                        <a href="{{ URL::route('coding', array('action' => 'menu')).'?id='. $coding['id'] }}">{{ $coding['title'] }}</a>
                     </li>
                  @endforeach
               @endif
            @endforeach
         </ul>
   </li>
   @if(isset($refrences))
      <li>
         <h4>Refrencess</h4>
         <ul id="references">
             @foreach($refrences as $ref)
               <li>{!! Form::checkbox('reference', $ref['id']) !!}" {{ $ref['title'] }}</a></li>
             @endforeach
         </ul>
         {!! Form::button('Search', array(
            'class' => 'formbutton fr',
         )) !!}
      </li>
   @endif
</ul>
<p>&nbsp;</p>