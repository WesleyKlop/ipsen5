<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Eloquent\User;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {
    return [
        'id' => $faker->uuid,
        'created_at' => Carbon::now(),
    ];
});
