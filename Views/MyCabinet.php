<?php


namespace Views;

use Interfaces\ViewInterface;

class MyCabinet implements ViewInterface
{
    static public function render($surveys)
    {
        $surveyCards = '';
        foreach ($surveys as $survey)
        {
            $surveyCards .= SurveyCard::render($survey);
        }
        echo
        '
        <!doctype html>
        <html lang="en" xmlns:th="http://www.w3.org/1999/xhtml">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport"
                  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
            <link rel="stylesheet" href="/public/css/index..css">
            <title>My Cabinet</title>
        </head>
        <nav class="navbar bg-body-tertiary container">
          <div class="container-fluid">
            <a class="navbar-brand" href="/auth/logout">Log out</a>
          </div>
        </nav>
        <body>
        <div class="container">
          <div class="row">
            <div class="col-md-3 btn-group-vertical buttons">
              <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Survey</button>
              <button class="btn btn-secondary" onclick="sort(this)" data-link="/survey/sortByDate">Sort by date</button>
              <button class="btn btn-secondary" onclick="sort(this)" data-link="/survey/sortByTitle">Sort by title</button>
              <button class="btn btn-secondary" onclick="sort(this)" data-link="/survey/sortByPublished">Sort by published</button>
              <button class="btn btn-secondary" onclick="sort(this)" data-link="/survey/sortByUnpublished">Sort by unpublished</button>
            </div>
            <div class="col-md-9">
                <div class="card">http://surveyservice.zzz.com.ua/api/getSurvey/?email='.$_SESSION["user"]["email"].'</div>
                <div class="card">
                    <p>Cookie name: <span>cbatest7</span></p>
                    <p>Cookie value: <span>blablabla</span></p>
                    <p></p>
            </div>
              <div class="card-deck">
                '.$surveyCards.'
              </div>
            </div>
          </div>
        </div>
        <!--Modal Create-->
        '.ModalCreateSurvey::render().'

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
        <script src="/public/js/scriptForMyCabinetPage.js"></script>
        </body>
        </html>
        ';
    }
}