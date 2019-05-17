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

    public function answers()
    {
        return $this->hasMany(Answer::class, 'user_id');
    }

    public function survey()
    {
        return $this->hasOneThrough(Survey::class, SurveyCode::class, 'code', 'id', 'code', 'survey_id');
    }
}
