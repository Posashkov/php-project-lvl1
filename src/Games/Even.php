<?php

namespace Brain\Games\Even;

use function Brain\Games\Engine\greetings;
use function Brain\Games\Engine\goodbye;
use function Brain\Games\Engine\askQuestions;


function startGame()
{
    $name = greetings('Answer "yes" if the number is even, otherwise answer "no".');

    $questionsAndAnswersArray = generateQuestionsArray();

    $hasErrors = askQuestions($questionsAndAnswersArray);

    goodbye($hasErrors, $name);
}

function generateQuestionsArray($countNumbers = 3)
{
    $returnArray = [];

    for ($i = 0; $i < $countNumbers; $i++) {
        $randomNumber = rand(0, 100);
        $isEven = ($randomNumber % 2 == 0) ? 'yes' : 'no';
        
        $returnArray[] = [$randomNumber, $isEven];
    }

    return $returnArray;
}