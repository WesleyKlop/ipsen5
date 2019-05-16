<?php

namespace App\Eloquent;

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
}
