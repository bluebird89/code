<?php


namespace Algorithms\Sort;

include '../../vendor/autoload.php';

/**
 * Class Bubble
 * 冒泡排序:序列中的最大值插到已排序序列的最前面，这个过程就像冒泡一样
 *
 * @package Algorithms\sort
 */
class Bubble extends AbstractSort
{
    public static function sort($nums): array
    {
        if (!is_array($nums)) {
            return [];
        }

        $len = count($nums);
        if ($len <= 1) {
            return $nums;
        }
        $iMax = count($nums);

        // 外层控制执行次数
        for ($i = 0; $i < $iMax; $i++) {
            //置位没有意义:n-i 次没有换位生效
//            $flag = false;
            // 内层比较范围[0 ~ n-i) j 与j+1 比较, 次数 n-1 n-2 1
            for ($j = 0; $j < ($iMax - $i - 1); $j++) {
                if ($nums[$j] > $nums[$j + 1]) {
                    self::arraySwap($nums, $j, $j + 1);
//                    $flag = true;
                }
            }
//            if (!$flag) {
//                break;
//            }
        }

        return $nums;
    }

    function bubbleSort1(array $arr): array
    {
        $count = 0;
        $len = count($arr);

        for ($i = 0; $i < $len; $i++) {
            for ($j = 0; $j < $len - 1; $j++) {
                $count++;
                if ($arr[$j] > $arr[$j + 1]) {
                    $tmp = $arr[$j + 1];
                    $arr[$j + 1] = $arr[$j];
                    $arr[$j] = $tmp;
                }
            }
        }
        echo $count."\n";
        return $arr;
    }

    function bubbleSort2(array $arr): array
    {
        $len = count($arr);
        $count = 0;

        for ($i = 0; $i < $len; $i++) {
            $swapped = false;
            for ($j = 0; $j < $len - 1; $j++) {
                $count++;
                if ($arr[$j] > $arr[$j + 1]) {
                    $tmp = $arr[$j + 1];
                    $arr[$j + 1] = $arr[$j];
                    $arr[$j] = $tmp;
                    $swapped = true;

                }
            }
            if (!$swapped) {
                break;
            }
        }
        echo $count."\n";
        return $arr;
    }

    function bubbleSort3(array $arr): array
    {
        $len = count($arr);
        $count = 0;

        for ($i = 0; $i < $len; $i++) {
            $swapped = false;
            for ($j = 0; $j < $len - $i - 1; $j++) {
                $count++;
                if ($arr[$j] > $arr[$j + 1]) {
                    $tmp = $arr[$j + 1];
                    $arr[$j + 1] = $arr[$j];
                    $arr[$j] = $tmp;
                    $swapped = true;

                }
            }
            if (!$swapped) {
                break;
            }
        }
        echo $count."\n";
        return $arr;
    }

    function bubbleSort4(array $arr): array
    {
        $len = count($arr);
        $count = 0;
        $bound = $len - 1;

        for ($i = 0; $i < $len; $i++) {
            $swapped = false;
            $newBound = 0;
            for ($j = 0; $j < $bound; $j++) {
                $count++;
                if ($arr[$j] > $arr[$j + 1]) {
                    $tmp = $arr[$j + 1];
                    $arr[$j + 1] = $arr[$j];
                    $arr[$j] = $tmp;
                    $swapped = true;
                    $newBound = $j;

                }
            }
            $bound = $newBound;

            if (!$swapped) {
                break;
            }
        }
        echo $count."\n";
        return $arr;
    }

}

$arr = [20, 45, 93, 67, 10, 97, 52, 88, 33, 92];
$sortedArray = Bubble::sort($arr);
echo implode(",", $sortedArray);
