<?php


namespace Models;


use Controllers\AnswerController;
use Helpers\RequestParsingHelper;
use Repositories\SurveyRepository;
use Repositories\UserRepository;

class Survey
{
    static public function getAllSurveys()
    {
        $userId = RequestParsingHelper::getUserIdInSession();
        $surveys = (new SurveyRepository)->getAll($userId);
        foreach ($surveys as &$survey)
        {
            $survey['answers'] = (new AnswerController()) -> getAllAnswerForSurvey($survey['id']);
        }
        return $surveys;
    }

    static public function addSurvey($data)
    {
        $userId = RequestParsingHelper::getUserIdInSession();
        $survey = [
            'title' => $data['title'],
            'userId' => $userId,
            'status' => $data['status']
        ];
        $surveyId = (new SurveyRepository()) -> add($survey);

        if((new AnswerController()) -> addAnswer($data['answers'], $surveyId))
        {
            header("Location: /myCabinet");
            exit;
        }
    }

    static public function getById($id)
    {

        $survey = (new SurveyRepository)->getById($id);
        $survey['answers'] = (new AnswerController()) -> getAllAnswerForSurvey($survey['id']);
        echo json_encode($survey);
    }

    static public function sortByDate()
    {
        $userId = RequestParsingHelper::getUserIdInSession();
        $surveys = (new SurveyRepository)->getSurveysByDate($userId);
        foreach ($surveys as &$survey)
        {
            $survey['answers'] = (new AnswerController()) -> getAllAnswerForSurvey($survey['id']);
        }
        return $surveys;
    }

    static public function sortByTitle()
    {
        $userId = RequestParsingHelper::getUserIdInSession();
        $surveys = (new SurveyRepository)->getSurveysByTitle($userId);
        foreach ($surveys as &$survey)
        {
            $survey['answers'] = (new AnswerController()) -> getAllAnswerForSurvey($survey['id']);
        }
        return $surveys;
    }

    static public function sortByPublished()
    {
        $userId = RequestParsingHelper::getUserIdInSession();
        $surveys = (new SurveyRepository)->getSurveysByPublished($userId);
        foreach ($surveys as &$survey)
        {
            $survey['answers'] = (new AnswerController()) -> getAllAnswerForSurvey($survey['id']);
        }
        return $surveys;
    }

    static public function sortByUnpublished()
    {
        $userId = RequestParsingHelper::getUserIdInSession();
        $surveys = (new SurveyRepository)->getSurveysByUnpublished($userId);
        foreach ($surveys as &$survey)
        {
            $survey['answers'] = (new AnswerController()) -> getAllAnswerForSurvey($survey['id']);
        }
        return $surveys;
    }

    static public function deleteSurvey($id)
    {
        if((new AnswerController) -> deleteAnswers($id))
        {
            if((new SurveyRepository)->delete($id)) return true;
        }
        return false;

    }

    static public function getRandomSurvey($email)
    {
        $user = (new UserRepository())->getUserByEmail($email);
        $surveys = (new SurveyRepository)->getAllSurveys($user['id']);
        foreach ($surveys as &$survey)
        {
            $survey['answers'] = (new AnswerController()) -> getAllAnswerForSurvey($survey['id']);
        }

        $randomElement = $surveys[array_rand($surveys)];
        header('Content-Type: application/json');
        return json_encode($randomElement);
    }

    static public function editSurvey($data)
    {
        (new SurveyRepository()) -> edit($data);

        if((new AnswerController()) -> editAnswer($data['answers']))
        {
            header("Location: /myCabinet");
            exit;
        }
    }
}