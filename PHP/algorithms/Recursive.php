<?php

class Recursive
{

    # 输入一个正整数n，输出n!的值。其中n!=123*…*n,即求阶乘
    public function factorial(int $n): int
    {
        if ($n === 1) {
            return 1;
        }
        return $n * self::factorial($n - 1);
    }

    # 一只青蛙可以一次跳 1 级台阶或一次跳 2 级台阶,例如:跳上第 1 级台阶只有一种跳法：直接跳 1 级,跳上第 2 级台阶 有两种跳法：每次跳 1 级，跳两次；或者一次跳 2 级
    # 问要跳上第 n 级台阶有多少种跳法？
    # 自上而下
    public $count = 0;

    public function step(int $floors)
    {
        if ($floors === 1 || $floors === 2) {
            $this->count++;
            return $floors;
        }

        return self::step($floors - 1) + self::step($floors - 2);
    }

    public static $middle = [];

    public function step1(int $floors)
    {
        if (isset(self::$middle[$floors]['value'])) {
            self::$middle[$floors]['count'] = isset(self::$middle[$floors]['count']) ? self::$middle[$floors]['count']++ : 1;
            return self::$middle[$floors]['value'];
        }

        if ($floors === 1 || $floors === 2) {
            self::$middle[$floors] = ['value' => $floors, 'count' => 1];
            return $floors;
        }

        $rs = self::Step1($floors - 1) + self::Step1($floors - 2);
        self::$middle[$floors]['value'] = $rs;

        return $rs;
    }

    # 自下而上:时间复杂度是 O(n), 而由于我们在计算过程中只定义了两个变量（pre，next），所以空间复杂度是O(1)
    public function step2(int $floors)
    {
        if ($floors === 1 || $floors === 2) {
            return $floors;
        }

        $result = 0;
        $pre = 1;
        $next = 2;

        for ($i = 3; $i < $floors + 1; $i++) {
            $result = $pre + $next;
            $pre = $next;
            $next = $result;
        }

        return $result;
    }

    public function fib($n)
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
}

$instance = new Recursive();
echo $instance->factorial(5).PHP_EOL;
echo $instance->step(6).'_'.$instance->count.PHP_EOL;
echo $instance->step1(6).PHP_EOL;
echo $instance->step2(6).PHP_EOL;

$fibs = $instance->fib(9);
foreach ($fibs as $fib) {
    echo " ".$fib;
}
