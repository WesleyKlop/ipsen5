<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Eloquent\Proposition;
use Faker\Generator as Faker;

$factory->define(Proposition::class, function (Faker $faker) {
    return [
        'id' => $faker->uuid,
        'proposition' => $faker->realText(),
    ];
});
