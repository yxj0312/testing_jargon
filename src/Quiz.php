<?php
namespace App;

use Exception;

class Quiz 
{
    protected Questions $questions;

    protected $currentQuestion = 1;

    public function __construct()
    {
        $this->questions = new Questions();
    }

    public function addQuestion(Question $question)
    {
        $this->questions->add($question);
    }

    public function questions()
    {
        return $this->questions;
    }

    public function nextQuestion()
    {
        return $this->questions->next();

        // if (! isset($this->questions[$this->currentQuestion - 1])) {
        //     return false;
        // }
        // $question = $this->questions[$this->currentQuestion - 1];

        // $this->currentQuestion++;

        // return $question;
    }

    public function isComplete()
    {
        $answeredQuestions = count($this->questions->answered());

        $totalQuestions = $this->questions->count();
        // $answeredQuestions = count(array_filter($this->questions, fn($question) => $question->answered()));
        // $totalQuestions  = count($this->questions);

        return $answeredQuestions === $totalQuestions;
    }

    public function grade()
    {
        // 1 => 2 = 50
        // 1 => 4 = 25

        // if the quiz has not yet been completed
        // throw an exception
        if (! $this->isComplete()) {
            throw new Exception("This quiz has not yet been completed.");
        }

        // $correct = count($this->correctlyAnsweredQuestions()); 
        $correct = count($this->questions->solved()); 

        return ($correct / count($this->questions)) * 100;
    }

    // public function correctlyAnsweredQuestions()
    // {
    //     // return array_filter($this->questions, function($question) {
    //     //     return $question->isCorrect();
    //     // });
    //     return array_filter(
    //         $this->questions, 
    //         fn($question) => $question->solved()
    //     );
    // }
}