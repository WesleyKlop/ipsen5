<?php

namespace App\Eloquent;

use mysql_xdevapi\Exception;

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
         * 2. For every candidate:
         *      3. Count all the matches with the current user,
         *         also storing what percentage they match in.
         * 4. sort by max count
         * 5. return the top 5
         */
        $user_answers = $this->answers;
        $proposition_id = $user_answers->first()->proposition_id;
        $num_propositions = $this->survey->propositions->count();
        return $this
            ->survey
            ->candidates
            ->map(function ($candidate) use ($user_answers, $num_propositions, $proposition_id) {
                $number_of_matches = $user_answers
                    ->zip($candidate->answers->where('proposition_id', $proposition_id))
                    /*
                     * @NOTE:
                     * Actually this filter *could* be removed,
                     * but you never know if a candidate answered
                     * all the questions of the survey. If he didn't,
                     * we get some null cases.
                     */
                    ->filter(function ($answers) {
                        return $answers[0] != null && $answers[1] != null;
                    })
                    ->filter(function ($answers) {
                        if ($answers[0]->proposition_id != $answers[1]->proposition_id) {
                            throw new Exception("Proposition id's did not match!");
                        }
                        return $answers[0]->answer == $answers[1]->answer;
                    })
                    ->count();

                return [
                    'matched' => $number_of_matches,
                    'percentage' => (($number_of_matches / $num_propositions) * 100),
                    'candidate_id' => $candidate->user_id,
                ];
            })
            ->sortByDesc('matched')
            ->take(5);
    }
}
