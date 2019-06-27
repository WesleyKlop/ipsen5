<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Collection;
use Storage;

/**
 * Class Voter
 * @package App\Eloquent
 * @property string $code
 * @property string $user_id
 * @property string $survey_id
 * @property Survey $survey
 * @property Feedback $feedback
 * @property SurveyCode $surveyCode
 * @property Collection $answers
 */
class Voter extends AppUser
{
    use AnswersPropositions;

    protected $guard = 'voter';
    protected $fillable = [
        'code',
        'user_id',
    ];

    public function surveyCode()
    {
        return $this->hasOne(SurveyCode::class, 'code', 'code');
    }

    public function answers()
    {
        return $this->hasMany(Answer::class, 'user_id');
    }

    public function survey()
    {
        return $this->hasOneThrough(
            Survey::class,
            SurveyCode::class,
            'code',
            'id',
            'code',
            'survey_id'
        );
    }

    public function getMatches()
    {
        /*
         * 1. Get a list of all answers of this user.
         * 2. For each candidate of the survey:
         *      2.1. For each answer of the user
         *              2.1.1 Fetch the proposition from the candidate that matches the answer's proposition_id
         *      2.2. Test for a match on the answer
         *      2.3 Count the number of matches
         *      2.4 Return a nice structure containing the number of matches, the match percentage, and the candidate's id
         * 3. Do a descending sort by the number of matches (highest number of matches comes up front)
         * 4 Return the first 5.
         */

        $euSurveyId = Setting::europeanSurvey()->id;
        $countrySurveyId = Setting::countrySurvey()->id;

        // Filter out answers from european / parliament survey
        $userAnswers = $this
            ->answers
            ->filter(function (Answer $answer) {
                return $answer->survey_id === $this->survey_id;
            });

        // Get the total count of propositions to calculate the percentage against.
        $propositionCount = $this
            ->survey
            ->propositions()
            ->count();

        return $this
            ->survey
            ->candidates
            ->map(function (Candidate $candidate) use (
                $userAnswers,
                $propositionCount
            ) {
                // fetch all answers of the candidate,
                // so they're in memory,
                // and we don't have to fetch each answer from the db
                $candidateAnswers = $candidate
                    ->answers()
                    ->where('survey_id', $candidate->survey_id)
                    ->all()
                    ->keyBy('proposition_id');

                $matchCount = $userAnswers
                    ->reduce(function (int $matched, Answer $answer) use (
                        $candidateAnswers
                    ) {
                        if ($answer->answer === $candidateAnswers[$answer->proposition_id]->answer) {
                            return $matched + 1;
                        }
                        return $matched;
                    }, 0);

                $profile = $candidate->profile;

                return [
                    'matched' => $matchCount,
                    'percentage' => (($matchCount / $propositionCount) * 100),
                    'candidate_id' => $candidate->user_id,
                    'profile' => $profile,
                    'image' => Storage::url('public/profiles/' . $candidate->user_id . '.' . $profile->image_extension) ?? null,
                ];
            })
            ->sortByDesc('matched')
            ->values()
            ->take(5);
    }

    public function feedback()
    {
        return $this->hasOne(Feedback::class, 'user_id');
    }
}
