<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Post;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
	$user_id = User::pluck('id');
    return [
    	'title' => $faker->text,
    	'user_id' => $faker->randomElement($user_id),
    	'content' => $faker->paragraph,
    	'status' => $faker->randomElement(['0','1']),
    ];
});
