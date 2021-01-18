<?php


namespace Algorithms\Sort;

require '../../vendor/autoload.php';

class Insertion extends AbstractSort
{
    public static function sort(array $arr)
    {
        if (!is_array($arr)) {
            return false;
        }
        $len = count($arr);
        if ($len <= 1) {
            return $arr;
        }
        for ($i = 1; $i < $len; $i++) {
            $j = $i - 1;
            $current = $arr[$i];
            // 循环不一样写法，思路一样，while 中可以叠加多个判断条件
            while ($j >= 0 && $arr[$j] > $current) {
                $arr[$j + 1] = $arr[$j];
                --$j;
            }
            $arr[$j + 1] = $current;
        }

        return $arr;
    }

    static function insertionSort(array &$arr)
    {
        $len = count($arr);
        for ($i = 1; $i < $len; $i++) {
            $key = $arr[$i];
            $j = $i - 1;

            while ($j >= 0 && $arr[$j] > $key) {
                $arr[$j + 1] = $arr[$j];
                $j--;
            }
            $arr[$j + 1] = $key;
        }
    }
}

$arr = [20, 45, 93, 67, 10, 97, 52, 88, 33, 92];

Insertion::insertionSort($arr);
echo implode(",", $arr);
