<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Candidate extends Authenticatable
{
    protected $guard = 'candidate';
    protected $table = 'candidates';
    protected $keyType = 'uuid';
    protected $fillable = [
        'id',
        'url',
        'survey_id',
        'name',
        'bio',
    ];
}
