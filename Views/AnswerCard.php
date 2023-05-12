<?php


namespace Views;


use Interfaces\ViewInterface;

class AnswerCard implements ViewInterface
{
    static public function render($answer)
    {
        return
        '
        <li class="list-group-item d-flex justify-content-between align-items-center">'.$answer["title"].'<i class="bi bi-hand-thumbs-up"></i> <span class="badge bg-primary rounded-pill">'.$answer["numberOfVotes"].'</span></li>
        ';
    }
}