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

    public function survey()
    {
        return $this->belongsTo(Survey::class, 'survey_id');
    }

    public function surveyCode()
    {
        return $this->hasOne(SurveyCode::class, 'code', 'code');
    }

    public function answers()
    {
        return $this->hasMany(Answer::class, 'user_id');
    }

    public function getMatches() {
        /*
         * 1. Get a list of all answers of this user.
         * 2. For every candidate:
         *      3. Count all the matches with the current user,
         *         also storing what percentage they match in.
         * 4. sort by max count
         * 5. return the top 5
         */

        $user_answers = $this->answers;
        $survey = $this->survey;
        dd($survey);
        dd($survey->candidates);
    }
}
