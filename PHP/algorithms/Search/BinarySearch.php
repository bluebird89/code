<?php

namespace Algorithms\Search;

include '../../vendor/autoload.php';

class BinarySearch
{
    public static function binary_search($nums, $num)
    {
        return self::binary_search_internal($nums, $num, 0, count($nums) - 1);
    }

    public static function binary_search_first($nums, $num)
    {
        return self::binary_search_internal($nums, $num, 0, count($nums) - 1);
    }

    public static function binary_search_last($nums, $num)
    {
        return self::binary_search_internal_last($nums, $num, 0, count($nums) - 1);
    }

    /**
     * @param $nums
     * @param $num
     * @param $low
     * @param $high
     *
     * @return false|float|int
     */
    public function binary_search_internal($nums, $num, $low, $high)
    {
        if ($low > $high) {
            return -1;
        }

        $mid = floor(($low + $high) / 2);
        if ($num > $nums[$mid]) {
            return self::binary_search_internal($nums, $num, $mid + 1, $high);
        }

        if ($num < $nums[$mid]) {
            return self::binary_search_internal($nums, $num, $low, $mid - 1);
        }

        return $mid;
    }

    public function binary_search_internal_first($nums, $num, $low, $high)
    {
        if ($low > $high) {
            return -1;
        }

        $mid = floor(($low + $high) / 2);

        /**
         * 查找第一个值等于给定值的元素（数组中包含重复数据）
         * 如果此时 $mid 位置已经到了序列的最左边，不能再往左了，或者序列中索引小于 $mid 的上一个元素值不等于待查找元素值，那么此时 $mid 就是第一个等于待查找元素值的位置；否则还要继续往前找。
         */
        if ($num < $nums[$mid]) {
            return self::binary_search_internal_first($nums, $num, $low, $mid - 1);
        }

        if ($num > $nums[$mid]) {
            return self::binary_search_internal_first($nums, $num, $mid + 1, $high);
        }

        if ($mid == 0 || $nums[$mid - 1] != $num) {
            return $mid;
        }

        return self::binary_search_internal_first($nums, $num, $low, $mid - 1);
    }

    public function binary_search_internal_last($nums, $num, $low, $high)
    {
        if ($low > $high) {
            return -1;
        }

        $mid = floor(($low + $high) / 2);

//         查找最后一个等于给定值的元素
        // $mid 位置到了序列的最右边，不能再往后了，或者索引大于 $mid 的后一个元素值不等于带查找元素，才返回 $mid，否则，还要继续往后找
        if ($num < $nums[$mid]) {
            return self::binary_search_internal_last($nums, $num, $low, $mid - 1);
        }

        if ($num > $nums[$mid]) {
            return self::binary_search_internal_last($nums, $num, $mid + 1, $high);
        }

        if ($mid == count($nums) - 1 || $nums[$mid + 1] != $num) {
            return $mid;
        }

        return self::binary_search_internal_last($nums, $num, $mid + 1, $high);
    }

    /**
     * 二分查找变形版：查找第一个大于等于给定值的元素（数组中包含重复数据）
     */
    public static function binary_search_not_smaller_first($nums, $num)
    {
        if (count($nums) <= 1) {
            return 0;
        }
        return self::binary_search_internal_bigger_first($nums, $num, 0, count($nums) - 1);
    }

    public function binary_search_internal_bigger_first($nums, $num, $low, $high)
    {
        if ($low > $high) {
            return -1;
        }

        $mid = floor(($low + $high) / 2);
        if ($num <= $nums[$mid]) {
            if ($mid == 0 || $nums[$mid - 1] < $num) {
                return $mid;
            }

            return self::binary_search_internal_bigger_first($nums, $num, $low, $mid - 1);
        }

        if ($num > $nums[$mid]) {
            return self::binary_search_internal_bigger_first($nums, $num, $mid + 1, $high);
        }
    }

    /**
     * 二分查找变形版：查找最后一个小于等于给定值的元素（数组中包含重复数据）
     */
    public static function binary_search_smaller_last($nums, $num)
    {
        if (count($nums) <= 1) {
            return 0;
        }
        return self::binary_search_internal_smaller_last($nums, $num, 0, count($nums) - 1);
    }

    public function binary_search_internal_smaller_last($nums, $num, $low, $high)
    {
        if ($low > $high) {
            return -1;
        }

        $mid = floor(($low + $high) / 2);
        if ($num >= $nums[$mid]) {
            if ($mid == count($nums) - 1 || $nums[$mid + 1] > $num) {
                return $mid;
            } else {
                return self::binary_search_internal_smaller_last($nums, $num, $mid + 1, $high);
            }
        } elseif ($num < $nums[$mid]) {
            return self::binary_search_internal_smaller_last($nums, $num, $low, $mid - 1);
        }
    }

    static function binarySearch(array $numbers, int $needle): bool
    {
        $low = 0;
        $high = count($numbers) - 1;

        while ($low <= $high) {
            $mid = (int) (($low + $high) / 2);
            if ($numbers[$mid] > $needle) {
                $high = $mid - 1;
            } elseif ($numbers[$mid] < $needle) {
                $low = $mid + 1;
            } else {
                return true;
            }

        }

        return false;
    }

    //  含有重复数据的数组,搜索直到元素第一次出现的位置
    static function repetitiveBinarySearch(array $data, int $needle)
    {
        $low = 0;
        $high = count($data);
        $firstIndex = -1;

        while ($low <= $high) {
            $middle = ($low + $high) >> 1;

            if ($data[$middle] === $needle) {
                $firstIndex = $middle;
                $high = $middle - 1;
            } elseif ($data[$middle] > $needle) {
                $high = $middle - 1;
            } else {
                $low = $middle + 1;
            }
        }

        return $firstIndex;
    }

    static function binarySearch1(array $numbers, int $needle, int $low, int $high): bool
    {
        if ($high < $low) {
            return false;
        }
        $mid = (int) (($low + $high) / 2);
        if ($numbers[$mid] > $needle) {
            return self::binarySearch($numbers, $needle, $low, $mid - 1);
        } else {
            if ($numbers[$mid] < $needle) {
                return self::binarySearch($numbers, $needle, $mid + 1, $high);
            } else {
                return true;
            }
        }
    }
}

$numbers = range(1, 200, 5);

$number = 31;
if (BinarySearch::binarySearch($numbers, $number) !== false) {
    echo "$number Found \n";
} else {
    echo "$number Not found \n";
}
if (BinarySearch::binarySearch1($numbers, $number, 0, count($numbers) - 1) !== false) {
    echo "$number Found \n";
} else {
    echo "$number Not found \n";
}

$number = 500;
if (BinarySearch::binarySearch($numbers, $number) !== false) {
    echo "$number Found \n";
} else {
    echo "$number Not found \n";
}
if (BinarySearch::binarySearch1($numbers, $number, 0, count($numbers) - 1) !== false) {
    echo "$number Found \n";
} else {
    echo "$number Not found \n";
}

$numbers = [1, 2, 2, 2, 2, 2, 2, 2, 2, 3, 3, 3, 3, 3, 4, 4, 5, 5];

$number = 2;
$pos = BinarySearch::repetitiveBinarySearch($numbers, $number);
if ($pos >= 0) {
    echo "$number Found at position $pos \n";
} else {
    echo "$number Not found \n";
}

$number = 5;
$pos = BinarySearch::repetitiveBinarySearch($numbers, $number);
if ($pos >= 0) {
    echo "$number Found at position $pos \n";
} else {
    echo "$number Not found \n";
}
