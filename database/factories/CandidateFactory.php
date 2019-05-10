<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Candidate;
use Faker\Generator as Faker;

$factory->define(Candidate::class, function (Faker $faker) {
    return [
        'id' => $faker->uuid,
        'url' => $faker->uuid,
        'survey_id' => $faker->uuid,
        'name' => $faker->name,
        'bio' => $faker->text,
    ];
});
