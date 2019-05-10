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
    protected $casts = [
        'id' => 'string',
        'code' => 'string',
        'survey_id' => 'string',
        'username' => 'string',
    ];
}
