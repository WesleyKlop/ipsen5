<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    public $timestamps = false;
    protected $keyType = 'uuid';
    protected $table = 'survey';
    protected $fillable = [
        'id',
        'name',
    ];
}
