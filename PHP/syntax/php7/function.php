<?php

class A
{
}

echo is_countable(['A', 'B', 3]);
echo "<br/>";
echo is_countable(new ArrayIterator());
echo "<br/>";
if (!is_countable(new A())) {
    echo "Not countable";
}
echo "<br/>";

$array = ['A', 'B', 3];
if (is_countable($array)) {
    var_dump(count($array));
}


$name = "John";
$fn1 = fn($msg) => $msg.' '.$name;
var_export($fn1("Hello"));//'Hello John'

$fn = fn($msg1) => fn($msg2) => $msg1.' '.$msg2.' '.$name;
var_export($fn("Hello")("Hi"));

$name = "John";
$x = 1;
//Arrow function includes parameter type, return type and default value
$fn = fn(string $msg='Hi'): string => $msg.' '.$name;
//Arrow function includes a variadic.
$fn2 = fn(...$x) => $x;
//The arrow function includes by-reference variable passing
$fn3=fn(&$x) => $x++;
$fn3($x);
echo $x; // 2
var_export($fn("Hello"));//'Hello John'
var_export($fn());//'Hi John'
var_export($fn2(1,2,3)); //array ( 0 => 1, 1 => 2, 2 => 3, )

class A1 {
    public function fn1() {
        $fn = fn() => var_dump($this);
        $fn(); //  object(A)#1 (0) { }
        $fn = static fn() => var_dump($this);
//        $fn(); //Uncaught Error: Using $this when not in object context

    }
}
$a=new A1();
$a->fn1();
