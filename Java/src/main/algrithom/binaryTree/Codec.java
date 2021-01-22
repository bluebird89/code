package algrithom.binaryTree;

import algrithom.data_structure.TreeNode;

import java.util.Arrays;
import java.util.LinkedList;
import java.util.Queue;

public class Codec {

    // 字典序法
    public static final int COMBINATION_CNT = 5;        // 组合中需要被选中的个数
    static String SEP = ",";
    static String NULL = "#";

    /**
     * 字符串反序列化为二叉树结构
     */
    static TreeNode deserialize_mid(String data) {
        if (data.isEmpty()) return null;
        String[] nodes = data.split(SEP);
        // 第一个元素就是 root 的值
        TreeNode root = new TreeNode(Integer.parseInt(nodes[0]));

        // 队列 q 记录父节点，将 root 加入队列
        Queue<TreeNode> q = new LinkedList<>();
        q.offer(root);

        for (int i = 1; i < nodes.length; ) {
            // 队列中存的都是父节点
            TreeNode parent = q.poll();
            // 父节点对应的左侧子节点的值
            String left = nodes[i++];
            if (!left.equals(NULL)) {
                parent.left = new TreeNode(Integer.parseInt(left));
                q.offer(parent.left);
            } else {
                parent.left = null;
            }
            // 父节点对应的右侧子节点的值
            String right = nodes[i++];
            if (!right.equals(NULL)) {
                parent.right = new TreeNode(Integer.parseInt(right));
                q.offer(parent.right);
            } else {
                parent.right = null;
            }
        }
        return root;
    }

    /**
     * 反转二叉树
     *
     * @param root
     * @return
     */
    static TreeNode invertTree(TreeNode root) {
        if (root == null) {
            return null;
        }
        TreeNode left = invertTree(root.left);
        TreeNode right = invertTree(root.right);
        root.left = left;
        root.right = right;

        return root;
    }

    /**
     * 细胞分裂:有一个细胞,每一个小时分裂一次，一次分裂一个子细胞，第三个小时后会死亡。那么n个小时候有多少细胞？
     *
     * @param n
     * @return
     */
    public static int allCells(int n) {
        return aCell(n) + bCell(n) + cCell(n);
    }

    /**
     * 第 n 小时 a 状态的细胞数
     */
    public static int aCell(int n) {
        if (n == 1) {
            return 1;
        } else {
            return aCell(n - 1) + bCell(n - 1) + cCell(n - 1);
        }
    }

    /**
     * 第 n 小时 b 状态的细胞数
     */
    public static int bCell(int n) {
        if (n == 1) {
            return 0;
        } else {
            return aCell(n - 1);
        }
    }

    /**
     * 第 n 小时 c 状态的细胞数
     */
    public static int cCell(int n) {
        if (n == 1 || n == 2) {
            return 0;
        } else {
            return bCell(n - 1);
        }
    }

    public static void swap(int[] arr, int i, int j) {
        int t = arr[i];
        arr[i] = arr[j];
        arr[j] = t;
    }

    public static void combination(int[] arr, int k, int[] select) {
        // 终止条件1：开始选取的数组索引 超出数组范围了
        if (k >= arr.length) {
            return;
        }

        // int selectNum = selectedNum(select);
        // 终止条件2：选中的元素已经等于我们要选择的数组个数了
        // if (selectNum == COMBINATION_CNT) {
        // 	for (int j = 0; j < select.length; j++) {
        // 		if (select[j] == 1) {
        // 			System.out.print(arr[j]);
        // 		}
        // 	}
        // 	System.out.print("\n");
        // } else {
        // 	// 第 k 位被选中
        // 	select[k] = 1;
        // 	combination(arr, k + 1, select);
        //
        // 	// 第 k 位未被选中
        // 	select[k] = 0;
        // 	// 则从第 k+1 位选择 COMBINATION_CNT - selectNum 个元素
        // 	combination(arr, k + 1, select);
        // }
    }

    // 递归

    public static void main(String[] args) {
//		System.out.println(deserialize_mid("c"));
        int n = 10;
        System.out.println(allCells(10));
        // System.out.println(permutation(new int[]{1, 2, 3, 4}, 2));
    }

    /**
     * 二叉树序列化为字符串
     */
    String serialize(TreeNode root) {
        StringBuilder sb = new StringBuilder();
        serialize(root, sb);
        return sb.toString();
    }

    /* 辅助函数，将二叉树存入 StringBuilder */
    void serialize(TreeNode root, StringBuilder sb) {
        if (root == null) {
            sb.append(NULL).append(SEP);
            return;
        }

        /****** 前序遍历位置 ******/
        sb.append(root.value).append(SEP);
        /***********************/

        serialize(root.left, sb);
        serialize(root.right, sb);
    }

    /**
     * 将字符串反序列化为二叉树结构
     */
    TreeNode deserialize(String data) {
        // 将字符串转化成列表
        LinkedList<String> nodes = new LinkedList<>();
        for (String s : data.split(SEP)) {
            nodes.addLast(s);
        }

        return deserialize(nodes);
    }

    /* 辅助函数，通过 nodes 列表构造二叉树 */
    TreeNode deserialize(LinkedList<String> nodes) {
        if (nodes.isEmpty()) {
            return null;
        }

        /****** 前序遍历位置 ******/
        // 列表最左侧就是根节点
        String first = nodes.removeFirst();
        if (first.equals(NULL)) {
            return null;
        }
        TreeNode root = new TreeNode(Integer.parseInt(first));
        /***********************/

        root.left = deserialize(nodes);
        root.right = deserialize(nodes);

        return root;
    }

    /**
     * 后序遍历
     *
     * @return
     */
    /* 辅助函数，将二叉树存入 StringBuilder */
    void serialize_back(TreeNode root, StringBuilder sb) {
        if (root == null) {
            sb.append(NULL).append(SEP);
            return;
        }

        serialize(root.left, sb);
        serialize(root.right, sb);

        /****** 后序遍历位置 ******/
        sb.append(root.value).append(SEP);
        /***********************/
    }

    /* 辅助函数，通过 nodes 列表构造二叉树 */
    TreeNode deserialize_back(LinkedList<String> nodes) {
        if (nodes.isEmpty()) return null;
        // 从后往前取出元素
        String last = nodes.removeLast();
        if (last.equals(NULL)) return null;
        TreeNode root = new TreeNode(Integer.parseInt(last));
        // 限构造右子树，后构造左子树
        root.right = deserialize(nodes);
        root.left = deserialize(nodes);

        return root;
    }

    /**
     * 中序遍历
     * root 值被夹在两棵子树的中间，也就是在 nod的中间，我们不知道确切的索引位置，所以无法找到 root 节点，也就无法进行反序列化
     */

    /* 辅助函数，将二叉树存入 StringBuilder */
    void serialize_mid(TreeNode root, StringBuilder sb) {
        if (root == null) {
            sb.append(NULL).append(SEP);
            return;
        }

        serialize(root.left, sb);
        /****** 中序遍历位置 ******/
        sb.append(root.value).append(SEP);
        /***********************/
        serialize(root.right, sb);
    }

    /**
     * 层级遍历
     * 将二叉树序列化为字符串
     */
    String serialize_layer(TreeNode root) {
        if (root == null) return "";
        StringBuilder sb = new StringBuilder();
        // 初始化队列，将 root 加入队列
        Queue<TreeNode> q = new LinkedList<>();
        q.offer(root);

        while (!q.isEmpty()) {
            TreeNode cur = q.poll();

            /* 层级遍历代码位置 */
            if (cur == null) {
                sb.append(NULL).append(SEP);
                continue;
            }
            sb.append(cur.value).append(SEP);
            /*****************/

            q.offer(cur.left);
            q.offer(cur.right);
        }

        return sb.toString();
    }

    /**
     * 汉诺塔:从左到右有A、B、C三根柱子，其中A柱子上面有从小叠到大的n个圆盘，现要求将A柱子上的圆盘移到C柱子上去，期间只有一个原则：一次只能移到一个盘子且大盘子不能在小盘子上面，求移动的步骤和移动的次数
     * 将 n 个圆盘从 a 经由 b 移动到 c 上
     *
     * @param a
     */
    public void hanoid(int n, char a, char b, char c) {
        if (n <= 0) {
            return;
        }
        // 将上面的  n-1 个圆盘经由 C 移到 B
        hanoid(n - 1, a, c, b);
        // 此时将 A 底下的那块最大的圆盘移到 C
//		move(a, c);
        // 再将 B 上的 n-1 个圆盘经由A移到 C上
        hanoid(n - 1, b, a, c);
    }

    /**
     * 1, 2, 3 这三个数字的全排列有多少种
     *
     * @param arr 代表全排列数字组成的数组
     * @param k   代表第几位
     */
    public void permutation(int[] arr, int k) {
        // 当 k 指向最后一个元素时,递归终止，打印此时的排列排列
        if (k == arr.length - 1) {
            System.out.println(Arrays.toString(arr));
        } else {
            for (int i = k; i < arr.length; i++) {
                // 将 k 与之后的元素 i 依次交换,然后可以认为选中了第 k 位
                swap(arr, k, i);
                // 第 k 位选择完成后，求剩余元素的全排列
                permutation(arr, k + 1);
                // 这一步很关键：将 k 与 i 换回来，保证是初始的顺序
                swap(arr, k, i);
            }
        }
    }

    /**
     * @param arr 当前排列
     * @return boolean 如果还有下一个全排列数，则返回 true, 否则返回 false
     */
    public boolean next_permutation(int[] arr) {
        int beforeIndex = 0; //记录从右到左寻找第一个左邻小于右邻的数对应的索引
        int currentIndex;
        boolean isAllReverse = true;    // 是否存在从右到左第一个左邻小于右邻的数对应的索引
        // 1. 从右到左（从个位数往高位数）寻找第一个左邻小于右邻的数
        for (currentIndex = arr.length - 1; currentIndex > 0; --currentIndex) {
            beforeIndex = currentIndex - 1;
            if (arr[beforeIndex] < arr[currentIndex]) {
                isAllReverse = false;
                break;
            }
        }
        //如果不存在，说明这个数已经是字典排序法里的最大值，此时已经找到所有的全排列了,直接打印即可
        if (isAllReverse) {
            return false;
        } else {
            // 2. 再从右往左找第一个比第一步找出的数更大的数的索引
            int firstLargeIndex = 0;
            for (firstLargeIndex = arr.length - 1; firstLargeIndex > beforeIndex; --firstLargeIndex) {
                if (arr[firstLargeIndex] > arr[beforeIndex]) {
                    break;
                }
            }
            // 3. 交换 上述 1, 2 两个步骤中得出的两个数
            swap(arr, beforeIndex, firstLargeIndex);
            // 4. 对 beforeIndex 之后的数进行排序，这里用了快排
            // quicksort(arr, beforeIndex + 1, arr.length);
            return true;
        }
    }
}

