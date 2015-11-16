<?php
/**
 * Created by PhpStorm.
 * User: n0impossible
 * Date: 6/14/15
 * Time: 1:47 PM
 */

namespace App\Helper;
use Illuminate\Support\Facades\Facade;

class MesaFacade extends Facade{
    protected static function getFacadeAccessor() {
    	return 'mesa';
    }
}