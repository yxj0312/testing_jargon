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

    public function nextQuestion()
    {
        return $this->questions[0];
    }

    public function grade()
    {
        // 1 => 2 = 50
        // 1 => 4 = 25

        $correct = count($this->correctlyAnsweredQuestions()); 

        return ($correct / count($this->questions)) * 100;
    }

    public function correctlyAnsweredQuestions()
    {
        // return array_filter($this->questions, function($question) {
        //     return $question->isCorrect();
        // });
        return array_filter(
            $this->questions, 
            fn($question) => $question->solved()
        );
    }
}