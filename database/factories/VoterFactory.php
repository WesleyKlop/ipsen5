<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Voter;
use Faker\Generator as Faker;

$factory->define(Voter::class, function (Faker $faker) {
    return [
        'id' => $faker->uuid,
        'code' => $faker->numberBetween(1000000, 999999),
        'survey_id' => $faker->uuid,
        'username' => $faker->userName,
    ];
});
