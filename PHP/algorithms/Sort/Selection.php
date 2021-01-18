<?php


namespace Algorithms\Sort;

require '../../vendor/autoload.php';

class Selection extends AbstractSort
{
    public static function sort(array $nums)
    {
        if (!is_array($nums)) {
            return false;
        }
        $len = count($nums);
        if ($len <= 1) {
            return $nums;
        }

        $iMax = count($nums);
        for ($i = 0; $i < $iMax; $i++) {
            $min = $i;
            for ($j = $i + 1; $j < $iMax; $j++) {
                if ($nums[$j] < $nums[$min]) {
                    $min = $j;
                }
            }
            if ($min != $i) {
                static::arraySwap($nums, $i, $min);
            }
        }
        return $nums;
    }

    public static function sort2($nums)
    {
        $iMax = count($nums);
        for ($i = 0; $i < $iMax - 1; $i++) {
            for ($j = ($i + 1); $j < $iMax; $j++) {
                if ($nums[$i] > $nums[$j]) {
                    //前面逻辑一致，只要有小的就换位，上面方法标记最小 换位一次
                    self::arraySwap($nums, $i, $j);
                }
            }
        }

        return $nums;
    }

    static function selectionSort(array $arr): array
    {
        $len = count($arr);
        for ($i = 0; $i < $len; $i++) {
            $min = $i;
            for ($j = $i + 1; $j < $len; $j++) {
                if ($arr[$j] > $arr[$min]) {
                    $min = $j;
                }
            }

            if ($min != $i) {
                $tmp = $arr[$i];
                $arr[$i] = $arr[$min];
                $arr[$min] = $tmp;
            }
        }
        return $arr;
    }
}

$arr = [20, 45, 93, 67, 10, 97, 52, 88, 33, 92];

$sortedArray = Selection::selectionSort($arr);
echo implode(",", $sortedArray);
