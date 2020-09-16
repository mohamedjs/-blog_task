<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\User;
use App\Models\Area;
use App\Constants\Status;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

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
        'first_name' => $faker->name,
        'last_name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->phoneNumber,
        'image' => '/assets/img/theme/team-1-800x800.jpg',
        'email_verified_at' => now(),
        'password' => 'secret', 
    ];
});

$factory->state(User::class, 'active', function(Faker $faker) {
    return [
        'active' => Status::ACTIVE,
    ];
});

$factory->state(User::class, 'disabled', function(Faker $faker) {
    return [
        'active' => Status::DEACTIVATE,
    ];
});
