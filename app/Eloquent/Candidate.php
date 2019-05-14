<?php

namespace App\Eloquent;

class Candidate extends AppUser
{
    protected $guard = 'candidate';
    protected $table = 'candidate';
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
}
