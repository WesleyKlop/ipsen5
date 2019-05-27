<?php

namespace App\Eloquent;

/**
 * Class Admin
 * @package App\Eloquent
 * @property string $username
 * @property string $user_id
 * @property string $password
 * @property string $type
 */
class Admin extends AppUser
{
    protected $fillable = [
        'user_id',
        'username',
        'password',
        'type',
    ];

    public function isInTrial() {
        if($this->type === 'admin') {
            return false;
        }
        return $this->hasOne(Trial::class)->exists();
    }
}
