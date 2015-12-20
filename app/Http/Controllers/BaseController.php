<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Input;
use App\Http\Controllers\Valettrait;

class BaseController extends Controller
{
	use Valettrait;
	protected $toparr = array();

    public function __construct()
    {

    	 $except = array();
    	 $inputs = Input::all();
    	 foreach ($inputs as $key => $value) {
    	 	if(is_array($value))
    	 		array_push($except, $key);
    	 }
    	 $except = join(',',$except);
    	 Input::merge(array_map('trim', Input::except($except)));
    }


	protected function dirToArray($dir, $base_path, $filter_type) {
	  
	   $result = array();

	   $cdir = scandir($dir);
	   foreach ($cdir as $key => $value)
	   {
	      if (!in_array($value,array(".","..")))
	      {
	         if (is_dir($dir . $value))
	         {
	            $result[$dir . $value] = $this->dirToArray($dir . $value . DIRECTORY_SEPARATOR, $base_path.'/'.$value, $filter_type);
	         }
	         else {
	         	$filters = array(
	         		'1' => array('jpg','jpeg','png','gif','pdf')
	         	);
	         	$ext = pathinfo($value, PATHINFO_EXTENSION);
	         	if(in_array($ext, $filters[$filter_type])){
	         		$result[] = $base_path.'/'.$value;
	         	}
	         }
	      }
	   }
	  
	   return $result;
	}


	protected function findTopics($topics, $topicid)
	{
		foreach ($topics as $childtopic) {
			if($childtopic['id'] == $topicid){
				$this->getTopicIds(array($childtopic));
			} else if(isset($childtopic['child'])){
				$this->findTopics($childtopic['child'], $topicid);
			}
		}
		return $this->toparr;
	}

	protected function getTopicIds($topics)
	{
		foreach ($topics as $topic) {
			array_push($this->toparr, $topic['id']);
			if(isset($topic['child'])){
				$this->getTopicIds($topic['child']);
			}
		}
	}

}
