<?php

namespace Php\Project\BrainGames;

use function cli\line;
use function cli\prompt;
use function Php\Project\Games\BrainGame\runBrainGame;
use function Php\Project\Games\CalcGame\runCalcGame;
use function Php\Project\Games\GcdGame\runGcdGame;
use function Php\Project\Games\PrimeGame\runPrimeGame;
use function Php\Project\Games\ProgressionGame\runProgressionGame;

function runGames(): void
{
    line("Welcome to the Brain Games!");
    $name = prompt("May I have your name?");
    line("Hello, $name!");

    $games = [
        '1' => fn() => runBrainGame(),
        '2' => fn() => runCalcGame(),
        '3' => fn() => runGcdGame(),
        '4' => fn() => runPrimeGame(),
        '5' => fn() =>runProgressionGame(),
    ];

    while (true) {
        line("What game do you want to play?
    1. Brain-even game.
    2. Brain-calc game.
    3. Brain-gcd game.
    4. Brain-progression game.
    5. Prime-progression game.");

        $game = prompt("Type the game number or 'q' to exit");

        if ($game === 'q') {
            exit();
        }

        if (isset($games[$game])) {
            $games[$game]();
        } else {
            line("No such game!");
            continue;
        }
    }
}
