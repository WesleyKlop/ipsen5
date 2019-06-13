<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $keyType = 'uuid';
    protected $fillable = [
        'id',
        'user_id',
        'survey_id',
        'feedback',
    ];
}
