package main.algrithom;

import java.util.ArrayList;
import java.util.Collections;
import java.util.LinkedList;
import java.util.List;

public class BackTrack {

    /**
     * LeetCode 46 - Permutations 给定一个不重复的数字集合，返回其所有可能的全排列
     */
    static List<List<Integer>> res = new LinkedList<>();
    static int result = 0;

    static List<List<Integer>> permute(int[] nums) {
        // track 记录「路径」
        LinkedList<Integer> track = new LinkedList<>();
        backtrack(nums, track);
        return res;
    }

    static void backtrack(int[] nums, LinkedList<Integer> track) {
        // 结束条件：nums 中的元素全都在 track 中出现
        if (track.size() == nums.length) {
            res.add(new LinkedList(track));
            return;
        }

        for (int num : nums) {
            if (track.contains(num)) {
                continue;
            }
            // 选择列表：nums 中不存在于 track 的那些元素
            // 做选择
            track.add(num);
            // 进入下一层决策树
            backtrack(nums, track);
            // 取消选择
            track.removeLast();
        }
    }

    static int findTargetSumWays(int[] nums, int target) {
        if (nums.length == 0) {
            return 0;
        }
        backtrack(nums, 0, target);
        return result;
    }

    static void backtrack(int[] nums, int i, int rest) {
        // base case
        if (i == nums.length) {
            if (rest == 0) {
                // 说明恰好凑出 target
                result++;
            }
            return;
        }
        // 给 nums[i] 选择 - 号
        rest += nums[i];
        // 穷举 nums[i + 1]
        backtrack(nums, i + 1, rest);
        // 撤销选择
        rest -= nums[i];

        // 给 nums[i] 选择 + 号
        rest -= nums[i];
        // 穷举 nums[i + 1]
        backtrack(nums, i + 1, rest);
        // 撤销选择
        rest += nums[i];
    }

    public static void main(String[] args) {
        int[] nums = new int[]{1, 2, 3};

        System.out.print(permute(nums));
        // list<Integer>
        System.out.print(permute(nums));
        System.out.print(findTargetSumWays(nums, 4));

    }

    public List<List<Integer>> permute(List<Integer> nums) {
        List<Integer> current = new ArrayList<>(nums);
        List<List<Integer>> res = new ArrayList<>();
        backtrack(current, 0, res);
        return res;
    }

    // current[0..k) 是已选集合， current[k..N) 是候选集合
    void backtrack(List<Integer> current, int k, List<List<Integer>> res) {
        if (k == current.size()) {
            res.add(new ArrayList<>(current));
            return;
        }
        // 从候选集合中选择
        for (int i = k; i < current.size(); i++) {
            // 选择数字 current[i]
            Collections.swap(current, k, i);
            // 将 k 加一
            backtrack(current, k + 1, res);
            // 撤销选择
            Collections.swap(current, k, i);
        }
    }
}
