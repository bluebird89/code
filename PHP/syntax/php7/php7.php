<?php

declare(strict_types=1);

namespace PHP7;

function sum(int ...$ints)
{
	return array_sum($ints);
}

print(sum(2, 3, 4)); # Fatal error

function returnIntValue(int $value): float
{
	return $value + 1.0;
}

print(returnIntValue(5));

$username = $_GET['username'] ?? $_POST['username'] ?? 'not passed'; # null合并运算符
print(1 <=> 1);
print("<br/>"); // 0
print(1 <=> 2);
print("<br/>"); // -1
print(2 <=> 1);
print("<br/>"); // 1

define('ALLOWED_IMAGE_EXTENSIONS', ['jpg', 'jpeg', 'gif', 'png']);

interface Logger
{
	public function log(string $msg);
}

class Application
{
	private $logger;

	public function getLogger(): Logger
	{
		return $this->logger;
	}

	public function setLogger(Logger $logger)
	{
		$this->logger = $logger;
	}
}

$app = new Application;
$app->setLogger(new class implements Logger {
	public function log(string $msg)
	{
		print($msg);
	}
});
$app->getLogger()->log("My first Log Message");

class A
{
	private $x = 1;
}

$value = function () {
	return $this->x;
};
print($value->call(new A));

class MyClass1
{
	public $obj1prop;
}

class MyClass2
{
	public $obj2prop;
}

$obj1 = new MyClass1();
$obj1->obj1prop = 1;
$obj2 = new MyClass2();
$obj2->obj2prop = 2;
$serializedObj1 = serialize($obj1);
$serializedObj2 = serialize($obj2);
$data = unserialize($serializedObj1, ["allowed_classes" => true]); // 不允许将所有的对象都转换为 __PHP_Incomplete_Class 对象
$data2 = unserialize($serializedObj2,
		["allowed_classes" => ["MyClass1", "MyClass2"]]); // 将除 MyClass 和 MyClass2 之外的所有对象都转换为 __PHP_Incomplete_Class 对象

$bytes = random_bytes(5);
print(bin2hex($bytes));
print(random_int(-1000, 0));

use AssertionError;
use com\yiibai\{ClassA, ClassB, ClassC as C};
use IntlChar;

printf('%x', IntlChar::CODEPOINT_MAX);
echo IntlChar::charName('@');
var_dump(IntlChar::ispunct('!'));

ini_set('assert.exception', 'true');

assert(false, new CustomError('Custom Error Message!'));

use Throwable;
use function com\yiibai\{fn_a, fn_b, fn_c};
use const com\yiibai\{ConstA, ConstB, ConstC};

$gen = (function () {
	yield 1;
	yield 2;

	return 3;
})();
foreach ($gen as $val) {
	echo $val, PHP_EOL;
}
echo $gen->getReturn(), PHP_EOL;
# output
//1
//2
//3

function gen()
{
	yield 1;
	yield 2;

	yield from gen2();
}

function gen2()
{
	yield 3;
	yield 4;
}

foreach (gen() as $val) {
	echo $val, PHP_EOL;
}
var_dump(intdiv(10, 3)); //3

//session_start([
//		'cache_limiter' => 'private',
//		'read_and_close' => true,
//]);

class MathOperations
{
	protected $n = 10;

	// Try to get the Division by Zero error object and display as Exception
	public function doOperation()
	{
		try {
			$value = $this->n % 0;
			return $value;
		} catch (DivisionByZeroError $e) {
			return $e->getMessage();
		}
	}
}
$mathOperationsObj = new MathOperations();
print($mathOperationsObj->doOperation());

echo "\u{aa}";// ª
echo "\u{0000aa}";// ª
echo "\u{9999}";// 香

//string preg_replace_callback_array(array $regexesAndCallbacks, string $input);
$tokenStream = []; // [tokenName, lexeme] pairs

$input = <<<'end'
$a = 3; // variable initialisation
end;

// Pre PHP 7 code
preg_replace_callback(
		[
				'~\$[a-z_][a-z\d_]*~i',
				'~=~',
				'~[\d]+~',
				'~;~',
				'~//.*~'
		],
		function ($match) use (&$tokenStream) {
			if (strpos($match[0], '$') === 0) {
				$tokenStream[] = ['T_VARIABLE', $match[0]];
			} elseif (strpos($match[0], '=') === 0) {
				$tokenStream[] = ['T_ASSIGN', $match[0]];
			} elseif (ctype_digit($match[0])) {
				$tokenStream[] = ['T_NUM', $match[0]];
			} elseif (strpos($match[0], ';') === 0) {
				$tokenStream[] = ['T_TERMINATE_STMT', $match[0]];
			} elseif (strpos($match[0], '//') === 0) {
				$tokenStream[] = ['T_COMMENT', $match[0]];
			}
		},
		$input
);

// PHP 7+ code
preg_replace_callback_array(
		[
				'~\$[a-z_][a-z\d_]*~i' => function ($match) use (&$tokenStream) {
					$tokenStream[] = ['T_VARIABLE', $match[0]];
				},
				'~=~' => function ($match) use (&$tokenStream) {
					$tokenStream[] = ['T_ASSIGN', $match[0]];
				},
				'~[\d]+~' => function ($match) use (&$tokenStream) {
					$tokenStream[] = ['T_NUM', $match[0]];
				},
				'~;~' => function ($match) use (&$tokenStream) {
					$tokenStream[] = ['T_TERMINATE_STMT', $match[0]];
				},
				'~//.*~' => function ($match) use (&$tokenStream) {
					$tokenStream[] = ['T_COMMENT', $match[0]];
				}
		],
		$input
);

function handler(Exception $e)
{
    echo 'hello';
}
set_exception_handler('handler');

// 兼容 PHP 5 和 7
function handler0($e)
{
	echo 'hello';
}

// 仅支持 PHP 7
function handler1(Throwable $e)
{
    echo 'hello';
}

list($a, $b, $c) = [1, 2, 3];
var_dump($a);//1
var_dump($b);//2
var_dump($c);//3

$array = [0, 1, 2];
foreach ($array as &$val) {
	var_dump(current($array));
}
?>
	#php 5
	int(1)
	int(2)
	bool(false)
	#php7
	int(0)
	int(0)
	int(0)

	var_dump("0x123" == "291");
	#php5
	true
	#php7
	false

	function fun() :?string
	{
	return null;
	}

	function fun1(?$a)
	{
	var_dump($a);
	}
	fun1(null);//null
	fun1('1');//1

	function fun() :void
	{
	echo "hello world";
	}

	function fun() :void
	{
	echo "hello world";
	}

	class Something
	{
	const PUBLIC_CONST_A = 1;
	public const PUBLIC_CONST_B = 2;
	protected const PROTECTED_CONST = 3;
	private const PRIVATE_CONST = 4;
	}

	function iterator(iterable $iter)
	{
	foreach ($iter as $val) {
	//
	}
	}

	try {
	// some code
	} catch (FirstException | SecondException $e) {
	// handle first and second exceptions
	}

	$data = [
	["id" => 1, "name" => 'Tom'],
	["id" => 2, "name" => 'Fred'],
	];

	// list() style
	list("id" => $id1, "name" => $name1) = $data[0];
	var_dump($id1);//1

	$a= "hello";
	$a[-2];//l

	<?php
class Test
{
	public function exposeFunction()
	{
		return Closure::fromCallable([$this, 'privateFunction']);
	}

	private function privateFunction($param)
	{
		var_dump($param);
	}
}

$privFunc = (new Test)->exposeFunction();
$privFunc('some value');

function test(object $obj): object
{
	return new SplQueue();
}
test(new StdClass());

//; ini file
//extension=php-ast
//zend_extension=opcache

abstract class B extends A
{
	// overridden - still maintaining contravariance for parameters and covariance for return
	abstract function test($s): int;
}

use Foo\Bar\{
		Foo,
		Bar,
		Baz,
};

var_dump(number_format(-0.01)); // now outputs string(1) "0" instead of string(2) "-0"

var_dump(get_class(null));// warning

echo count(1); // integers are not countable

// array to object
$arr = [0 => 1];
$obj = (object) $arr;
var_dump(
		$obj,
		$obj->{'0'}, // now accessible
		$obj->{0} // now accessible
);

array_map(fn(User $user) => $user->id, $users);


$username = $_GET['user'] ?? 'nobody';

# 7.4
$parts = ['apple', 'pear'];
$fruits = ['banana', 'orange', ...$parts, 'watermelon'];
var_dump($fruits);

$b = array_map(fn($n) => $n * $n * $n, [1, 2, 3, 4, 5]);
## 替换use
$factor = 10;
$calc = fn($num) => $num * $factor;

# ibraries/DisplayResults.php#1229  Trying to access array offset on value of type bool
// $str{0}; // 这种写法被废弃了
