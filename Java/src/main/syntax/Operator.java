package syntax;

public class Operator {
    public static void main(String[] args) {
        // calc
        System.out.println(5 + 6);
        System.out.println(5 - 6);
        System.out.println(5 * 6);
        System.out.println(5 / 6.0);
        System.out.println(5 / 6);
        int e = 5;
        double f = 6.0;
        System.out.println(e / f);

        System.out.println("e++=" + e++);
        System.out.println("e=" + e);
        int t = 10;
        System.out.println("t++=" + ++t);
        System.out.println("t=" + t);

        int num = 10;
        System.out.println(num % -6);
        System.out.println(num >> 2);

        // compare
        System.out.println(1 > 2);
        System.out.println(1 < 2);

        // boolean || 前面条件优化
        // logic
        // bit | 和　& 交集
        int a = 0xF8;
        int b = 0xF4;
        int c = 0xFF;
        System.out.println(a & b);
        System.out.println(a | b);
        System.out.println(a ^ b);
        System.out.println(~c);

        // bitshift
        int d = 0x400;
        System.out.println(d);
        System.out.println(d >> 1);
        System.out.println(d >> 2);
        System.out.println(d << 1);
        System.out.println(d << 2);
        System.out.println(-0x400 >>> 1);
        System.out.println(-0x400 >>> 2);

        int base = 1;
        int is_student_mask = base << 1;
        int is_painter_mask = base << 2;
        int is_driver_mask = base << 3;
        boolean isStudent = (5 & is_student_mask) != 0;
        boolean isPainter = (5 & is_painter_mask) != 0;
        boolean isDriver = (5 & is_driver_mask) != 0;
        System.out.println(isStudent);
        System.out.println(isPainter);
        System.out.println(isDriver);
        // 优先级：赋值－》布尔－》比较－》计算
    }
}
