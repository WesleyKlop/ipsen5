<?php

namespace App\Eloquent;

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
        $user_answers = $this->answers->sortBy('id');
        $num_propositions = $this->survey->propositions->count();
        return $this
            ->survey
            ->candidates
            ->map(function ($candidate) use ($user_answers, $num_propositions) {
                $number_of_matches = $candidate
                    ->answers
                    ->sortBy('id')
                    ->zip($user_answers)
                    ->filter(function ($elem) {
                        return $elem[0]->answer == $elem[1]->answer;
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
