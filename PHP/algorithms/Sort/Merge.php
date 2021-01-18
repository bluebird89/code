<?php

namespace Algorithms\Sort;

include '../../vendor/autoload.php';

class Merge extends AbstractSort
{
    public static function sort($arr)
    {
        if (!is_array($arr)) {
            return false;
        }
        $len = count($arr);
        if ($len <= 1) {
            return $arr;
        }

        $mid = $len >> 1;
        $left = array_slice($arr, 0, $mid);
        $right = array_slice($arr, $mid);
        $left = static::sort($left);
        $right = static::sort($right);

        if (end($left) <= $right[0]) {
            $arr = array_merge($left, $right);
        } else {
            for ($i = 0, $j = 0, $k = 0; $k <= $len - 1; $k++) {
                if ($i >= $mid && $j < $len - $mid) {
                    $arr[$k] = $right[$j++];
                    echo $right[$j - 1];
                } elseif ($j >= $len - $mid && $i < $mid) {
                    $arr[$k] = $left[$i++];
                    echo $left[$i - 1];
                } elseif ($left[$i] <= $right[$j]) {
                    $arr[$k] = $left[$i++];

                    echo $left[$i - 1];
                } else {
                    $arr[$k] = $right[$j++];
                    echo $right[$j - 1];
                }
            }
        }

        return $arr;
    }

    public static function merge_sort($nums)
    {
        if (count($nums) <= 1) {
            return $nums;
        }

        static::merge_sort_c($nums, 0, count($nums) - 1);
        return $nums;
    }

    // 递归
    private static function merge_sort_c(&$nums, $p, $r): void
    {
        if ($p >= $r) {
            return;
        }

        $q = floor(($p + $r) / 2);
        static::merge_sort_c($nums, $p, $q);
        static::merge_sort_c($nums, $q + 1, $r);

        static::merge($nums, ['start' => $p, 'end' => $q], ['start' => $q + 1, 'end' => $r]);
    }

    public static function merge(&$nums, $nums_p, $nums_q)
    {
        $temp = [];
        $i = $nums_p['start'];
        $j = $nums_q['start'];
        $k = 0;
        while ($i <= $nums_p['end'] && $j <= $nums_q['end']) {
            if ($nums[$i] <= $nums[$j]) {
                $temp[$k++] = $nums[$i++];
            } else {
                $temp[$k++] = $nums[$j++];
            }
        }

        if ($i <= $nums_p['end']) {
            for (; $i <= $nums_p['end']; $i++) {
                $temp[$k++] = $nums[$i];
            }
        }

        if ($j <= $nums_q['end']) {
            for (; $j <= $nums_q['end']; $j++) {
                $temp[$k++] = $nums[$j];
            }
        }

        for ($x = 0; $x < $k; $x++) {
            $nums[$nums_p['start'] + $x] = $temp[$x];
        }
    }

    static function mergeSort(array $arr): array
    {
        $len = count($arr);
        $mid = (int) $len / 2;
        if ($len == 1) {
            return $arr;
        }

        $left = self::mergeSort(array_slice($arr, 0, $mid));
        $right = self::mergeSort(array_slice($arr, $mid));

        return self::merge1($left, $right);
    }

    static function merge1(array $left, array $right): array
    {
        $combined = [];
        $countLeft = count($left);
        $countRight = count($right);
        $leftIndex = $rightIndex = 0;

        while ($leftIndex < $countLeft && $rightIndex < $countRight) {
            if ($left[$leftIndex] > $right[$rightIndex]) {
                $combined[] = $right[$rightIndex];
                $rightIndex++;
            } else {
                $combined[] = $left[$leftIndex];
                $leftIndex++;
            }
        }
        while ($leftIndex < $countLeft) {
            $combined[] = $left[$leftIndex];
            $leftIndex++;
        }
        while ($rightIndex < $countRight) {
            $combined[] = $right[$rightIndex];
            $rightIndex++;
        }

        return $combined;
    }
}

$arr = [20, 45, 93, 67, 10, 97, 52, 88, 33, 92];
$arr = Merge::mergeSort($arr);
echo implode(",", $arr);
