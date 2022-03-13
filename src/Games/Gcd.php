<?php

namespace Brain\Games\Gcd;

use function Brain\Games\Engine\greetings;
use function Brain\Games\Engine\goodbye;
use function Brain\Games\Engine\askQuestions;

function startGame()
{
    $name = greetings('Find the greatest common divisor of given numbers.');

    $questionsAndAnswersArray = generateQuestionsArray();

    $hasErrors = askQuestions($questionsAndAnswersArray);

    goodbye($hasErrors, $name);
}

function generateQuestionsArray(int $countNumbers = 3)
{
    $returnArray = [];

    for ($i = 0; $i < $countNumbers; $i++) {
        $numbersArray = [rand(1, 100), rand(1, 100)];
        rsort($numbersArray);
        [$firstNumber, $secondNumber] = $numbersArray;

        $nodFound = false;
        $ostatok = 1;
        $firstOperand = $firstNumber;
        $secondOperand = $secondNumber;

        while ($nodFound == false) {
            $ostatok = $firstOperand % $secondOperand;

            if ($ostatok == 0) {
                $nodFound = true;
            } else {
                $firstOperand = $secondOperand;
                $secondOperand = $ostatok;
            }
        }

        $returnArray[] = ["{$firstNumber} {$secondNumber}", $secondOperand];
    }

    return $returnArray;
}
