<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

function greetings(string $gameGreetings = '')
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?', '', ' ');
    line("Hello, %s!", $name);

    if ($gameGreetings != '') {
        line($gameGreetings);
    }

    return $name;
}

function goodbye(bool $hasErrors, string $name)
{
    if ($hasErrors) {
        line("Let's try again, {$name}!");
    } else {
        line("Congratulations, {$name}!");
    }
}

function askQuestions(array $questionsAndAnswersArray)
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

function getUserAnswer(string $question)
{
    line('Question: ' . $question);
    return prompt('Your answer');
}

function checkAnswer(string $answer, string $userAnswer)
{
    if ($answer == $userAnswer) {
        line('Correct!');
        return true;
    } else {
        line("'{$userAnswer}' is wrong answer ;(. Correct answer was '{$answer}'.");
        return false;
    }
}
