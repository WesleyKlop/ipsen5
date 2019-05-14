<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Eloquent\Candidate;
use App\Eloquent\Survey;
use App\Eloquent\User;
use Faker\Generator as Faker;

$factory->define(Candidate::class, function (Faker $faker) {
    return [
        'user_id' => factory(User::class)->create()->id,
        'survey_id' => Survey::all()->random()->id,
        'url' => $faker->uuid,
    ];
});
