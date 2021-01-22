<?php

namespace syntax\Closure;

// Closure {
//     __construct ( void )
//     public static Closure bind (Closure $closure , object $newthis [, mixed $newscope = 'static' ])
//     public Closure bindTo (object $newthis [, mixed $newscope = 'static' ])
// }

use syntax\Closure\Animal;

$cat = function () {
    return $this->cat;
};
$bindCat = \Closure::bind($cat, new Animal(), 'Animal');
$bindCat2 = \Closure::bind($cat, new Animal(), new Animal());
echo $bindCat().PHP_EOL;
echo $bindCat2().PHP_EOL;

//不能通过 $this 访问静态变量
$dog = static function () {
    return Animal::$dog;
};
$bindDog = \Closure::bind($dog, null, 'Animal');
$bindDog2 = \Closure::bind($dog, null, new Animal());
echo $bindDog().PHP_EOL;
echo $bindDog2().PHP_EOL;

$pig = function () {
    return $this->pig;
};
$bindPig = \Closure::bind($pig, new Animal(), 'Animal');
$bindPig2 = \Closure::bind($pig, new Animal(), new Animal());
echo $bindPig().PHP_EOL;
echo $bindPig2().PHP_EOL;

//不能通过 类名::私有静态变量，只能通过self|static,在类里面访问私有静态变量
$duck = static function () {
    return self::$duck; // return static::$duck
};
$bindDuck = \Closure::bind($duck, null, 'Animal');
$bindDuck2 = \Closure::bind($duck, null, new Animal());
echo $bindDuck().PHP_EOL;
echo $bindDuck2().PHP_EOL;

$closure = function ($name) {
    return 'Hello '.$name."\n";
};
echo $closure('闭包');


class invoke
{
    function __construct()
    {
        echo '初始化'.PHP_EOL;
    }

    function __invoke($a)
    {
        $this->param = '我想改变param的值';
        return $this;
    }

    public function test()
    {
        echo "test".PHP_EOL;
    }

    public $param = 222;
}

$obj = new invoke;

$data = $obj('我是invoke传递的值');

var_dump($data->param);

// An example callback function
function my_callback_function()
{
    echo 'hello world!';
}

// An example callback method
class MyClass
{
    static function myCallbackMethod()
    {
        echo 'Hello World!';
    }
}

// Type 1: Simple callback
call_user_func('my_callback_function');
// Type 2: Static class method call
call_user_func(array('MyClass', 'myCallbackMethod'));
// Type 3: Object method call
$obj = new MyClass();
call_user_func(array($obj, 'myCallbackMethod'));
// Type 4: Static class method call (As of PHP 5.2.3)
call_user_func('MyClass::myCallbackMethod');
// Type 5: Relative static class method call (As of PHP 5.3.0)
call_user_func(array('B', 'parent::who')); // A
// Type 6: Objects implementing __invoke can be used as callables (since PHP 5.3)
class C
{
    public function __invoke($name)
    {
        echo 'Hello ', $name, "\n";
    }
}

$c = new C();
call_user_func($c, 'PHP!');

$double = function ($a) {
    return $a * 2;
};

// This is our range of numbers
$numbers = range(1, 5);

// Use the closure as a callback here to
// double the size of each element in our
// range
$new_numbers = array_map($double, $numbers);

print implode(' ', $new_numbers);

class Hello
{
    private function getMsg()
    {
        echo "Hello";
    }
}

$getMsg = function () {
    return $this->getMsg();
};
echo $getMsg->call(new Hello);
