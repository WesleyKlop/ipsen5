<?php

namespace App\Eloquent;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

/**
 * Class Survey
 * @package App\Eloquent
 * @property string $id
 * @property string $name
 */
class Survey extends Model
{
    public $timestamps = false;
    protected $keyType = 'uuid';
    protected $with = ['propositions'];
    protected $fillable = [
        'id',
        'name',
        'use_general',
    ];

    public function useGeneral()
    {
        return $this->use_general;
    }

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

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
