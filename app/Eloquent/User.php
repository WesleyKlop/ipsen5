<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 * @package App\Eloquent
 * @property string $id
 * @property \DateTimeInterface $created_at
 * @property \DateTimeInterface $updated_at
 * @property string $remember_token
 */
class User extends Model
{
    public const TYPE_CANDIDATE = 'candidate';
    public const TYPE_VOTER = 'voter';
    public const TYPE_ADMIN = 'admin';
    public const TYPE_TEACHER = 'teacher';

    protected $fillable = ['id'];
    protected $keyType = 'uuid';
}
