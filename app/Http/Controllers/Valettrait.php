<?php

namespace App\Http\Controllers;

use App\Menu;

trait Valettrait {
 
  // sort the array for parent,child and level
  public function clubarr($ass_arr, $lev = null)
  {
    if(empty($ass_arr))
      return $ass_arr;
    
    // sort array as per its level
    $reparr = [];
    foreach ($ass_arr as $sing_arr) {
      $reparr[$sing_arr['level']][$sing_arr['id']] = $sing_arr;
    }

    if(!is_null($lev)){
      $reparr = array_slice($reparr,0,$lev);
    }

  $levelarr = array_reverse($reparr, true);
   //\Mesa::prr($levelarr);

  while(sizeof($levelarr) > 1){
    $parkey = current(array_keys($levelarr)) - 1;
    $levelarr = array_reverse($levelarr,true);
    $toparr = array_pop($levelarr);
    $levelarr = array_reverse($levelarr,true);

    foreach ($toparr as $key => $value) {
      $levelarr[$parkey][$value['parent']]['child'][] = $value;
    }
    
  }

  $mortarr = array_shift($levelarr);
 // \Mesa::prr($mortarr, 88);
  return $mortarr;
  }

  protected function menu_fmt($menu_arr)
  {
  	exit('olaaaa');
  }
 
}