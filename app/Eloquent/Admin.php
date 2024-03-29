<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Collection;

/**
 * Class Admin
 * @package App\Eloquent
 * @property string $username
 * @property string $user_id
 * @property string $password
 * @property string $type
 * @property Collection<SurveyCode> $surveyCodes
 * @property Collection<Survey> $surveys
 */
class Admin extends AppUser
{
    use HasTrials;

    protected $fillable = [
        'user_id',
        'username',
        'password',
        'type',
    ];

    public function isTeacher()
    {
        return $this->type == 'teacher';
    }

    public function surveyCodes()
    {
        return $this->hasMany(SurveyCode::class, 'user_id', 'user_id');
    }

    public function surveys()
    {
        return $this->hasManyThrough(
            Survey::class,
            Teacher::class,
            'user_id',
            'id',
            'user_id',
            'survey_id'
        );
    }
}
