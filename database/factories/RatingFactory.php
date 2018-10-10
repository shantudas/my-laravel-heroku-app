<?php

use Faker\Generator as Faker;
use App\Rating;
use App\User;
use App\Article;

$factory->define(Rating::class, function (Faker $faker) {
    return [
        'rating'=>$faker->numberBetween(1,5),
        'user_id' => factory(User::class)->create()->id,
        'article_id' => factory(Article::class)->create()->id,
    ];
});
