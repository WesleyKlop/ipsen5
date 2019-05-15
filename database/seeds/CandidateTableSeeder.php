<?php

use App\Eloquent\Answer;
use App\Eloquent\Candidate;
use App\Eloquent\Profile;
use App\Eloquent\Proposition;
use Illuminate\Database\Seeder;

class CandidateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Candidate::class, 10)->create()->each(function (Candidate $candidate) {
            $candidate->profile()->save(factory(Profile::class)->make());
            // Every candidate answers their survey
            $candidate->survey->propositions->each(function (Proposition $proposition) use ($candidate) {
                $candidate->answers()->save(factory(Answer::class)->make([
                    'proposition_id' => $proposition->id,
                    'survey_id' => $candidate->survey->id,
                ]));
            });
        });
    }
}
