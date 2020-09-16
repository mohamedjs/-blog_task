<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Article;
use App\Models\Comment;
use App\Constants\Status;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        "name" => $faker->text(8),
        "email" => $faker->unique()->safeEmail,
        "article_id" => Article::inRandomOrder()->first(),
        'comment' => $faker->text(40)
    ];
});

$factory->state(Comment::class, 'active', function(Faker $faker) {
    return [
        'active' => Status::ACTIVE,
    ];
});

$factory->state(Comment::class, 'disabled', function(Faker $faker) {
    return [
        'active' => Status::DEACTIVATE,
    ];
});
