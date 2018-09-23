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
        // factory(User::class, 7500)->create();
        for ($i=0; $i < 1000; $i++) { 
	         DB::table('users')->insert([
	            'name' => str_random(3).' '.str_random(3).' '.str_random(3),
		        'email' => str_random(3).' '.str_random(3).' '.str_random(3).'@gmail.com',
		        'email_verified_at' => now(),
		        'password' => bcrypt('123456'), // secret
		        'remember_token' => str_random(10),
	        ]);
	    }
    }
}
