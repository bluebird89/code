<?php

//简洁 大量入栈出栈操作 自顶向下（由 n 到 1）
function fact_0(int $n): int
{
    if ($n == 0) {
        return 1;
    }

    return $n * fact_0($n - 1);
}

echo fact_0(10).PHP_EOL;

// 自底向上
function fact_1(int $n): int
{
    $result = 1;
    $num = 1;
    while ($num <= $n) {
        $result = $result * $num;
        $num = $num + 1;
    }

    return $result;
}

echo fact_1(10).PHP_EOL;

// 查表法 使用数组存储计算结果中的每一位（由低到高位），通过相乘进位的方式依次计算每一位的结果
// 适用于高精度的大数阶乘场合，缺点就是对于小数阶乘而言，计算过程复杂且速度慢
function fact_2(int $n): array
{
    $result = [1];

    $num = 1;
    while ($num <= $n) {
        $carry = 0;

        for ($index = 0; $index < count($result); $index++) {
            $tmp = $result[$index] * $num + $carry;
            $result[$index] = $tmp % 10;
            $carry = floor($tmp / 10);
        }

        while ($carry > 0) {
            $result[] = $carry % 10;
            $carry = floor($carry / 10);
        }

        $num = $num + 1;
    }

    return $result;
}

var_dump(fact_2(10));

// BCMath 扩展方法
function fact_3(int $n): string
{
    $result = '1';
    $num = '1';
    while ($num <= $n) {
        $result = bcmul($result, $num);
        $num = bcadd($num, '1');
    }

    return $result;
}

echo fact_3(10).PHP_EOL;

function fact_4(int $n): string
{
    $middleSquare = pow(floor($n / 2), 2);
    $result = $n & 1 == 1 ? 2 * $middleSquare * $n : 2 * $middleSquare;
    $result = (string) $result;
    for ($num = 1; $num < $n - 2; $num = $num + 2) {
        $middleSquare = $middleSquare - $num;
        $result = bcmul($result, (string) $middleSquare);
    }

    return $result;
}

echo fact_4(10);
