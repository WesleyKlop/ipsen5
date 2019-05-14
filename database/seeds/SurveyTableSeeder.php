<?php

use App\Eloquent\Survey;
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
        factory(Survey::class, 5)->create();
    }
}
