<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Eloquent\Answer;
use Faker\Generator as Faker;

$factory->define(Answer::class, function (Faker $faker) {
    return [
        'id' => $faker->uuid,
        'answer' => $faker->boolean(),
    ];
});
