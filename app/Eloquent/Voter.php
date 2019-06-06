<?php

namespace App\Eloquent;

use Exception;
use Storage;

/**
 * Class Voter
 * @package App\Eloquent
 * @property string $code
 * @property string $user_id
 */
class Voter extends AppUser
{
    use AnswersPropositions;

    protected $guard = 'voter';
    protected $fillable = [
        'code',
        'user_id',
    ];

    public function surveyCode()
    {
        return $this->hasOne(SurveyCode::class, 'code', 'code');
    }

    public function answers()
    {
        return $this->hasMany(Answer::class, 'user_id');
    }

    public function survey()
    {
        return $this->hasOneThrough(Survey::class, SurveyCode::class, 'code', 'id', 'code', 'survey_id');
    }

    public function getMatches()
    {
        /*
         * 1. Get a list of all answers of this user.
         * 2. For each candidate of the survey:
         *      2.1. For each answer of the user
         *              2.1.1 Fetch the proposition from the candidate that matches the answer's proposition_id
         *      2.2. Test for a match on the answer
         *      2.3 Count the number of matches
         *      2.4 Return a nice structure containing the number of matches, the match percentage, and the candidate's id
         * 3. Do a descending sort by the number of matches (highest number of matches comes up front)
         * 4 Return the first 5.
         */
        $user_answers = $this->answers;
        $num_propositions = $this->survey->propositions->count();
        return $this
            ->survey
            ->candidates
            ->map(function ($candidate) use ($user_answers, $num_propositions) {
                // fetch all answers of the candidate,
                // so they're in memory,
                // and we don't have to fetch each answer from the db
                $candidate_answers = $candidate->answers->all();

                $number_of_matches = $user_answers
                    ->map(function ($answer) use ($candidate_answers) {
                        return [
                            "voter_answer" => $answer,
                            "candidate_answer" => $candidate_answers[array_search($answer->proposition_id, array_column($candidate_answers, 'proposition_id'))]
                                //$candidate->answers
                                //->where('proposition_id', $answer->proposition_id)
                                //->first()
                        ];
                    })
                    ->filter(function ($answers) {
                        //dd($answers);
                        if ($answers['voter_answer'] == null || $answers['candidate_answer'] == null) {
                            return false;
                        }
                        if ($answers['voter_answer']->proposition_id != $answers['candidate_answer']->proposition_id) {
                            throw new Exception("Proposition id's did not match!");
                        }
                        return $answers['voter_answer'] == $answers['candidate_answer']->answer;
                    })
                    ->count();

                $profile = $candidate->profile;

                return [
                    'matched' => $number_of_matches,
                    'percentage' => (($number_of_matches / $num_propositions) * 100),
                    'candidate_id' => $candidate->user_id,
                    'profile' => $profile,
                    'image' => Storage::url('public/profiles/'. $candidate->user_id . '.' . $profile->image_extension) ?? null,
                ];
            })
            ->sortByDesc('matched')
            ->take(5);
    }
}
