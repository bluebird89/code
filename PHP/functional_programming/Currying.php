<?php

$languages = ["php", "python", "java", "c", "erlang"];
var_dump(array_map('ucfirst', $languages));

function currySum($a)
{
    return function ($b) use ($a) {
        return function ($c) use ($a, $b) {
            return $a + $b + $c;
        };
    };
}

echo currySum(10)(20)(30).PHP_EOL;

function partial($funcName, ...$args)
{
    return function (...$innerArgs) use ($funcName, $args) {
        $allArgs = array_merge($args, $innerArgs);
        return call_user_func_array($funcName, $allArgs);
    };
}

function sum($a, $b, $c)
{
    return $a + $b + $c;
}

$sum = partial("sum", 10, 20);
echo $sum(30);
