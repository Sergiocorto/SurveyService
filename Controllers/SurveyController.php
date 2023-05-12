<?php


namespace Controllers;


use Models\Survey;
use Views\SurveyCard;

class SurveyController
{
    public function addSurvey($data)
    {
        Survey::addSurvey($data);
    }

    static public function getAllSurveys()
    {
        return Survey::getAllSurveys();
    }

    public function sortByDate()
    {
        $surveys = Survey::sortByDate();
        $surveyCards = '';
        foreach ($surveys as $survey)
        {
            $surveyCards .= SurveyCard::render($survey);
        }
        echo $surveyCards;
    }

    public function sortByTitle()
    {
        $surveys = Survey::sortByTitle();
        $surveyCards = '';
        foreach ($surveys as $survey)
        {
            $surveyCards .= SurveyCard::render($survey);
        }
        echo $surveyCards;
    }

    public function sortByPublished()
    {
        $surveys = Survey::sortByPublished();
        $surveyCards = '';
        foreach ($surveys as $survey)
        {
            $surveyCards .= SurveyCard::render($survey);
        }
        echo $surveyCards;
    }

    public function sortByUnpublished()
    {
        $surveys = Survey::sortByUnpublished();
        $surveyCards = '';
        foreach ($surveys as $survey)
        {
            $surveyCards .= SurveyCard::render($survey);
        }
        echo $surveyCards;
    }

    public function deleteSurvey($param)
    {
        echo (Survey::deleteSurvey($param['id']));
    }

    public function getRandomSurvey($param)
    {
        echo Survey::getRandomSurvey($param['email']);
    }

    public function editSurvey($survey)
    {
        Survey::editSurvey($survey);
    }
}