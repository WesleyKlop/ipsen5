<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'user_id';
    protected $table = 'profile';
    protected $keyType = 'uuid';
    protected $fillable = [
        'user_id',
        'name',
        'bio',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id');
    }
}
