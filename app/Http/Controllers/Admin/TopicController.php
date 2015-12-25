<?php


namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\BaseController;
use App\Menu;
use App\Topic;
use Input;


class TopicController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        \View::share ( 'page', 'topic');
        \View::share ( 'pagetitle', 'Topics');
    }

    public function index($menu = 'economics')
    { 
        $coremenu = Menu::where('slug',$menu)->first();
        
        $allmenus = Menu::where('level','<',2)->orderBy('level','ASC')->orderBy('title','ASC')->get()->toArray();
        $sorted_menus = $this->clubarr($allmenus); 

        $menutopics = Menu::where('slug',$menu)->first()->topics()->orderBy('level','ASC')->orderBy('title','ASC')->get()->toArray();
 		$topics = $this->clubarr($menutopics);

 		return view('admin.topic.index')->with(array(
 			'pageslug' => $coremenu->slug,
 			'topics' => $topics,
            'menus' => $sorted_menus,
            'currmenu' => $menu
 		));
    }

    public function addTopic()
    {
        Input::merge(array_map('trim', Input::all()));

        $pageslug = Input::get('pageslug');
        $coremenu = Menu::where('slug',$pageslug)->first();
        if($coremenu->exists()){
        	$level = (int) Input::get('level');
        	$parent = Input::get('id');
        	$name = Input::get('val');

            $mn = new Topic;
            $mn->menu_id = $coremenu->id;
            $mn->title = ucwords($name );
            $mn->parent = $parent;
            $mn->level = $level;
            $mn->save();
        }
        return 1; 
    }

    public function editTopic()
    {
        Input::merge(array_map('trim', Input::all()));

        $id = (int) Input::get('id');

        $topic = Topic::find($id);
        if($topic->exists()){
            $topic->title = ucwords(Input::get('val'));
            $topic->save();
        }
 
        return 1;
    }

    public function deleteTopic()
    {
        Input::merge(array_map('trim', Input::all()));

        $id = (int) Input::get('id');
        $topic = Topic::where('parent', $id);
        if(!$topic->exists()){
            Topic::destroy($id);
        }
        return 1;
    } 
}