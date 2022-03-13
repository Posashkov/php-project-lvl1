<?php

namespace Brain\Games\Calc;

use function Brain\Games\Engine\greetings;
use function Brain\Games\Engine\goodbye;
use function Brain\Games\Engine\askQuestions;

function startGame()
{
    $name = greetings('What is the result of the expression?');

    $questionsAndAnswersArray = generateQuestionsArray();

    $hasErrors = askQuestions($questionsAndAnswersArray);

    goodbye($hasErrors, $name);
}

function generateQuestionsArray($countNumbers = 3)
{
    $operationArray = ['+', '-', '*'];
    
    $returnArray = [];

    for ($i = 0; $i < $countNumbers; $i++) {
        $firstOperand = rand(0, 100);
        $secondOperand = rand(0, 100);
        $mathOperation = $operationArray[array_rand($operationArray)];
        $mathResult = 0;
        
        switch ($mathOperation) {
            case '+':
                $mathResult = $firstOperand + $secondOperand;
                break;
            case '-':
                $mathResult = $firstOperand - $secondOperand;
                break;
            case '*':
                $mathResult = $firstOperand * $secondOperand;
                break;
        }

        $returnArray[] = ["{$firstOperand} {$mathOperation} {$secondOperand}", $mathResult];
    }

    return $returnArray;
}
