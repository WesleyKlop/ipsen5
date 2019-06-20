<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Trial
 * @package App\Eloquent
 * @property string $teacher_id
 */
class Trial extends Model
{
    protected $keyType = 'uuid';
    protected $primaryKey = 'teacher_id';
    protected $fillable = [
        'teacher_id',
    ];
}
