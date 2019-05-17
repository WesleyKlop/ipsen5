<?php

namespace App\Eloquent;

class Candidate extends AppUser
{
    use AnswersPropositions;

    protected $guard = 'candidate';
    protected $fillable = [
        'url',
        'survey_id',
        'user_id',
    ];

    public function survey()
    {
        return $this->belongsTo(Survey::class, 'survey_id');
    }

    public function profile()
    {
        return $this->hasOne(Profile::class, 'user_id');
    }

    public function answers()
    {
        return $this
            ->hasMany(Answer::class, 'user_id')
            ->where('survey_id', $this->survey_id);
    }
}
