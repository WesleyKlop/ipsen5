<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SurveyCode extends Model
{
    protected $table = 'survey_code';
    protected $fillable = [
        'code',
        'username',
        'user_id',
        'survey_id',
    ];

    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function voters()
    {
        return $this->hasMany(Voter::class, 'code');
    }
}
