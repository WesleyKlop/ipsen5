<?php

use App\Eloquent\Answer;
use App\Eloquent\Proposition;
use App\Eloquent\Survey;
use App\Eloquent\Voter;
use Illuminate\Database\Seeder;

class VoterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $surveys = Survey::all();
        factory(Voter::class, 25)->create()->each(function (Voter $voter) use ($surveys) {
            // Every voter answers a random survey
            $survey = $surveys->random();
            $survey->propositions->each(function (Proposition $proposition) use ($survey, $voter) {
                $voter->answers()->save(factory(Answer::class)->make([
                    'proposition_id' => $proposition->id,
                    'survey_id' => $survey->id,
                ]));
            });
        });

    }
}
