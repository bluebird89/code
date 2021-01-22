<?php

function xrange($start, $limit, $step = 1)
{
    if ($start < $limit) {
        if ($step <= 0) {
            throw new LogicException('Step must be +ve');
        }

        for ($i = $start; $i <= $limit; $i += $step) {
            yield $i;
        }
    } else {
        if ($step >= 0) {
            throw new LogicException('Step must be -ve');
        }

        for ($i = $start; $i >= $limit; $i += $step) {
            yield $i;
        }
    }
}

echo 'Single digit odd numbers from range():  ';
foreach (range(1, 19, 2) as $number) {
    echo "$number ";
}
echo 'Single digit odd numbers from xrange(): ';

foreach (xrange(1, 19, 2) as $number) {
    echo "$number ";
}

function getRows($file)
{
    $handle = fopen($file, 'rb');
    if ($handle == false) {
        throw new Exception();
    }
    while (feof($handle) === false) {
        yield fgetcsv($handle);
    }
    fclose($handle);
}

foreach (getRows(__DIR__."/Array.php") as $row) {
    print_r($row);
}

$iterator = new ArrayIterator(['recipe' => 'pancakes', 'egg', 'milk', 'flour']);

var_dump(iterator_to_array($iterator, true));
var_dump(iterator_to_array($iterator, false));

function gen()
{
    echo "hello gen".PHP_EOL."\r\n";//step1
    $ret = (yield "gen1");   //step2
    echo $ret."\n";  //step3
    $ret = (yield "gen2");   //step4
    echo $ret."\n";  //step3
}

$my_gen = gen();
echo $my_gen->current();
echo $my_gen->send("main send");

echo "\n";
$input = <<<'EOF'
1;PHP;Likes dollar signs
2;Python;Likes whitespace
3;Ruby;Likes blocks
EOF;

function input_parser($input)
{
    foreach (explode("\n", $input) as $line) {
        $fields = explode(';', $line);
        $id = array_shift($fields);

        yield $id => $fields;
    }
}

foreach (input_parser($input) as $id => $fields) {
    echo "$id:\n";
    echo "    $fields[0]\n";
    echo "    $fields[1]\n";
}

function fib($n)
{
    $cur = 1;
    $prev = 0;
    for ($i = 0; $i < $n; $i++) {
        yield $cur;

        $temp = $cur;
        $cur = $prev + $cur;
        $prev = $temp;
    }
}

$fibs = fib(9);
foreach ($fibs as $fib) {
    echo " ".$fib;
}
