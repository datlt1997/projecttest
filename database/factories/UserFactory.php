<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'address' => $faker->address,
        'role' => $faker->randomElement(['1', '2', '3']),
        'status' => $faker->randomElement(['0', '1']),
        'email_verified_at' => now(),
        'password' => Hash::make('123456'), // password
        'remember_token' => Str::random(10),
        'avatar' => $faker->text,
    ];
});
