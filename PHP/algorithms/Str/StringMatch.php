<?php


namespace Algorithms\Str;

class StringMatch
{
    public static function BF($main, $pattern)
    {
        $m = 0;
        for ($i = 0; $i < count($main) - count($pattern); $i++) {
            for ($j = 0, $jMax = count($pattern); $j < $jMax; $j++) {
                if ($main[$i] != $pattern[$j]) {
                    break;
                } else {
                    $m++;
                }
            }
        }
        if ($m == count($pattern)) {
            return true;
        }
        return false;
    }

    // $a 表示主串，$n 表示主串长度，$b 表示模式串，$m 表示模式串长度
    public static function KMP($a, $n, $b, $m)
    {
        $next = self::generateNexts($b, $m);   // 生成 next 数组
        $j = 0;
        for ($i = 0; $i < $n; $i++) {  // 遍历主串
            while ($j > 0 && $a[$i] != $b[$j]) {
                // 如果主串字符和模式串字符不相等，
                // 更新模式串坏字符下标位置为好前缀最长可匹配前缀子串尾字符下标+1
                // 然后从这个位置重新开始与主串匹配
                // 相当于前面提到的把模式串向后移动 j - k 位
                $j = $next[$j - 1] + 1;
            }
            if ($a[$i] == $b[$j]) {
                $j++;
            }
            if ($j == $m) {
                return $n - $m + 1;  // 全部相等，找到匹配位置
            }
        }
        return -1;
    }

    public function generateNexts(string $matchingStr): array
    {
        for ($i = 0, $iMax = strlen($matchingStr); $i < $iMax; $i++) {
            $substring = substr($matchingStr, 0, $i);
            $next[$i] = self::getNext($substring);
        }

        $next[0] = -1;

        return $next;
    }

    public function getNext(string $subString): int
    {
        $prefix = [];
        $suffix = [];
        for ($i = 1; $i <= strlen($subString) - 1; $i++) {
            $prefix[] = substr($subString, 0, $i);
        }

        for ($i = strlen($subString) - 1; $i > 0; $i--) {
            $suffix[] = substr($subString, -$i);
        }

        $suffix = array_reverse($suffix);
        $max = 0;
        for ($i = 0; $i < strlen($subString) - 2; $i++) {
            if ($prefix[$i] == $suffix[$i] && $i >= $max) {
                $max = $i + 1;
            }
        }

        return $max;
    }
}
