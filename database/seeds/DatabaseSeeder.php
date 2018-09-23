<?php

use Illuminate\Database\Seeder;
use App\User;

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
        for ($i=0; $i < 7500; $i++) { 
        	$user = new User();
        	$user->name = str_random(3).' '.str_random(3).' '.str_random(3);
        	$user->email = str_random(3).' '.str_random(3).' '.str_random(3).'@gmail.com';
        	$user->email_verified_at = now();
        	$user->password = bcrypt('123456');
        	$user->remember_token = str_random(10);
	    	$user->save();
	    }
    }
}
