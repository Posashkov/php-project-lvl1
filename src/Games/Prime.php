<?php

namespace Brain\Games\Prime;

use function Brain\Games\Engine\greetings;
use function Brain\Games\Engine\goodbye;
use function Brain\Games\Engine\askQuestions;

function startGame()
{
    $name = greetings('Answer "yes" if given number is prime. Otherwise answer "no".');

    $questionsAndAnswersArray = generateQuestionsArray();

    $hasErrors = askQuestions($questionsAndAnswersArray);

    goodbye($hasErrors, $name);
}

function generateQuestionsArray($countNumbers = 3)
{
    $returnArray = [];

    for ($i = 0; $i < $countNumbers; $i++) {
        $randomNumber = rand(2, 100);

        $isPrimeNumber = 'yes';
        for ($j = 2; $j < $randomNumber; $j++) {
            if ($randomNumber % $j == 0) {
                $isPrimeNumber = 'no';
                break;
            }
        }

        $returnArray[] = [$randomNumber, $isPrimeNumber];
    }

    return $returnArray;
}
