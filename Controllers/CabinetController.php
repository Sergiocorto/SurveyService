<?php


namespace Controllers;


use Views\MyCabinet;

class CabinetController
{
    public function getProfileView()
    {
        $surveys = SurveyController::getAllSurveys();
        MyCabinet::render($surveys);
    }
}