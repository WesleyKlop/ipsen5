<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Eloquent\SurveyCode;
use App\Eloquent\User;
use App\Eloquent\Voter;
use Faker\Generator as Faker;

$factory->define(Voter::class, function (Faker $faker) {
    return [
        'user_id' => factory(User::class)->create()->id,
        'code' => SurveyCode::all()->random()->code,
    ];
});
