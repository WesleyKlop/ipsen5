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
        return $this->expire < Carbon::now();
    }
}
