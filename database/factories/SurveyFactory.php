<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Eloquent\Survey;
use Faker\Generator as Faker;

$factory->define(Survey::class, function (Faker $faker) {
    return [
        'id' => $faker->uuid,
        'name' => $faker->numerify('Survey ##'),
    ];
});
