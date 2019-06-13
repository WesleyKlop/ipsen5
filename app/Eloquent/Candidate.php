<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Collection;

/**
 * Class Candidate
 * @package App\Eloquent
 * @property string $url
 * @property string $survey_id
 * @property string $user_id
 * @property Survey $survey
 * @property Feedback $feedback
 * @property Profile $profile
 * @property Collection $answers
 */
class Candidate extends AppUser
{
    use AnswersPropositions;

    protected $guard = 'candidate';
    protected $with = ['profile'];
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

    public function feedback()
    {
        return $this->hasOne(Feedback::class, 'user_id');
    }
}
