<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('users')->insert([
		        'name' => 'Juan Cuero',
		        'email' => 'juan.cuero@unillanos.edu.co',
		        'role' => 1,
		        'email_verified_at' => now(),
		        'password' => '$2y$10$LPdhI9lw8ljDA4F0AFrpUO5kq8K2/RNTgS1kaZilGCV6ltdUyKiiS', // juan12345
		        'remember_token' => Str::random(10),
        ]);
    }
}
