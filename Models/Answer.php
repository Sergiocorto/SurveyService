<?php


namespace Models;


use Helpers\NumberOfVotesGenerator;
use Repositories\AnswerRepository;

class Answer
{
    static public function getAllAnswerForSurvey($surveyId)
    {
        return (new AnswerRepository()) -> getAll($surveyId);
    }

    static public function addAnswer($data, $surveyId)
    {
        foreach ($data as &$answer) {
            $answer['numberOfVotes'] = NumberOfVotesGenerator::generate();
            $answer['surveyId'] = $surveyId;
        }
        return (new AnswerRepository()) -> add($data);
    }

    static public function deleteAnswers($surveyId)
    {
        return (new AnswerRepository()) -> delete($surveyId);
    }
}