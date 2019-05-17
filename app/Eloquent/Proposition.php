<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

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
