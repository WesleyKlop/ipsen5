<?php


namespace App\Eloquent;

use App\Exceptions\AlreadyAnsweredException;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;
use Ramsey\Uuid\Uuid;

trait AnswersPropositions
{
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
                //throw new \Exception("Dit mag niet");
                throw new AlreadyAnsweredException("We're sorry, but you already answered this question.\
                Only one answer per question is allowed. Please continue with the next question");
            }

            return Answer::make([
                'id' => Uuid::uuid4(),
                'proposition_id' => $answer['proposition_id'],
                //'survey_id' => $this->survey->id,
                'survey_id' => Proposition::where('id', $answer['proposition_id'])->first()->survey->id,
                'answer' => $answer['answer']
            ]);
        }));
    }

    public function getPropositionsWithAnswers()
    {
        return $this->survey()->with([
            'propositions',
            'propositions.answers' => function (HasMany $q) {
                $q->where('user_id', $this->user_id);
            },
        ])->get();
    }
}
