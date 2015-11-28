<?php

use Illuminate\Database\Seeder;
use App\Topic;

class TopicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('topics')->truncate();
        Eloquent::unguard();
        
 		$topics = [
 			// magento

 			// civil
 			['id' => 1, 'menu_id' => 6, 'title' => 'Post Liberalisation', 'parent' => 0, 'level' => 0],
 				['id' => 2, 'menu_id' => 6, 'title' => 'LPG', 'parent' => 1, 'level' => 1],
                    ['id' => 3, 'menu_id' => 6, 'title' => 'Liberalization', 'parent' => 2, 'level' => 2],
                        ['id' => 4, 'menu_id' => 6, 'title' => 'Budget 1992', 'parent' => 3, 'level' => 3],
                        ['id' => 5, 'menu_id' => 6, 'title' => 'World pressure', 'parent' => 3, 'level' => 3],
                    ['id' => 6, 'menu_id' => 6, 'title' => 'Privatization', 'parent' => 2, 'level' => 2],
                        ['id' => 7, 'menu_id' => 6, 'title' => 'Disinvestment', 'parent' => 6, 'level' => 3],
                    ['id' => 8, 'menu_id' => 6, 'title' => 'Globalization', 'parent' => 2, 'level' => 2],
                ['id' => 9, 'menu_id' => 6, 'title' => 'BRICS', 'parent' => 1, 'level' => 1],

			['id' => 10, 'menu_id' => 6, 'title' => 'Pre Liberalisation', 'parent' => 0, 'level' => 0],
 				['id' => 11, 'menu_id' => 6, 'title' => 'Land reforms', 'parent' => 10, 'level' => 1],

 			['id' => 12, 'menu_id' => 6, 'title' => 'International', 'parent' => 0, 'level' => 0],
 				['id' => 13, 'menu_id' => 6, 'title' => 'Summits', 'parent' => 12, 'level' => 1]
 			
 		];

		foreach($topics as $topic){
		    Topic::create($topic);
		}
    }
}