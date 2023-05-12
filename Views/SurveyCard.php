<?php


namespace Views;


use Interfaces\ViewInterface;

class SurveyCard implements ViewInterface
{
    static public function render($survey)
    {
        $answerCards = '';
        foreach ($survey['answers'] as $answer)
        {
            $answerCards .= AnswerCard::render($answer);
        }

        return
            '
            <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">'.$survey["title"].'</h5>
                    <ul class="list-group list-group-flush">
                    '.$answerCards.'
                    </ul>
                    <div class="card-text mt-3">
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="text-muted">Status: '.$survey["status"].'</div>
                        <div class="btn-group">
                          <button type="button" class="btn btn-danger" onclick="deleteSurvey('.$survey["id"].')">Delete</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            ';
    }
}