<?php
namespace App;

class Quiz 
{
    protected array $questions;

    public function addQuestion(Question $question)
    {
        $this->questions[] = $question;
    }

    public function questions()
    {
        return $this->questions;
    }
}