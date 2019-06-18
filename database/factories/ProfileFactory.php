<?php

/* @var $factory Factory */

use App\Eloquent\Profile;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Profile::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'party' => $faker->colorName,
        'function' => $faker->creditCardNumber,
        'bio' => $faker->realText(),
        'email' => $faker->email,
    ];
});
