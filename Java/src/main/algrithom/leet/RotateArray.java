package main.algrithom.leet;


import java.util.Arrays;

public class RotateArray {
    /**
     * 给定一个数组，将数组中的元素向右移动 k 个位置，其中 k 是非负数
     */
    public static void rotate(int[] nums, int k) {
        int N = nums.length;
        k %= N;
        reverse(nums, 0, N);
        reverse(nums, 0, k);
        reverse(nums, k, N);
    }

    static void reverse(int[] nums, int begin, int end) {
        for (int i = begin, j = end - 1; i < j; i++, j--) {
            int temp = nums[i];
            nums[i] = nums[j];
            nums[j] = temp;
        }
    }

    /**
     * LeetCode 151 - Reverse Words in a String
     * todo
     * 将字符串中的单词顺序进行反转。例如：
     *
     * 输入："the sky is blue"
     * 输出："blue is sky the"
     */

    /**
     * LeetCode 504 - Base 7[6]（Easy）
     *
     * 给定一个整数，将其转化为7进制，并以字符串形式输出。
     */

    /**
     * LeetCode 415 - Add Strings[5]（Easy）
     * <p>
     * 计算两个字符串形式的非负整数的和。
     */

    public static void main(String[] args) {
        int[] nums = new int[]{5, 4, 3, 2, 1};
        rotate(nums, 3);
        System.out.println(Arrays.toString(nums));
    }
}
