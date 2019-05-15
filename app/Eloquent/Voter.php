<?php

namespace App\Eloquent;

class Voter extends AppUser
{
    protected $fillable = [
        'code',
        'user_id',
    ];

    public function surveyCode()
    {
        return $this->hasOne(SurveyCode::class, 'code', 'code');
    }
}
