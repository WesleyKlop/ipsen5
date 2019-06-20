<?php


namespace App\Eloquent;

use Str;

trait HasTrials
{
    public function isInTrial()
    {
        if (! $this->isTeacher()) {
            return false;
        }

        return Trial::where('teacher_id', $this->user_id)->exists();
    }

    public function removeFromTrial()
    {
        if (! $this->isTeacher()) {
            return;
        }

        Trial::where('teacher_id', '=', $this->user_id)->delete();
        // Create a Survey that this teacher can manage
        $representativeSurvey = Survey::create([
            'id' => Str::uuid(),
            'name' => 'Vertegenwoordiger',
        ]);
        Teacher::create([
            'user_id' => $this->user_id,
            'survey_id' => $representativeSurvey->id,
        ]);
        Setting::create([
            'id' => Str::uuid(),
            'name' => $this->user_id,
            'value' => $representativeSurvey->id,
        ]);
    }

    public function addToTrial()
    {
        if (! $this->isTeacher()) {
            return;
        }

        Trial::create(['teacher_id' => $this->user_id]);
        Teacher::create([
            'user_id' => $this->user_id,
            'survey_id' => Setting::where(['name' => 'trial-survey'])
                ->firstOrFail()->value,
        ]);
    }
}
