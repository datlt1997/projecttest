<?php

use Illuminate\Database\Seeder;
use App\Models\User;

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
    			'name' => 'superadmin',
    			'username' => 'superadmin',
    			'address' => '12 quang trung, đn',
    			'role' => '1',
    			'status' => '1',
    			'email' => 'superadmin@gmail.com',
    			'password' => Hash::make('123456'),
    			'avatar' => 'abc',
    		],
    		[
    			'name' => 'admin1',
    			'username' => 'admin1',
    			'address' => '112 quang trung, đn',
    			'role' => '2',
    			'status' => '1',
    			'email' => 'admin1@gmail.com',
    			'password' => Hash::make('123456'),
    			'avatar' => 'abc',
    		],
    		[
    			'name' => 'admin2',
    			'username' => 'admin2',
    			'address' => '132 Liên trung, đn',
    			'role' => '2',
    			'status' => '1',
    			'email' => 'admin2@gmail.com',
    			'password' => Hash::make('123456'),
    			'avatar' => 'abc',
    		]
    	]);
    	factory(User::class, 100)->create();
    }
}
