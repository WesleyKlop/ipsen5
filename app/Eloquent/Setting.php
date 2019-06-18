<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    public $timestamps = false;
    protected $keyType = 'uuid';
    protected $fillable = [
        'id',
        'name',
        'value',
    ];
}
