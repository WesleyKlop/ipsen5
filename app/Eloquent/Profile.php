<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Profile
 * @package App\Eloquent
 * @property string $user_id
 * @property string $name
 * @property string $bio
 * @property string $email
 * @property string $image_extension
 * @property string $first_name
 * @property string $last_name
 * @property string $function
 * @property string $party
 */
class Profile extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'user_id';
    protected $keyType = 'uuid';
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'function',
        'party',
        'bio',
        'image_extension',
        'email',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id');
    }
}
