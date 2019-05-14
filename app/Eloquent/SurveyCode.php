<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class SurveyCode extends Model
{
    protected $table = 'survey_code';
    protected $primaryKey = 'code';
    public $timestamps = false;
    protected $fillable = [
        'code',
        'username',
        'user_id',
        'survey_id',
        'expire',
    ];

    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'user_id', 'user_id');
    }

    public function voters()
    {
        return $this->hasMany(Voter::class, 'code');
    }
}
