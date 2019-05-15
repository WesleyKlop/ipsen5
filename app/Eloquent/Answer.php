<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

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
}
