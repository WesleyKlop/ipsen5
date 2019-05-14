<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    public $timestamps = false;
    protected $keyType = 'uuid';
    protected $fillable = [
        'id',
        'name',
    ];

    public function candidates()
    {
        return $this->hasMany(Candidate::class);
    }

    public function voters()
    {
        return $this->hasManyThrough(Voter::class, SurveyCode::class, 'survey_id', 'code', 'id', 'code');
    }

    public function surveyCodes()
    {
        return $this->hasMany(SurveyCode::class);
    }

    public function propositions()
    {
        return $this->hasMany(Proposition::class);
    }
}
