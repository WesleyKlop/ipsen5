<?php

use App\Eloquent\Setting;
use App\Eloquent\Survey;
use Illuminate\Database\Seeder;

class BaseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $trialSurvey = Survey::create([
            'id' => Str::uuid(),
            'name' => 'Proef peiling',
        ]);
        $euSurvey = Survey::create([
            'id' => Str::uuid(),
            'name' => 'EU peiling',
        ]);
        $representativesSurvey = Survey::create([
            'id' => Str::uuid(),
            'name' => '2e Kamer peiling',
        ]);
        $feedbackSurvey = Survey::create([
            'id' => Str::uuid(),
            'name' => 'Feedback peiling',
        ]);
        Setting::create([
            'id' => Str::uuid(),
            'name' => 'trial-survey',
            'value' => $trialSurvey->id,
        ]);
        Setting::create([
            'id' => Str::uuid(),
            'name' => 'european-survey',
            'value' => $euSurvey->id,
        ]);
        Setting::create([
            'id' => Str::uuid(),
            'name' => 'country-survey',
            'value' => $representativesSurvey->id,
        ]);
        Setting::create([
            'id' => Str::uuid(),
            'name' => 'feedback-survey',
            'value' => $feedbackSurvey->id,
        ]);
    }
}
