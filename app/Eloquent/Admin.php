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
        if($this->type !== 'teacher') {
            return false;
        }

        return Trial::where('teacher_id', $this->user_id)->exists();
    }

    public function removeFromTrial() {
        if($this->type !== 'teacher') {
            return;
        }

        Trial::where('teacher_id', $this->user_id)->delete();
    }

    public function addToTrail() {
        if ($this->type !== 'teacher') {
            return;
        }

        Trail::make(['teacher_id' => $this->user_id]);
    }
}
