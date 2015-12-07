<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Menu;
use Input;

class MenuController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allmenus = Menu::orderBy('level','ASC')->orderBy('title','ASC')->get()->toArray();
        $menus = $this->clubarr($allmenus); 
 //\Mesa::prr($menus);
        return view('admin.menu.index')->withMenus($menus)->withPage('menu');
    }

    public function addMenu()
    {

        $level = (int) Input::get('level');
        $name = Input::get('val');
        $slug = preg_replace("/[^a-zA-Z0-9]/", "", $name);

        $counter = 1;
        while ($slug) {
            $menu = Menu::where('slug', $slug);
            if(!$menu->exists()){
                $mn = new Menu;
                $mn->slug = strtolower($slug);
                $mn->title = ucwords($name );
                $mn->parent = Input::get('id');
                $mn->level = ++$level;
                $mn->save();
                break;
            }else{
                $slug .= '_'.$counter;
            }
        } 
        return 1; 
    }

    public function editMenu()
    {
        $id = (int) Input::get('id');

        $menu = Menu::find($id);
        if($menu->exists()){
            $menu->title = ucwords(Input::get('val'));
            $menu->save();
        }
 
        return 1;
    }

    public function deleteMenu()
    {
        $id = (int) Input::get('id');
        $menu = Menu::where('parent', $id);
        if(!$menu->exists()){
            Menu::destroy($id);
        }
        return 1;
    }    
}
