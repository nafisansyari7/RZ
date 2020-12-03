<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      \App\User::insert([
          [
            'name'  		    	=> 'Admin Sistem',
            'username'	    	=> 'admin',
            'email' 		    	=> 'admin@mail.com',
            'password'	    	=> bcrypt('password'),
            'role'		        => 'Admin',
            'remember_token'	=> str_random(60),
          ],
          [
            'name'  		    	=> 'Koordinator Prodi',
            'username'	    	=> 'koordinator',
            'email' 		    	=> 'koordinator@mail.com',
            'password'	    	=> bcrypt('koordinatorpassword'),
            'role'			      => 'Koordinator',
            'remember_token'	=> str_random(60),
          ]
      ]);
    }
}
