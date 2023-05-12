<?php


namespace Views;


class ModalCreateSurvey
{
    static public function render()
    {
        return
            '
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">New Survey</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form id="createForm" action="/survey/add" method="post">
                  <div class="modal-body">
                      <div class="form-group">
                        <label for="question">Survey:</label>
                        <input type="text" class="form-control" id="question" placeholder="Enter question">
                      </div>
                      <div class="form-group">
                        <label for="status">Status:</label>
                        <div class="input-group mb-3">
                          <select class="form-select" id="status">
                            <option selected>Choose...</option>
                            <option value="Unpublished">Unpublished</option>
                            <option value="Published">Published</option>
                          </select>
                          <label class="input-group-text" for="inputGroupSelect02">Options</label>
                        </div>
                      </div>
                      <div class="form-group" id="answers-container">
                        <div class="form-group">
                            <label for="answer1">Answer 1:</label>
                            <input type="text" class="form-control" id="answer1" placeholder="Enter answer 1">
                          </div>
                      </div>
                      <button type="button" class="btn btn-primary" id="add-answer-btn">Add answer</button>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Create</button>
                  </div>
              </form>
            </div>
          </div>
        </div>
            ';
    }
}