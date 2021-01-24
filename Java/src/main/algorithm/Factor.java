package main.algrithom;

public class Factor {
    private static final long LONG_MAX = 9999;

    /**
     * 输入一个非负整数n，请你计算阶乘n!的结果末尾有几个 0
     *
     * @param n
     * @return
     */
    static int trailingZeroes(int n) {
        int res = 0;
        for (int d = n; d / 5 > 0; d = d / 5) {
            res += d / 5;
        }
        return res;
    }

    /**
     * 输入一个非负整数K，请计算有多少个n，满足n!的结果末尾恰好有K个 0
     */
    static long preimageSizeFZF(int K) {
        // 左边界和右边界之差 + 1 就是答案
        return right_bound(K) - left_bound(K) + 1;
    }

    /* 搜索 trailingZeroes(n) == K 的左侧边界 */
    static long left_bound(int target) {
        long lo = 0, hi = LONG_MAX;
        while (lo < hi) {
            long mid = lo + (hi - lo) / 2;
            if (trailingZeroes((int) mid) < target) {
                lo = mid + 1;
            } else if (trailingZeroes((int) mid) > target) {
                hi = mid;
            } else {
                hi = mid;
            }
        }

        return lo;
    }

    /* 搜索 trailingZeroes(n) == K 的右侧边界 */
    static long right_bound(int target) {
        long lo = 0, hi = LONG_MAX;
        while (lo < hi) {
            long mid = lo + (hi - lo) / 2;
            if (trailingZeroes((int) mid) < target) {
                lo = mid + 1;
            } else if (trailingZeroes((int) mid) > target) {
                hi = mid;
            } else {
                lo = mid + 1;
            }
        }

        return lo - 1;
    }

    public static void main(String[] args) {
        int res = trailingZeroes(125);
        System.out.println(res);

        long res1 = preimageSizeFZF(2);
        System.out.println(res1);
    }
}
