<?php

$catalog = [
    [1, 'Oracle Magazine'],
    [2, 'Java Magazine'],
    [3, 'PHP Magazine'],
];
echo "list() syntax";
echo "<br/>";

list($id1, $journal_name_1) = $catalog[0];
list($id2, $journal_name_2) = $catalog[1];
list($id3, $journal_name_3) = $catalog[2];
echo "Journal $id1 is $journal_name_1";
echo "<br/>";
echo "Journal $id2 is $journal_name_2";
echo "<br/>";
echo "Journal $id3 is $journal_name_3";
echo "<br/>";
echo "[] syntax";
echo "<br/>";

[$id1, $journal_name_1] = $catalog[0];
[$id2, $journal_name_2] = $catalog[1];
[$id3, $journal_name_3] = $catalog[2];
echo "Journal $id1 is $journal_name_1";
echo "<br/>";
echo "Journal $id2 is $journal_name_2";
echo "<br/>";
echo "Journal $id3 is $journal_name_3";
echo "<br/>";
echo "list() syntax";
echo "<br/>";

foreach ($catalog as list($id, $journal_name)) {
    echo "Journal $id is $journal_name";
    echo "<br/>";
}
echo "[] syntax";
echo "<br/>";
foreach ($catalog as [$id, $journal_name]) {
    echo "Journal $id is $journal_name";
    echo "<br/>";
}

class Catalog
{
    public $title;
    public $edition;
}

$Catalog1 = new Catalog();
$Catalog1->title = 'Oracle Magazine';
$Catalog1->edition = 'January-February2018';

$Catalog2 = new Catalog();
$Catalog2->title = 'Java Magazine';
$Catalog2->edition = 'March-April2018';
$catalogs = array($Catalog1, $Catalog2);
print_r(array_column($catalogs, 'title'));
print_r(array_column($catalogs, 'edition'));

printf('Unicode Version : ');
echo "<br/>";
echo IntlChar::UNICODE_VERSION;
echo "<br/>";
echo IntlChar::charFromName("LATIN CAPITAL LETTER B");
echo "<br/>";
var_dump(IntlChar::isdefined("\u{00C6}"));

var_dump(intdiv(4, 2));
var_dump(intdiv(5, 3));
var_dump(intdiv(-4, 2));
var_dump(intdiv(-7, 3));
var_dump(intdiv(4, -2));
var_dump(intdiv(5, -3));
var_dump(intdiv(-4, -2));
var_dump(intdiv(-5, -2));
var_dump(intdiv(PHP_INT_MAX, PHP_INT_MAX));
var_dump(intdiv(PHP_INT_MIN, PHP_INT_MIN));

echo "ABCDEF"[-1];
echo "<br/>";
echo strpos("aabbcc", "a", -6);
echo "<br/>";
echo strpos("abcdef", "c", -1);
echo "<br/>";
echo strpos("abcdef", "c", -5);
echo "<br/>";
echo substr("ABCDEF", -1);
echo "<br/>";
echo substr("ABCDEF", -2, 5);
echo "<br/>";
echo substr("ABCDEF", -7);
echo "<br/>";
echo substr("ABCDEF", -6);
echo "<br/>";
echo substr("ABCDEF", -5);
echo "<br/>";
echo substr("ABCDEF", 6);
echo "<br/>";
echo substr("abcdef", 1, -3);
echo "<br/>";
echo substr("abcdef", 3, -2);
echo "<br/>";
echo substr("abcdef", 4, -1);
echo "<br/>";
echo substr("abcdef", -5, -2);

var_dump(random_int(1, 99));
var_dump(random_int(-100, 0));
$bytes = random_bytes(10);
var_dump(bin2hex($bytes));

// usage of an associative array
$array = ['a' => 'A', 2 => 'B', 'c' => 'C'];
$firstKey = array_key_first($array);
$lastKey = array_key_last($array);
echo assert($firstKey === 'a');
echo "<br/>";
echo $firstKey;
echo "<br/>";
echo $lastKey;
echo "<br/>";
// usage of an empty array
$array = [];
$firstKey = array_key_first($array);
$lastKey = array_key_last($array);
echo "<br/>";
echo assert($firstKey === null);
echo "<br/>";
echo assert($lastKey === null);

bcscale(3);
echo bcscale();

try {
    $arr = array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => NAN);
    echo json_encode($arr, JSON_THROW_ON_ERROR);

    $json = '{"a":1,"b":2,"c":3,"d":4,"e":5}';
    echo json_decode("{", false, 1, JSON_THROW_ON_ERROR);
} catch (\JsonException $exception) {
    echo $exception->getMessage(); // echoes "Syntax error"
}
