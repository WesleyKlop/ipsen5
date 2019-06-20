<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    public $timestamps = false;
    protected $keyType = 'uuid';
    protected $fillable = [
        'id',
        'name',
        'value',
    ];

    public static function settingSurveyByName(string $name)
    {
        return Survey::where('id', Setting::where('name', $name)->first()->value)->first();
    }
    public static function europeanSurvey()
    {
        return Setting::settingSurveyByName('european-survey');
    }

    public static function countrySurvey()
    {
        return Setting::settingSurveyByName('country-survey');
    }

    public static function feedbackSurvey()
    {
        return Setting::settingSurveyByName('feedback-survey');
    }
}
