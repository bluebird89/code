<?php

function search(array $numbers, int $neeedle): bool
{
    $totalItems = count($numbers);

    for ($i = 0; $i < $totalItems; $i++) {
        if ($numbers[$i] === $neeedle) {
            return true;
        }
    }
    return false;
}

$numbers = range(1, 200, 5);

if (search($numbers, 31)) {
    echo "Found".PHP_EOL;
} else {
    echo "Not found".PHP_EOL;
}

$arr = [];
$count = rand(10, 30);

for ($i = 0; $i < $count; $i++) {
    $val = rand(1, 500);
    $arr[$val] = $val;
}

$number = 100;

if (isset($arr[$number])) {
    echo "$number found ";
} else {
    echo "$number not found";
}
