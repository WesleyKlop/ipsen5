<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $guard = 'admin';
    protected $table = 'admins';
    protected $keyType = 'uuid';
    protected $fillable = [
        'id',
        'username',
        'password',
        'type',
    ];
}
