package algrithom;

public class Fib {

    static int fib(int n) {
        if (n <= 2) {
            return 1;
        }
        int a = 1;
        int b = 1;
        for (int i = 2; i < n; i++) {
            int c = a + b;
            a = b;
            b = c;
        }
        return b;
    }

    /**
     * 求 n 的阶乘
     *
     * @return int
     */
    public static int factorial(int n) {
        if (n == 1) {
            return 1;
        }

        return factorial(n - 1) * n;
    }

    /**
     * 跳 n 极台阶的跳法:一只青蛙可以一次跳 1 级台阶或一次跳 2 级台阶,跳上第 n 级台阶有多少种跳法
     */
    public static int f(int n) {
        if (n == 1) {
            return 1;
        }
        if (n == 2) {
            return 2;
        }
//		int[] map = {};
//		if (map.get(n)) {
//			return map.get(n);
//		}

        return f(n - 1) + f(n - 2);
    }

    public static int f1(int n) {
        if (n == 1) return 1;
        if (n == 2) return 2;

        int result = 0;
        int pre = 1;
        int next = 2;

        for (int i = 3; i < n + 1; i++) {
            result = pre + next;
            pre = next;
            next = result;
        }
        return result;
    }

    public static void main(String[] args) {
        System.out.println(fib(10));
        System.out.println(factorial(5));
        System.out.println(f(5));
        System.out.println(f1(5));
    }
}
