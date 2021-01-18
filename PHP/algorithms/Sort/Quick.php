<?php

namespace Algorithms\Sort;

include '../../vendor/autoload.php';

class Quick extends AbstractSort
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
        $left = $right = [];

        for ($i = 1; $i < $len; $i++) {
            if ($arr[$i] < $arr[0]) {
                $left[] = $arr[$i];
            } else {
                $right[] = $arr[$i];
            }
        }

        $left = self::sort($left);
        $right = self::sort($right);

        return array_merge($left, [$arr[0]], $right);
    }

    public static function quick_sort($nums)
    {
        if (count($nums) <= 1) {
            return $nums;
        }

        static::quick_sort_c($nums, 0, count($nums) - 1);
        return $nums;
    }

    public static function quick_sort_c(&$nums, $p, $r)
    {
        if ($p >= $r) {
            return;
        }

        $q = static::partition($nums, $p, $r);
        static::quick_sort_c($nums, $p, $q - 1);
        static::quick_sort_c($nums, $q + 1, $r);
    }

    // 寻找pivot
    public static function partition(&$nums, $p, $r)
    {
        $pivot = $nums[$r];
        $i = $p;
        for ($j = $p; $j < $r; $j++) {
            // 原理：将比$pivot小的数丢到[$p...$i-1]中，剩下的[$i..$j]区间都是比$pivot大的
            if ($nums[$j] < $pivot) {
                $temp = $nums[$i];
                $nums[$i] = $nums[$j];
                $nums[$j] = $temp;
                $i++;
            }
        }

        // 最后将 $pivot 放到中间，并返回 $i
        $temp = $nums[$i];
        $nums[$i] = $pivot;
        $nums[$r] = $temp;

        return $i;
    }

    static function quickSort(array &$arr, int $p, int $r)
    {
        if ($p < $r) {
            $q = self::partition1($arr, $p, $r);
            self::quickSort($arr, $p, $q);
            self::quickSort($arr, $q + 1, $r);
        }
    }

    static function partition1(array &$arr, int $p, int $r)
    {
        $pivot = $arr[$p];
        $i = $p - 1;
        $j = $r + 1;

        while (true) {
            do {
                $i++;
            } while ($arr[$i] < $pivot && $arr[$i] != $pivot);

            do {
                $j--;
            } while ($arr[$j] > $pivot && $arr[$j] != $pivot);

            if ($i < $j) {
                $temp = $arr[$i];
                $arr[$i] = $arr[$j];
                $arr[$j] = $temp;
            } else {
                return $j;
            }
        }
    }

}

$arr = [20, 45, 93, 67, 10, 97, 52, 88, 33, 92];
Quick::quickSort($arr, 0, count($arr) - 1);
echo implode(",", $arr);
