<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Storage;

/**
 * Class Profile
 * @package App\Eloquent
 * @property string $user_id
 * @property string $name
 * @property string $bio
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
        'image_extension'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id');
    }
}
