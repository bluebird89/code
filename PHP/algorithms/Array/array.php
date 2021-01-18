<?php

$array = [1, 2, 3, 4, 5];
$mixedArray = [];
$mixedArray[0] = 200;
$mixedArray['name'] = "Mixed array";
$mixedArray[1] = 10.65;
$mixedArray[2] = ['I', 'am', 'another', 'array'];


$startMemory = memory_get_usage();

$array = [10, 20, 30, 40, 50];
$array[] = 70;
$array[] = 80;

$array[10] = 100;
$array[21] = 200;
$array[29] = 300;
$array[500] = 1000;
$array[1001] = 10000;
$array[71] = 1971;

$arraySize = count($array);
for ($i = 0; $i < $arraySize; $i++) {
    if (!empty($array[$i])) {
        echo "Position ".$i." holds the value ".$array[$i]."\n";
    }
}

foreach ($array as $index => $value) {
    if ($index) {
        echo "Position ".$index." holds the value ".$value."\n";
    }
}

echo memory_get_usage() - $startMemory, " bytes\n";


$studentInfo = [];
$studentInfo['Name'] = "Adiyan";
$studentInfo['Age'] = 11;
$studentInfo['Class'] = 6;
$studentInfo['RollNumber'] = 71;
$studentInfo['Contact'] = "info@adiyan.com";

foreach ($studentInfo as $key => $value) {
    echo $key.": ".$value."\n";
}


$players = [];
$players[] = ['Name' => "Ronaldo", "Age" => 31, "Country" => "Portugal", "Team" => "Real Madrid"];
$players[] = ['Name' => "Messi", "Age" => 27, "Country" => "Argentina", "Team" => "Barcelona"];
$players[] = ['Name' => "Neymar", "Age" => 24, "Country" => "Brazil", "Team" => "Barcelona"];
$players[] = ['Name' => "Rooney", "Age" => 30, "Country" => "England", "Team" => "Man United"];

foreach ($players as $index => $playerInfo) {
    echo "Info of player # ".($index + 1)."\n";
    foreach ($playerInfo as $key => $value) {
        echo $key.": ".$value."\n";
    }
    echo "\n";
}

$startTime = microtime();
$startMemory = memory_get_usage();
$array = []; // new SplFixedArray(10000);
//$array = range(1, 100000);
for ($i = 0; $i < 10000; $i++) {
    $array[$i] = $i;
}
echo memory_get_usage() - $startMemory, ' bytes'.PHP_EOL;
echo microtime() - $startTime, ' nano second';

$graph = [];
$nodes = ['A', 'B', 'C', 'D', 'E'];
foreach ($nodes as $xNode) {
    foreach ($nodes as $yNode) {
        $graph[$xNode][$yNode] = 0;
    }
}

$graph["A"]["B"] = 1;
$graph["B"]["A"] = 1;
$graph["A"]["C"] = 1;
$graph["C"]["A"] = 1;
$graph["A"]["E"] = 1;
$graph["E"]["A"] = 1;
$graph["B"]["E"] = 1;
$graph["E"]["B"] = 1;
$graph["B"]["D"] = 1;
$graph["D"]["B"] = 1;

foreach ($nodes as $xNode) {
    foreach ($nodes as $yNode) {
        echo $graph[$xNode][$yNode]."\t";
    }
    echo "\n";
}
