<?php

namespace Brain\Games\Progression;

use function Brain\Games\Engine\greetings;
use function Brain\Games\Engine\goodbye;
use function Brain\Games\Engine\askQuestions;

function startGame()
{
    $name = greetings('What number is missing in the progression?');

    $questionsAndAnswersArray = generateQuestionsArray();

    $hasErrors = askQuestions($questionsAndAnswersArray);

    goodbye($hasErrors, $name);
}

function generateQuestionsArray(int $countNumbers = 3)
{
    $returnArray = [];

    for ($i = 0; $i < $countNumbers; $i++) {
        $progressionStep = rand(1, 10);
        $numbersArray = range(1, $progressionStep * 10, $progressionStep);
        $hiddenNumberIndex = rand(0, 9);
        $hiddenNumber = $numbersArray[$hiddenNumberIndex];
        $numbersArray[$hiddenNumberIndex] = '..';

        $returnArray[] = [implode(' ', $numbersArray), $hiddenNumber];
    }

    return $returnArray;
}
