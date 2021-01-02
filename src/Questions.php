<?php

namespace App;

use Countable;

class Questions implements Countable
{
    protected array $questions;

    public function __construct(array $questions = [])
    {
        $this->questions = $questions;
    }


    public function add(Question $question)
    {
        $this->questions[]  = $question;
    }

    public function next()
    {
        return $this->questions[0];
    }

    public function count() {
        return count($this->questions);
    }

    public function answered()
    {
        return array_filter($this->questions, fn($question) => $question->answered());
    }

    public function solved()
    {
        return array_filter($this->questions, fn($question) => $question->solved());
    }
}