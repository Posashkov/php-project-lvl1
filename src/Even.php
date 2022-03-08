<?php

namespace Brain\Games\Even;

use function cli\line;
use function cli\prompt;

function startGame()
{
    $name = greetings();

    $numbers = generateNumbers();

    $hasErrors = false;
    foreach ($numbers as $number) {
        $answer = askQuestion($number);
        if (!checkNumberAndAnswer($number, $answer)) {
            $hasErrors = true;
            break;
        }
    }

    if ($hasErrors) {
        line("Let's try again, {$name}!");
    } else {
        line("Congratulations, {$name}!");
    }
}

function greetings()
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?', false, ' ');
    line("Hello, %s!", $name);
    line('Answer "yes" if the number is even, otherwise answer "no".');

    return $name;
}

function generateNumbers($countNumbers = 3)
{
    $randomNumbers = [];

    for ($i = 0; $i < $countNumbers; $i++) {
        $randomNumbers[] = rand(0, 100);
    }

    return $randomNumbers;
}

function askQuestion($number)
{
    line('Question: ' . $number);
    return prompt('Your answer');
}

function checkNumberAndAnswer($number, $answer)
{
    $isEven = ($number % 2) == 0;

    if ($isEven) {
        if ($answer == 'yes') {
            line('Correct!');
            return true;
        } else {
            line("'{$answer}' is wrong answer ;(. Correct answer was 'yes'.");
            return false;
        }
    } else {
        if ($answer == 'no') {
            line('Correct!');
            return true;
        } else {
            line("'{$answer}' is wrong answer ;(. Correct answer was 'no'.");
            return false;
        }
    }
}
