<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\BaseController;

use Input;
use Validator;
use Redirect;
use Session;

class DefinitionsController extends BaseController
{
    //
    public function __construct()
    {
        parent::__construct();
        \View::share ( 'page', 'definitions');
        \View::share ( 'pagetitle', 'Definitions');
    }

    public function index()
    {
        exit('hi');
    }

}
