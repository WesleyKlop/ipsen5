<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trial extends Model
{
    protected $keyType = 'uuid';
    protected $fillable = [
        'admin_id',
    ];
}
