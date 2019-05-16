<?php


namespace App\Eloquent;


use Illuminate\Database\Query\Builder;

trait AnswersPropositions
{
    public function getUnansweredProposition()
    {
        /** @var Survey $survey */
        $survey = $this->survey;
        return $survey
            ->propositions()
            ->whereNotIn('id', function (Builder $query) use ($survey) {
                $query
                    ->select('proposition_id')
                    ->from('answers')
                    ->where('survey_id', '=', $survey->id)
                    ->where('user_id', '=', $this->user_id);
            })
//            ->orderByRaw('random()')
            ->first();
    }

    public function getPropositions()
    {
        return $this->survey->propositions;
    }

    public function submitAnswers($answers)
    {
        dd($answers);
    }
}
