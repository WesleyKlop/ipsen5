<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    public $timestamps = false;
    protected $keyType = 'uuid';
    protected $table = 'survey';
    protected $fillable = [
        'id',
        'name',
    ];

    public function candidates()
    {
        return $this->hasMany(Candidate::class);
    }

    public function voters()
    {
        return $this->hasManyThrough(Voter::class, SurveyCode::class, 'survey_id', 'code', 'id', 'code');
    }
}
