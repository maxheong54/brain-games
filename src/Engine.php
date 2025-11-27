<?php

namespace Php\Project\Engine;

use function cli\line;
use function cli\prompt;

const TOTAL_ROUNDS = 3;

function runGame(string $gameRules, callable $getRoundData): void
{
    for ($i = 0; $i < TOTAL_ROUNDS; $i++) {
        line($gameRules);
        [$question, $correctAnswer] = $getRoundData();
        line("Question: $question");
        $userAnswer = prompt("Your answer");

        if ($userAnswer !== $correctAnswer) {
            line("'$userAnswer' is wrong answer ;(. Correct answer was '$correctAnswer'.");
            line("Let's try again!");
            return;
        }

        line("Correct!");
    }

    line("Congratulations!");
}
