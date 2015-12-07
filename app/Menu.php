<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //
    public function topics()
    {
        return $this->hasMany('App\Topic');
    }

    //
    public function articles()
    {
        return $this->hasMany('App\Article');
    }

    // many to many relation for articles
	public function article_relations()
	{
		return $this->belongsToMany('App\Article', 'article_menu_pivot', 'menu_id', 'article_id');
	}
}
