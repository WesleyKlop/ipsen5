<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Answer
 * @package App\Eloquent
 * @property string $proposition_id
 * @property string $survey_id
 * @property string $user_id
 * @property bool $answer
 */
class Answer extends Model
{
    protected $keyType = 'uuid';
    protected $fillable = [
        'id',
        'proposition_id',
        'survey_id',
        'user_id',
        'answer',
    ];

    public function user()
    {
        // This sucks, with only a user to go by, we can't figure out if it was a voter or candidate
        return $this->belongsTo(User::class);
    }

    public function proposition()
    {
        return $this->belongsTo(Proposition::class);
    }

    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }

    public function isTrue() {
        return $this->answer;
    }
}
