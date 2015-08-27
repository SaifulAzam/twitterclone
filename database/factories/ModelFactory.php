<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'role_id' => 2,
        'name' => $faker->name,
        'username' => $faker->unique()->userName,
        'email' => $faker->unique()->email,
        'password' => bcrypt(str_random(10)),
        'avatar'    =>  '/images/cache/large/' . $faker->numberBetween(1, 102) . '.jpg',
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Tweet::class, function (Faker\Generator $faker) {
    return [
        'user_id' => $faker->numberBetween(1, 50),
        'message' => $faker->sentence
    ];
});

$factory->define(App\Message::class, function (Faker\Generator $faker) {
    return [
        'to' => $faker->numberBetween(1, 50),
        'from' => $faker->numberBetween(1, 50),
        'unread' => $faker->numberBetween(0,1),
        'message' => $faker->paragraph
    ];
});


$factory->define(App\Follower::class, function (Faker\Generator $faker) {
    return [
        'user_id' => $faker->numberBetween(1, 50),
        'follower_id' => $faker->numberBetween(1, 50)
    ];
});
