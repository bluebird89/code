<?php


namespace Algorithms\Sort;

class Heap extends AbstractSort
{
    public static function sort(array $arr)
    {
        if (!is_array($arr)) {
            return false;
        }
        global $len;
        $len = count($arr);
        if ($len <= 1) {
            return $arr;
        }

        for ($i = $len; $i >= 0; $i--) {
            self::heapify($arr, $i);
        }

        return $arr;
    }

    public static function heapify($arr, $i)
    {
        $left = 2 * $i + 1;
        $right = 2 * $i + 2;
        $largest = $i;

        global $len;
        if ($left < $len && $arr[$left] > $arr[$largest]) {
            $largest = $left;
        }
        if ($right < $len && $arr[$right] > $arr[$largest]) {
            $largest = $right;
        }
        if ($largest != $i) {
            self::arraySwap($arr, $i, $largest);
            self::heapify($arr, $largest);
        }
    }

    /**
     * 构建堆
     *
     * @param  [array] $arr  [待排序无序数组]
     * @param  [int] $start [第一个需要调整的非叶子节点]
     * @param  [int] $len  [元素个数]
     *
     * @return void
     */
    function heapAdjust(&$arr, $start, $len)
    {
        for ($child = $start * 2 + 1; $child < $len; $child = $child * 2 + 1) {
            //左节点小于右节点
            if ($child != $len - 1 && $arr[$child] < $arr[$child + 1]) {
                $child++;  //此时子节点指向右子节点
            }
            //满足大顶（根）堆
            if ($arr[$start] >= $arr[$child]) {
                break;
            }
            //和子节点进行交换
            list($arr[$start], $arr[$child]) = array($arr[$child], $arr[$start]);
            $start = $child;
        }
    }

    /**
     * [heapSort 堆排序实现]
     *
     * @param  [array] $arr [待排序的无序数组]
     *
     * @return void
     */
    function heapSort(&$arr)
    {
        /**
         * 将待排序数组构建成一个大顶（根）堆
         * 构建说明：从最后（下）一个非叶子节点，比较当前节点和子节点，找到最小的点，进行交换，
         * 循环向堆顶递进，最后就形成了一个大顶（根）堆
         */
        $len = count($arr);
        //第一次构建堆，我们从第一个非叶子节点开始调整一直循环到根节点为止，则构造完成
        for ($i = ($len >> 1) - 1; $i >= 0; $i--) {
            heapAdjust($arr, $i, $len);
        }
        for ($i = $len - 1; $i >= 0; $i--) {
            //交换根顶和根尾元素
            list($arr[0], $arr[$i]) = array($arr[$i], $arr[0]);
            //调整堆，我们只需要从根节点开始向下调整
            heapAdjust($arr, 0, $i);
        }
    }
}
