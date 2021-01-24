package syntax;

public class Control {
    public static void main(String[] args) {
        int divided = 100;
        int divisor = 3;

        int x = 30;
        if (x == 10) {
            System.out.print("Value of X is 10");
        } else if (x == 20) {
            System.out.print("Value of X is 20");
        } else if (x == 30) {
            System.out.print("Value of X is 30");
        } else {
            System.out.print("这是 else 语句");
        }

        char grade = 'C';
        switch (grade) {
            case 'A':
                System.out.println("优秀");
                break;
            case 'B':
            case 'C':
                System.out.println("良好");
                break;
            case 'D':
                System.out.println("及格");
            case 'F':
                System.out.println("你需要再努力努力");
                break;
            default:
                System.out.println("未知等级");
        }

        while (x < 20) {
            System.out.print("value of x : " + x);
            x++;
            System.out.print("\n");
        }

        do {
            System.out.print("value of x : " + x);
            x++;
            System.out.print("\n");
        } while (x < 20);

        String[] names = {"James", "Larry", "Tom", "Lacy"};
        for (String name : names) {
            System.out.print(name);
            System.out.print(",");
        }

        for (int i = 0, found = 0; i < 100 && found < 10; i++, divided++) {
            if (divided % divisor == 0) {
                System.out.println(divided + "可以整除" + divisor + "商为：" + (divided / divisor));
                found++;

            }
        }

        for (int i = 1; i < 10; i++) {
            String str = "";
            for (int j = 1; j <= i; j++) {
                str += j + "x" + i + "=" + i * j + "\t";
            }
            System.out.println(str);
        }
// 生成范围内随机数：生成区间段内随机值值
        for (int i = 1; i < 10; i++) {
            System.out.println((int) (Math.random() * (90 - 60) + 60));
            System.out.println((int) (Math.random() * 90 * 100 % (90 - 60) + 60));
        }

    }
}
