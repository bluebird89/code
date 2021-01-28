package algorithm;

import algorithm.data_structure.TreeNode;

import java.util.ArrayList;
import java.util.List;
import java.util.Stack;

class DFS {

    private static final List<List<Integer>> TRAVERSAL_LIST = new ArrayList<>();

    private static void DFS(TreeNode root, int level) {
        if (root == null) {
            return;
        }

        if (TRAVERSAL_LIST.size() < level + 1) {
            TRAVERSAL_LIST.add(new ArrayList<>());
        }

        List<Integer> levelList = TRAVERSAL_LIST.get(level);
        levelList.add(root.value);

        // 遍历左结点
        DFS(root.left, level + 1);

        // 遍历右结点
        DFS(root.right, level + 1);
    }

    /**
     * 使用栈来实现 dfs
     */
    public static void dfsWithStack(TreeNode root) {
        if (root == null) {
            return;
        }

        Stack<TreeNode> stack = new Stack<>();
        // 先把根节点压栈
        stack.push(root);
        while (!stack.isEmpty()) {
            TreeNode treeNodes = stack.pop();
            // 遍历节点
            process(treeNodes);

            if (treeNodes.right != null) {
                stack.push(treeNodes.right);
            }

            if (treeNodes.left != null) {
                stack.push(treeNodes.left);
            }
        }
    }

    private static void process(TreeNode treeNodes) {
    }

    /**
     * leetcode 111: 求树的最小深度
     *
     * @return
     */
    public static int getMinDepth(TreeNode LinkNode) {
        if (LinkNode == null) {
            return 0;
        }
        int leftDepth = getMinDepth(LinkNode.left) + 1;
        int rightDepth = getMinDepth(LinkNode.right) + 1;

        return Math.min(leftDepth, rightDepth);
    }

    /**
     * leetcode 104: 求树的最大深度
     *
     * @param Nodes
     * @return
     */
    public int getMaxDepth(TreeNode linkNode) {
        if (linkNode == null) {
            return 0;
        }
        int leftDepth = getMaxDepth(linkNode.left) + 1;
        int rightDepth = getMaxDepth(linkNode.right) + 1;

        return Math.max(leftDepth, rightDepth);
    }

    /**
     * leetcdoe 102: 二叉树的层序遍历, 使用 dfs
     *
     * @param root
     */

}
