<?php

namespace App\Eloquent;

class Admin extends AppUser
{
    protected $guard = 'admin';
    protected $table = 'login';
    protected $fillable = [
        'user_id',
        'username',
        'password',
        'type',
    ];
}
