<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Voter extends Authenticatable
{
    protected $guard = 'voter';
    protected $table = 'voters';
    protected $keyType = 'uuid';
    protected $fillable = [
        'id',
        'code',
        'survey_id',
        'username',
    ];

    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }
}
