<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use App\Models\Article;
use App\Constants\Status;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    return [
        "name" => $faker->text(8),
        "description" => $faker->text(300),
        "category_id" => Category::inRandomOrder()->first(),
        'image' => $faker->imageUrl()
    ];
});

$factory->state(Article::class, 'active', function(Faker $faker) {
    return [
        'active' => Status::ACTIVE,
    ];
});

$factory->state(Article::class, 'disabled', function(Faker $faker) {
    return [
        'active' => Status::DEACTIVATE,
    ];
});
