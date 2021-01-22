<?php


$gen_return = (function ($var) {
    $x = $var + 2;
    yield $var;
    yield $x;
    $y = $x + 2;
    return $y;
})(1);
foreach ($gen_return as $value) {
    echo $value, PHP_EOL;
}
echo $gen_return->getReturn(), PHP_EOL;

function gen($var)
{
    yield $var;
    $x = $var + 2;
    yield $x;
    yield from gen2($var);
}

function gen2($var)
{
    $y = $var + 1;
    yield $var;
    yield $y;
}

foreach (gen(1) as $val) {
    echo $val, PHP_EOL;
}
