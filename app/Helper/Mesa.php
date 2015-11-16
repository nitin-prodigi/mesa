<?php

namespace App\Helper;

class Mesa {

    public function prr($arr, $exit = null)
    {
        echo '<pre>';
        print_R($arr);
        echo '</pre>';

        if(!is_null($exit))
        	exit;
    }
}