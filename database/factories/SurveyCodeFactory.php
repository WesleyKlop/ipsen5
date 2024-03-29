<?php

/* @var $factory Factory */

use App\Eloquent\Admin;
use App\Eloquent\Survey;
use App\Eloquent\SurveyCode;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Carbon;

$factory->define(SurveyCode::class, function (Faker $faker) {
    $admin = Admin::all()->random();
    $date = $faker->dateTimeBetween('-1 week', 'now');
    $endDate = Carbon::instance($date)->add('2 weeks');
    return [
        'code' => $faker->numerify('1#####'),
        'user_id' => $admin->user_id,
        'survey_id' => Survey::all()->random()->id,
        'expire' => $endDate,
        'started_at' => $date,
    ];
});
