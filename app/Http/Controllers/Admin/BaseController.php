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


	protected function dirToArray($dir, $base_path) {
	  
	   $result = array();

	   $cdir = scandir($dir);
	   foreach ($cdir as $key => $value)
	   {
	      if (!in_array($value,array(".","..")))
	      {
	         if (is_dir($dir . $value))
	         {
	            $result[$dir . $value] = $this->dirToArray($dir . $value . DIRECTORY_SEPARATOR, $base_path.'/'.$value);
	         }
	         else
	         {
	            $result[] = $base_path.'/'.$value;
	         }
	      }
	   }
	  
	   return $result;
	} 

}
