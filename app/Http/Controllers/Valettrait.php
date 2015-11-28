<?php

namespace App\Http\Controllers;

use App\Menu;

trait Valettrait {
 
 // get menu array
  public function menuarr()
  {
  
  	$menus = Menu::orderBy('level','DESC')->orderBy('title','ASC')->get()->toArray();

  	$menutree = $menutemp = $menutree = array();
  	foreach ($menus as $menu) {
  		$menutemp[$menu['level']][$menu['parent']][] = array_diff_key($menu, array_flip(array('created_at', 'updated_at')));
  	}


  	$last_men = array_shift($menutemp);
   	foreach ($menutemp as $l2 => $p2_arr) {
   		foreach ($p2_arr as $p2_key => $p2_value) {
   			foreach ($p2_value as $p2_child_key => $p2_child_arr) {
   				if(array_key_exists($p2_child_arr['id'], $last_men)){
   					$menutemp[$l2][$p2_key][$p2_child_key]['child'] = $last_men[$p2_child_arr['id']];
   				}
   			}
   		}
   	}

  	$last_men = array_shift($menutemp);
  	$menutree = array_shift($menutemp);
  	$menutree = array_shift($menutree);

  	foreach ($menutree as $key => $top_men) {
  		if(array_key_exists($top_men['id'], $last_men)){
  			$menutree[$key]['child'] = $last_men[$top_men['id']];
  		}
  	}

// \Mesa::prr($menutree);
  	return $menutree;
  }


  // get topic tree
  public function topicarr($topics)
  {

    // sort array as per its level
    $reparr = [];
    foreach ($topics as $topic) {
      $reparr[$topic['level']][$topic['id']] = $topic;
    }

  $levelarr = array_reverse($reparr, true);
 // \Mesa::prr($reparr);

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