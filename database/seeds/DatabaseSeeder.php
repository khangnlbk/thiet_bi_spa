<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
	    DB::table('users')->insert([
	        [
	            'email' => 'admin@gmail.com',
	            'password' => bcrypt('123456'),
                'role' => '1',
	        ]
	    ]);
    }
}
