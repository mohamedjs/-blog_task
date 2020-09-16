<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use App\Constants\Status;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        "name" => $faker->text(8),
        'image' => $faker->imageUrl()
    ];
});

$factory->state(Category::class, 'active', function(Faker $faker) {
    return [
        'active' => Status::ACTIVE,
    ];
});

$factory->state(Category::class, 'disabled', function(Faker $faker) {
    return [
        'active' => Status::DEACTIVATE,
    ];
});
