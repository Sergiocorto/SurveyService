<?php


namespace Controllers;


use Models\Answer;

class AnswerController
{
    public function getAllAnswerForSurvey($surveyId)
    {
        return Answer::getAllAnswerForSurvey($surveyId);
    }

    public function addAnswer($answers, $surveyId)
    {
        return Answer::addAnswer($answers, $surveyId);
    }

    public function deleteAnswers($surveyId)
    {
        return Answer::deleteAnswers($surveyId);
    }

    public function editAnswer($answers)
    {
        return Answer::editAnswer($answers);
    }
}