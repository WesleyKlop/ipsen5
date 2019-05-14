<?php


namespace App\Eloquent;

use Illuminate\Foundation\Auth\User as Authenticatable;

abstract class AppUser extends Authenticatable
{
    protected $keyType = 'uuid';
    protected $primaryKey = 'user_id';

    protected $fillable = ['user_id'];

    public function user()
    {
        return $this->hasOne(User::class, 'id');
    }
}
