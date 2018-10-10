<?php

use Faker\Generator as Faker;
use App\User;
use App\Article;

$factory->define(Article::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'body' => $faker->paragraph(2),
        'user_id' => factory(User::class)->create()->id,
    ];
});
