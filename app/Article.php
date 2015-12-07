<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    protected $fillable = ['menu_id', 'topic_id', 'position', 'status'];

    // belongs to menu
    public function menus()
	{
		return $this->belongsTo('App\Menu');
	}

    // one to one article content
    public function articlecontent()
	{
		return $this->hasOne('App\ArticleContent');
	}

    // many to many relation for references
    public function menu_relations()
    {
    	return $this->belongsToMany('App\Menu', 'article_menu_pivot', 'article_id', 'menu_id');
    }
}
