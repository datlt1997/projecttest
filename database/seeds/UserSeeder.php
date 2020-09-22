<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        [
        	'name'=>'Super Admin',
        	'email'=>'superadmin@gmail.com',
        	'email_verified_at'=>now(),
        	'password'=>Hash::make('okm12345'),
        	'role'=>'1',
        ],
        [
        	'name'=>'Admin',
        	'email'=>'admin@gmail.com',
        	'email_verified_at'=>now(),
        	'password'=>Hash::make('okm12345'),
        	'role'=>'2',
        ],
        [
        	'name'=>'User',
        	'email'=>'user001@gmail.com',
        	'email_verified_at'=>now(),
        	'password'=>Hash::make('okm12345'),
        	'role'=>'3',

        ]
    ]);
    }
}
