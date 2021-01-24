package syntax;

public class MathE {
    public static void main(String[] args) {
        int i1 = 128;  // 装箱，相当于 Integer.valueOf(128);
        int t = i1; //相当于 i1.intValue() 拆箱

        // 当两个 Integer 变量的数值超出 -128 ~ 127 范围时, 变量使用了不同地址：
        Integer a = 123;
        Integer b = 123;
        // a == b;        // 输出 true
        a.equals(b);  // 输出 true

        a = 1230;
        b = 1230;
        // a == b;        // 输出 false
        a.equals(b);  // 输出 true

        System.out.println("90 度的正弦值：" + Math.sin(Math.PI / 2)); // 1.0
        System.out.println("0度的余弦值：" + Math.cos(0)); // 1.0
        System.out.println("60度的正切值：" + Math.tan(Math.PI / 3)); // 1.7320508075688767
        System.out.println("1的反正切值： " + Math.atan(1)); // 0.7853981633974483
        System.out.println("π/2的角度值：" + Math.toDegrees(Math.PI / 2)); // 90.0
        System.out.println(Math.PI);

        Integer x = 5;
        x.byteValue(); // 5
        x.doubleValue(); // 5.0
        x.longValue(); // 5

        Math.random();

        x.compareTo(3); // 1
        x.compareTo(5); // 0
        x.compareTo(8); // -1

        Integer x1 = 5;
        Integer y = 10;
        Integer z = 5;
        Short a1 = 5;
        x1.equals(y); // false
        x1.equals(z); // true
        x1.equals(a1); // false

        Integer x2 = Integer.valueOf(9);
        Double c = Double.valueOf(5);
        Float a2 = Float.valueOf("80");
        Integer b1 = Integer.valueOf("444", 16);   // 使用 16 进制
        System.out.println(x2); // 9
        System.out.println(c); // 5.0
        System.out.println(a2); // 80.0
        System.out.println(b1); // 1092

        x.toString(); // 5
        Integer.toString(12); // 12

        int x3 = Integer.parseInt("9"); // 9
        double c3 = Double.parseDouble("5"); // 5.0
        int b3 = Integer.parseInt("444", 16); // 1092

        Integer a3 = -8;
        double d = -100;
        float f = -90;
        System.out.println(Math.abs(a3));
        System.out.println(Math.abs(d));
        System.out.println(Math.abs(f));

        // Math.floor(-1.5) = -2.0;
        // Math.round(-1.5) = -1;
        // Math.ceil(-1.5) = -1.0;
        // Math.floor(-1.6) = -2.0;
        // Math.round(-1.6) = -2;
        // Math.ceil(-1.6) = -1.0;

        double d1 = 100.675;
        double e = 100.500;
        double f1 = 100.200;

        Math.rint(d1); // 101.0
        Math.rint(e); // 100.0
        Math.rint(f1); // 100.0
        Math.min(12.123, 12.456); // 12.123
        Math.max(12.123, 12.456); // 12.456

        // Math.E; // 2.7183
        Math.exp(11.635); // 112983.831
        Math.log(11.635); // 2.454
        Math.pow(11.635, 2.760); // 874.008
        Math.sqrt(11.635); // 3.411
        Math.sin(45.0); // 0.7071
        Math.tan(45.0); // 1.0000
        Math.atan2(45.0, 30.0); // 0.982793723247329
        Math.toDegrees(30.0); // 1718.8733853924698
        Math.toRadians(30.0); // 0.5235987755982988
        float floatVar = (float) 3.4545E34;
        int intVar = 56;
        String stringVar = "asfasfsdf";

        System.out.printf("浮点型变量的值为 " +
                "%f, 整型变量的值为 " +
                " %d, 字符串变量的值为 " +
                "is %s", floatVar, intVar, stringVar);
    }
}
