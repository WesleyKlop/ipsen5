<?php

namespace App\Eloquent;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

/**
 * Class Survey
 * @package App\Eloquent
 * @property string $id
 * @property string $name
 */
class Survey extends Model
{
    public $timestamps = false;
    protected $keyType = 'uuid';
    protected $with = ['propositions'];
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

    public function surveyCodes()
    {
        return $this->hasMany(SurveyCode::class);
    }

    public function propositions()
    {
        return $this->hasMany(Proposition::class);
    }

    public function addTeacher(Admin $teacher) {

        $teacher->removeFromTrial();

        SurveyCode::create([
            "code" => Uuid::uuid4(),
            "username" => $teacher->username,
            "survey_id" => $this->id,
            "expire" => Carbon::new()->addMonth()->timestamp,
        ]);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
