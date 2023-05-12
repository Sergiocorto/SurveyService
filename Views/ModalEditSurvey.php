<?php


namespace Views;


use Interfaces\ViewInterface;

class ModalEditSurvey implements ViewInterface
{

    static public function render($survey)
    {
        if ($survey['status'] == 'Unpublished') {
            $select = '
                <select class="form-select" id="status">
                    <option>Choose...</option>
                    <option selected value="Unpublished">Unpublished</option>
                    <option value="Published">Published</option>
                  </select>
            ';
        }
        if ($survey['status'] == 'Published') {
            $select = '
                <select class="form-select" id="status">
                    <option>Choose...</option>
                    <option value="Unpublished">Unpublished</option>
                    <option selected value="Published">Published</option>
                  </select>
            ';
        }

        $answerList = '';
        $answerCount = 1;
        foreach ($survey['answers'] as $answer)
        {
            $answerList .= '
                <div class="form-group">
                    <label for="answer1">Answer '.$answerCount.':</label>
                    <input type="text" class="form-control" id="'.$answer['id'].'" value="'.$answer['title'].'">
                  </div>
            ';
            $answerCount++;
        }

        return
        '
            <div class="modal fade" id="exampleEditModal-'.$survey['id'].'" tabindex="-1" aria-labelledby="exampleEditModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Survey</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form class="editForm" action="/survey/edit" method="post">
                  <div class="modal-body">
                  <input type="hidden" class="form-control" id="surveyId" value="'.$survey['id'].'">
                      <div class="form-group">
                        <label for="question">Survey:</label>
                        <input type="text" class="form-control" id="question" value="'.$survey['title'].'">
                      </div>
                      <div class="form-group">
                        <label for="status">Status:</label>
                        <div class="input-group mb-3">
                          '.$select.'
                          <label class="input-group-text" for="inputGroupSelect02">Options</label>
                        </div>
                      </div>
                      <div class="form-group" id="answers-container">
                        '.$answerList.'
                      </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Edit</button>
                  </div>
              </form>
            </div>
          </div>
        </div>
        ';
    }
}