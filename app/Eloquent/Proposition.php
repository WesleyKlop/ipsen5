<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Proposition
 * @package App\Eloquent
 * @property string $id
 * @property string $survey_id
 * @property string $proposition
 */
class Proposition extends Model
{
    protected $keyType = 'uuid';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'survey_id',
        'proposition',
    ];

    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
