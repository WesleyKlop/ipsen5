<?php

use App\Proposition;
use App\Survey;
use Illuminate\Database\Seeder;

class SurveyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Survey::class, 5)->create()->each(function (Survey $survey) {
            $survey->propositions()->saveMany(factory(Proposition::class, 8)->make());
        });
    }
}
