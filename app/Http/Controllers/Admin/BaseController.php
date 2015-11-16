<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Controllers\Valettrait;

class BaseController extends Controller
{
	use Valettrait;
    public function __construct()
    {
    	 \View::share ( 'namespace', 'admin');
    }

}
