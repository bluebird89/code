package leetcode;

import main.algrithom.Difference;

import java.util.Arrays;

/**
 * 力扣第 1109 题「航班预订统计
 * <p>
 * 输入一个长度为n的数组nums，其中所有元素都是 0。再输入一个bookings，里面是若干三元组(i,j,k)，每个三元组的含义就是要求给nums数组的闭区间[i-1,j-1]中所有元素都加上k。请你返回最后的nums数组是多少？
 *
 * @author henry
 */
public class CorpFlightBookings {

    static int[] corpFlightBookings(int[][] bookings, int n) {
        // nums 初始化为全 0
        int[] nums = new int[n];
        // 构造差分解法
        Difference df = new Difference(nums);

        for (int[] booking : bookings) {
            // 注意转成数组索引要减一哦
            int i = booking[0] - 1;
            int j = booking[1] - 1;
            int val = booking[2];
            // 对区间 nums[i..j] 增加 val
            df.increment(i, j, val);
        }
        // 返回最终的结果数组
        return df.result();
    }

    public static void main(String[] args) {
        System.out.println(Arrays.toString(CorpFlightBookings.corpFlightBookings(new int[][]{{1, 2, 10}, {2, 3, 20}, {2, 5, 25}}, 5)));
    }
}
