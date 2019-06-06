<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Trial extends Model
{
    //protected $keyType = 'uuid';
    protected $primaryKey = 'teacher_id';
    protected $fillable = [
        'teacher_id',
    ];
}
