<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Eloquent\Profile;
use Faker\Generator as Faker;

$factory->define(Profile::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'bio' => $faker->realText(),
    ];
});
