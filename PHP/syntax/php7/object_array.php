<?php
$obj = (object) array(
    'journal' => 'Oracle Magazine', 'publisher' => 'Oracle Publishing', 'edition' => 'January February 2018'
);
echo $obj->{'journal'};
echo "<br/>";
echo $obj->{'publisher'};
echo "<br/>";
echo $obj->{'edition'};
echo "<br/>";
var_dump(isset($obj->{'journal'}));
echo "<br/>";
var_dump(key($obj));
next($obj);
echo "<br/>";
var_dump(isset($obj->{'publisher'}));
echo "<br/>";
var_dump(key($obj));
next($obj);
echo "<br/>";
var_dump(isset($obj->{'edition'}));
echo "<br/>";
var_dump(key($obj));
echo "<br/>";
echo $obj->journal;
echo "<br/>";
echo $obj->publisher;
echo "<br/>";
echo $obj->edition;
echo "<br/>";
if ($obj instanceof stdClass) {
    echo '$obj is instance of built-in class stdClass';
    echo "<br/>";
}
$obj = (object) 'hello';
echo $obj->scalar;
echo "<br/>";
if ($obj instanceof stdClass) {
    echo '$obj is instance of built-in class stdClass';
}

//object_instance_of
class A
{
}

$A = new A;
echo '<br/>';
if ($A instanceof stdClass) {
    echo '$A is instance of built-in class stdClass';
} else {
    echo '$A is not instance of built-in class stdClass';
}
echo '<br/>';
echo '<br/>';
$AObj = (object) $A;
if ($AObj instanceof stdClass) {
    echo '$AObj is instance of built-in class stdClass';
} else {
    echo '$AObj is not instance of built-in class stdClass';
}
echo '<br/>';

//  object_empty


$obj1 = (object) (new class {
}); // 实例化匿名类
$obj2 = (object) []; // 将空数组转换为对象

$A = new A();  // 空类的实例
var_dump($A);
echo "<br/>";
var_dump($obj1);
echo "<br/>";
var_dump($obj2);
echo "<br/>";
echo empty ($obj1);
echo "<br/>";
$obj1 = null;
$obj3 = (object) $obj1;// NULL转换为对象
var_dump($obj3);
echo "<br/>";
echo empty ($A);
echo "<br/>";
echo empty ($obj2);
echo "<br/>";
echo empty ($obj3);


