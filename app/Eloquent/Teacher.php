<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $keyType = 'uuid';
    public $timestamps = false;
    protected $fillable = [
        'survey_id',
        'user_id',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'user_id', 'user_id');
    }

    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }
}
