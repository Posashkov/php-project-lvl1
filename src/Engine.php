<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

function greetings($gameGreetings = '')
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?', false, ' ');
    line("Hello, %s!", $name);

    if ($gameGreetings != '') {
        line($gameGreetings);
    }
 
    return $name;
}

function goodbye($hasErrors, $name)
{
    if ($hasErrors) {
        line("Let's try again, {$name}!");
    } else {
        line("Congratulations, {$name}!");
    }
}

function askQuestions($questionsAndAnswersArray)
{
    $hasErrors = false;
    foreach ($questionsAndAnswersArray as [$question, $answer]) {
        $userAnswer = getUserAnswer($question);
        if (!checkAnswer($answer, $userAnswer)) {
            $hasErrors = true;
            break;
        }
    }

    return $hasErrors;
}

function getUserAnswer($question)
{
    line('Question: ' . $question);
    return prompt('Your answer');
}

function checkAnswer($answer, $userAnswer)
{
    if ($answer == $userAnswer) {
        line('Correct!');
        return true;
    } else {
        line("'{$userAnswer}' is wrong answer ;(. Correct answer was '{$answer}'.");
        return false;
    }
}