<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Input;
use Validator;
use Redirect;
use Session;

class MediaController extends BaseController
{
    //
    public function __construct()
    {
        parent::__construct();
        \View::share ( 'page', 'media');
        \View::share ( 'pagetitle', 'Media');
    }

    public function index()
    {
        $dirfiles = $this->dirToArray(config('app.media_path'), asset('media'));
        return view('admin.media.index')->with(array(
            'dirs' => array('/var/www/html/mesa.leanis.in/public/media' => $dirfiles),
            'basemedia' => base_path('media'),
            'basepath' => asset('media')
        ));
    }

    public function addMedia()
    {
        $path = Input::get('path');
        $folder = Input::get('fld');
        $folder = preg_replace('/[^\da-z_-]/i', '', $folder);
        echo $folder = $path. DIRECTORY_SEPARATOR . strtolower($folder);

        if(!is_dir($folder)){
            $oldmask = umask(0);
            mkdir($folder, 0775);
            umask($oldmask);
        }
        return 1;
    }

    public function deleteMedia()
    {
        Input::merge(array_map('trim', Input::all()));
        $path = Input::get('path');
        $file = Input::get('nm');

        if(is_dir($path)){
            @unlink($path . DIRECTORY_SEPARATOR . $file);
        }
        return 1;
    } 

    public function rmdirMedia()
    {
        Input::merge(array_map('trim', Input::all()));
        $path = Input::get('path');
        if(is_dir($path)){
            @rmdir($path);  //deleting only if empty
        }
        return 1;
    }

    public function uploadMedia()
    {
        $files = Input::file('images');
        $path = Input::get('path');
        $file_count = count($files);
        $uploadcount = 0;
        if(is_dir($path)){
            foreach($files as $file) {
                $rules = array('file' => 'mimes:png,gif,jpeg,txt,pdf,doc');
                 $validator = Validator::make(array('file'=> $file), $rules);
                  if($validator->passes()){
                    $filename = $file->getClientOriginalName();
                    $filename = date('Ymd_His').'_'.preg_replace('/[^\da-z_-]/i', '', $filename);
                    $upload_success = $file->move($path, $filename);
                    $uploadcount ++;
                  }
            }
            if($uploadcount){
                return Redirect::to('admin/media');
            }else{
                return Redirect::to('admin/media')->withInput()->withErrors($validator);
            }
        }
        exit('hi');
    }
}
