<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Menu;
use App\Topic;

use App\Article;
use App\ArticleContent;

use Input;
use Request;

class ArticleController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        \View::share ( 'page', 'article');
        \View::share ( 'pagetitle', 'Article');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu = Input::get('menu','economics');
        $topic = Input::get('topic',0);

        $allmenus = Menu::where('level','<',2)->orderBy('level','ASC')->orderBy('title','ASC')->get()->toArray();
        $sorted_menus = $this->clubarr($allmenus); 

        $articles = Menu::where('slug',$menu)->first()->articles();
        if($topic)
            $articles->where('topic_id',$topic);

        $selarticles = $articles->join('article_contents','article_contents.article_id','=','articles.id')->get(['articles.*','article_contents.title'])->toArray();

        return view('admin.article.index')->with(array(
            'menus' => $sorted_menus,
            'selmenu' => $menu,
            'seltopic' => $topic,
            'articles' => $selarticles
        ));
    }

    public function searchArticle()
    {
        $menuslug = Input::get('menu');
        $menutopics = Menu::where('slug',$menuslug)->first()->topics()->orderBy('level','ASC')->orderBy('title','ASC')->get()->toArray();
        $topics = $this->clubarr($menutopics);
        return json_encode($topics);
    }

    public function statusArticle()
    {
        $id = Input::get('id');
        \DB::table('articles')
            ->where('id', $id)
            ->update(['status' => \DB::raw('if(status=1,0,1)')]);
        return 1;
    }

    public function referenceArticle()
    {
        $menuslug = Input::get('menu');
        $coremenu = Menu::where('slug',$menuslug)->first();
        $references = array();
        if($coremenu->exists()){
            $references = Menu::where('parent', $coremenu->id)->orderBy('title','ASC')->get()->toArray();
        }
        return json_encode($references);
    }

    // create article
    public function createArticle()
    {
        $id = Input::get('id',0);
        $menu = Input::get('menu','economics');
        $topic = Input::get('topic',0);
        
        if(Request::isMethod('post')){
            $menuslug = Input::get('menu');
            $coremenu = Menu::where('slug',$menuslug)->first();
            
            if($coremenu->exists()){
                $menu_id = $coremenu->id;
                
                if($id){ // edit

                    \Mesa::prr(Input::all());
                }else{ // add
                    // article
                    $art_obj = new Article();
                    $art_obj->menu_id = $menu_id;
                    $art_obj->topic_id = $topic;
                    $art_obj->save();

                    $art_id = $art_obj->id;

                    // article content
                    $artcontObj =  new ArticleContent();
                    $artcontObj->article_id = $art_id;
                    $artcontObj->title = Input::get('title');
                    $artcontObj->content = Input::get('content');
                    $artcontObj->save();

                    // article menu reference
                    $formarr = Input::get('formarr');
                    $references = $formarr['reference'];
                    $art_obj->menu_relations()->detach();
                    foreach($references as $reference_id) {
                        $art_obj->menu_relations()->attach($reference_id);
                    }
                    return redirect()->to("/admin/article/listing?menu=$menuslug&topic=$topic&page=1")->with('onetime.success', "article ".$art_id." saved");
                }
            }
        }

        // edit
        if($id){

        }else{
        // add

        }

        $allmenus = Menu::where('level','<',2)->orderBy('level','ASC')->orderBy('title','ASC')->get()->toArray();
        $sorted_menus = $this->clubarr($allmenus); 
        return view('admin.article.create')->with(array(
            'id' => $id,
            'menus' => $sorted_menus,
            'selmenu' => $menu,
            'seltopic' => $topic
        ));
    }

    public function deleteArticle()
    {
        $articles = Input::get('formarr',array());
        Articlecontent::whereIn('article_id', $articles)->delete();
        foreach ($articles as $article) {
            Article::find($article)->menu_relations()->detach();
        }
        Article::whereIn('id', $articles)->delete();

        return 1;
    }
}
