<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

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

    public function teachers()
    {
        return $this->hasManyThrough(
            Admin::class,
            Teacher::class,
            'survey_id',
            'user_id',
            'id',
            'user_id'
        );
    }

    public function isEuSurvey()
    {
        return Setting::where('value', '=', $this->id)->where('name', '=', 'european-survey')->exists();
    }

    public function isCountrySurvey()
    {
        return Setting::where('value', '=', $this->id)->where('name', '=', 'country-survey')->exists();
    }

    public function isTrialSurvey()
    {
        return Setting::where('value', '=', $this->id)->where('name', '=', 'trial-survey')->exists();
    }

    public function isFeedbackSurvey()
    {
        return Setting::where('value', '=', $this->id)->where('name', '=', 'feedback-survey')->exists();
    }

    public function isClassRepSurvey()
    {
        return Setting::where([
            ['value', '=', $this->id],
            ['name', '!=', 'trial-survey'],
            ['name', '!=', 'european-survey'],
            ['name', '!=', 'country-survey'],
            ['name', '!=', 'feedback-survey'],
        ])->exists();
    }
}
