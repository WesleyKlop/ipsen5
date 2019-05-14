<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ['id'];
    protected $keyType = 'uuid';
}
