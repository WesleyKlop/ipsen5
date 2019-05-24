<?php

/* @var $factory Factory */

use App\Eloquent\Admin;
use App\Eloquent\Survey;
use App\Eloquent\SurveyCode;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(SurveyCode::class, function (Faker $faker) {
    $admin = Admin::all()->random();
    return [
        'code' => $faker->numerify('1#####'),
        'user_id' => $admin->user_id,
        'survey_id' => Survey::all()->random()->id,
        'expire' => $faker->dateTimeBetween('now', '+2 weeks'),
    ];
});
