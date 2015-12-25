<?php

namespace App\Http\Controllers\Civil;

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

class ArticleController extends BaseController
{
    public function indexAction()
    {
       $art_id = (int) Input::get('id', 0);

        if($art_id)
            $article = Article::find($art_id);
        else
            $article = Article::take(1)->skip(0);

        $currarticle = $article->join('article_contents','article_contents.article_id','=','articles.id')->get(['articles.*','article_contents.title','article_contents.content'])->first()->toArray(); 
\Mesa::prr($currarticle,55);
        $topicarr = Menu::find($currarticle['menu_id'])->topics()->orderBy('level','ASC')->orderBy('title','ASC')->get()->toArray();
        $topics = $this->clubarr($topicarr);

        $allmenus = Menu::orderBy('level','ASC')->orderBy('title','ASC')->get()->toArray();
        $menus = $this->clubarr($allmenus); 

        $viewarr = array(
            'article' => $currarticle,
            'topics' => $topics,
            'menus' => $menus
        );

        return view('civil.article.index')->with($viewarr);
    }
}