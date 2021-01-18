<?php

function factorial(int $n): int
{
    if ($n == 0) {
        return 1;
    }

    return $n * factorial($n - 1);
}

function factorialByIterative(int $n): int
{
    $result = 1;
    for ($i = $n; $i > 0; $i--) {
        $result *= $i;
    }
    return $result;
}

echo factorial(5).PHP_EOL;
echo factorialByIterative(5).PHP_EOL;
