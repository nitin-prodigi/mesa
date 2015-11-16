<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
 		User::create([
            'name' => 'nitin',
            'email' => 'nit_nayal@rediff.com',
            'password' => bcrypt('nitin'),
        ]);
    }
}
