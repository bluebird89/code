<?php

# 以 $ 开头
# 变量名只支持字母（支持中文字符，不过尽量使用 ASCII 字符，以免出现意想不到的问题）、数字、下划线，并且不能以数字开头
$foo = 'Bob';
echo $foo . PHP_EOL;
printf("%s" . PHP_EOL, $foo);
print $foo . PHP_EOL;

# 引用传值:指向同一个地址
$bar = &$foo;
$foo = 'Henry';
echo $bar . PHP_EOL;
$bar = "Sam";
echo $foo . PHP_EOL;

## 可变变量
$greeting = "你好";
$varName = "greeting";
echo $$varName. PHP_EOL;

## 常量
define("LANGUAGE", "PHP");
const FRAMEWORK = "Laravel";
echo LANGUAGE . " " . FRAMEWORK;
