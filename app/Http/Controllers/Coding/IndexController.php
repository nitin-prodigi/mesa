<?php

namespace App\Http\Controllers\Coding;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\BaseController;

use Input;
use Validator;
use Redirect;
use Session;

use App\Menu;
use App\Topic;
use App\Article;
use App\ArticleContent;

class IndexController extends BaseController
{
    public function articleAction()
    {
       $art_id = (int) Input::get('id', 0);

        $article = Article::where('articles.id',$art_id);

        $currarticle = $article->join('article_contents','article_contents.article_id','=','articles.id')->get(['articles.*','article_contents.title','article_contents.content'])->first()->toArray(); 

        $topicarr = Menu::find($currarticle['menu_id'])->topics()->orderBy('level','ASC')->orderBy('title','ASC')->get()->toArray();
        $topics = $this->clubarr($topicarr);

        $allmenus = Menu::orderBy('level','ASC')->orderBy('title','ASC')->get()->toArray();
        $menus = $this->clubarr($allmenus); 

        $viewarr = array(
            'article' => $currarticle,
            'topics' => $topics,
            'menus' => $menus
        );

        \View::share ( 'pagetitle', $currarticle['title']);
        return view('coding.article')->with($viewarr);
    }

    public function menuAction()
    {
        $menu_id = (int) Input::get('id', 0);

        if(!$menu_id){
            $codemenu = Menu::where('slug','=','coding')->first();
            $menu_id = $codemenu->id;
        }

        $allmenus = Menu::orderBy('level','ASC')->orderBy('title','ASC')->get()->toArray();
        $menus = $this->clubarr($allmenus); 

        $topicarr = Menu::find($menu_id)->topics()->orderBy('level','ASC')->orderBy('title','ASC')->get()->toArray();
        $topics = $this->clubarr($topicarr);

        $articles = Menu::find($menu_id)->articles()->join('article_contents','article_contents.article_id','=','articles.id')->get(['articles.*','article_contents.title'])->toArray();

        $viewarr = array(
            'articles' => $articles,
            'menus' => $menus,
            'menuid' => $menu_id,
            'topics' => $topics,
            'topicid' => 0
        );

        \View::share ( 'pagetitle', Menu::find($menu_id)->first()->title);
        return view('coding.menulist')->with($viewarr);
    }

    public function topicAction()
    {
        $topic_id = (int) Input::get('id', 0);

        $currtopic = Topic::find($topic_id);
        if($currtopic->exists()){
            $menu_id = $currtopic->menu_id;

            $topicarr = Menu::find($menu_id)->topics()->orderBy('level','ASC')->orderBy('title','ASC')->get()->toArray();
            $topics = $this->clubarr($topicarr);
            $childtopics = $this->findTopics($topics,$topic_id);

            $allmenus = Menu::orderBy('level','ASC')->orderBy('title','ASC')->get()->toArray();
            $menus = $this->clubarr($allmenus); 

            $articles = Menu::find($menu_id)->articles()->join('article_contents','article_contents.article_id','=','articles.id')->whereIn('articles.topic_id', $childtopics)->get(['articles.*','article_contents.title'])->toArray();

            $viewarr = array(
                'articles' => $articles,
                'menus' => $menus,
                'menuid' => $menu_id,
                'topics' => $topics,
                'topicid' => $topic_id
            );

            \View::share ( 'pagetitle', $currtopic->title);
            return view('coding.menulist')->with($viewarr);
        }
    }
}