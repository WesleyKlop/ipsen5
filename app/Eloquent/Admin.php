<?php

namespace App\Eloquent;

class Admin extends AppUser
{
    protected $fillable = [
        'user_id',
        'username',
        'password',
        'type',
    ];
}
