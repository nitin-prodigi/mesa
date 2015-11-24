<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Menu;

class TopicController extends BaseController
{
    //
    public function index($topic = 'economics')
    {
        //$topics = $this->topicarr(); 

        $topics = Menu::where('slug',$topic)->first()->topics()->get()->toArray();
 \Mesa::prr($topics);

    }
}