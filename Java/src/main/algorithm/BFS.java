package algorithm;

import algorithm.data_structure.TreeNode;

import java.util.ArrayDeque;
import java.util.ArrayList;
import java.util.List;
import java.util.Queue;

public class BFS {
    /**
     * leetcdoe 102: 二叉树层序遍历
     * 给定一个二叉树，返回其按层序遍历得到的节点值。层序遍历即逐层地、从左到右访问所有结点。
     */

    public List<List<Integer>> levelOrder(TreeNode root) {
        // 最终的层序遍历结果
        List<List<Integer>> res = new ArrayList<>();
        Queue<TreeNode> queue = new ArrayDeque<>();

        if (root != null) {
            queue.add(root);
        }
        while (!queue.isEmpty()) {
            int n = queue.size();
            // 记录每一层
            List<Integer> level = new ArrayList<>();
            // 遍历当前层节点
            for (int i = 0; i < n; i++) {
                TreeNode node = queue.poll();
                level.add(node.value);
                // 队首节点的左右子节点入队,由于 levelNum
                // 是在入队前算的，所以入队的左右节点并不会在当前层被遍历到
                if (node.left != null) {
                    queue.add(node.left);
                }
                if (node.right != null) {
                    queue.add(node.right);
                }
            }
            res.add(level);
        }

        return res;
    }
}
