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

    public function isTeacher() {
        return $this->type == 'teacher';
    }

    public function isInTrial() {
        if(!$this->isTeacher()) {
            return false;
        }

        return Trial::where('teacher_id', $this->user_id)->exists();
    }

    public function removeFromTrial() {
        if(!$this->isTeacher()) {
            return;
        }

        Trial::where('teacher_id', $this->user_id)->delete();
    }

    public function addToTrail() {
        if (!$this->isTeacher()) {
            return;
        }

        Trail::make(['teacher_id' => $this->user_id]);
    }
}
