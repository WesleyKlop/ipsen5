<?php

namespace App\Eloquent;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SurveyCode
 * @package App\Eloquent
 * @property string $code
 * @property string $username
 * @property string $user_id
 * @property string $survey_id
 * @property DateTimeInterface $expire
 * @property DateTimeInterface $started_at
 * @property Survey $survey
 */
class SurveyCode extends Model
{
    protected $primaryKey = 'code';
    public $timestamps = false;
    protected $fillable = [
        'code',
        'user_id',
        'survey_id',
        'expire',
        'started_at',
    ];
    protected $dates = [
        'expire',
        'started_at',
    ];

    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'user_id', 'user_id');
    }

    public function voters()
    {
        return $this->hasMany(Voter::class, 'code');
    }

    public function expired()
    {
        return $this->expire !== null && Carbon::now()->isAfter($this->expire);
    }

    public function isStarted()
    {
        return $this->started_at !== null && Carbon::now()
                ->isAfter($this->started_at);
    }

    public function isActive()
    {
        return $this->started_at !== null
            && $this->expire !== null
            && Carbon::now()->isBetween($this->started_at, $this->expire);
    }

    public function interval()
    {
        return $this->started_at->diff($this->expire);
    }

    public function timeLeft()
    {
        return Carbon::now()->diff($this->expire);
    }

    public function answers()
    {
        return $this
            ->hasMany(Answer::class, 'survey_id', 'survey_id');
    }
}
