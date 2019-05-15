<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Eloquent\Answer;
use App\Eloquent\Survey;
use App\Eloquent\Voter;
use Faker\Generator as Faker;

$factory->define(Answer::class, function (Faker $faker) {
    $survey = Survey::all()->random();
    return [
        'id' => $faker->uuid,
        'survey_id' => $survey->id,
        'proposition_id' => $survey->propositions->random()->id,
        'user_id' => Voter::all()->random()->user_id,
        'answer' => $faker->boolean(),
    ];
});
