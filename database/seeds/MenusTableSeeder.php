<?php

use Illuminate\Database\Seeder;
use App\Menu;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
 		$menus = [
 			// coding
 			['id' => 1, 'slug' => 'coding','title' => 'Coding', 'parent' => 0, 'level' => 0],
	 			['id' => 2, 'slug' => 'magento','title' => 'Magento', 'parent' => 1, 'level' => 1],
	 			['id' => 3, 'slug' => 'git','title' => 'Git', 'parent' => 1, 'level' => 1],
	 			['id' => 4, 'slug' => 'laravel','title' => 'Laravel', 'parent' => 1, 'level' => 1],

 			// civil
 			['id' => 5, 'slug' => 'civil','title' => 'Civil', 'parent' => 0, 'level' => 0],
	 			['id' => 6, 'slug' => 'economics','title' => 'Economics', 'parent' => 5, 'level' => 1],
	 				['id' => 7, 'slug' => 'epw','title' => 'EPW', 'parent' => 6, 'level' => 2],
	 				['id' => 8, 'slug' => 'macroeconomics','title' => 'Macroeconomics XII', 'parent' => 6, 'level' => 2],
	 				['id' => 9, 'slug' => 'class_notes','title' => 'Class Notes', 'parent' => 6, 'level' => 2],
	 			['id' => 10, 'slug' => 'geography','title' => 'Geography', 'parent' => 5, 'level' => 1],
	 			['id' => 11, 'slug' => 'history','title' => 'History', 'parent' => 5, 'level' => 1],
 			
 		];

		foreach($menus as $menu){
		    Menu::create($menu);
		}
    }
}
