<?php

namespace App\Http\Controllers;

use App\Eloquent\Answer;
use App\Eloquent\SurveyCode;
use DB;
use Illuminate\Database\Query\Builder;
use Illuminate\Database\Query\JoinClause;

class SurveyResultsController extends Controller
{
    public function show(SurveyCode $code)
    {
        $results = Answer
            ::select([
                'proposition_id',
                DB::raw('count(CASE WHEN answer IS TRUE THEN 1 END)  AS agree'),
                DB::raw('count(CASE WHEN answer IS FALSE THEN 1 END) AS disagree'),
            ])
            ->join(
                'voters as v',
                function (JoinClause $join) use ($code) {
                    $join->on('v.user_id', '=', 'answers.user_id')
                        ->where('code', '=', $code->code);
                }
            )
            ->whereNotIn('answers.user_id', function (Builder $q) {
                $q
                    ->select('user_id')
                    ->from('candidates');
            })
            ->groupBy('proposition_id')
            ->with('proposition');

        return view('admin.results', [
            'code' => $code,
            'survey' => $code->survey,
            'results' => $results->get(),
        ]);
    }
}
