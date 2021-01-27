package leetcode;

/**
 * 1
 */
public class TwoSum {

    public static int[] twoSum(int[] nums, int target) {

        for (int i = 0; i < nums.length; i++) {

            int another = target - nums[i];
            for (int j = i + 1; j < nums.length; j++) {
                if (nums[j] == another) {
                    return new int[]{i, j};
                }
            }
        }

        return new int[2];
    }

    public static void main(String[] args) {
        int[] res = twoSum(new int[]{0, 4, 3, 0}, 0);
        for (int re : res) {
            System.out.println(re);
        }
    }
}
