<?php

use App\Eloquent\SurveyCode;
use Illuminate\Database\Seeder;

class SurveyCodeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(SurveyCode::class, 5)->create();
    }
}
