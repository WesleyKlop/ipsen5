<?php


namespace App\Eloquent;


use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;
use Ramsey\Uuid\Uuid;

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

    public function submitAnswers(Collection $answers)
    {
        $this->answers()->saveMany($answers->map(function (array $answer) {
            if (Answer
                ::where('proposition_id', $answer['proposition_id'])
                ->where('survey_id', $this->survey->id)
                ->where('user_id', $this->user_id)
                ->exists()) {
                throw new \Exception("Dit mag niet");
            }

            return Answer::make([
                'id' => Uuid::uuid4(),
                'proposition_id' => $answer['proposition_id'],
                'survey_id' => $this->survey->id,
                'answer' => $answer['answer']
            ]);
        }));
    }
}
