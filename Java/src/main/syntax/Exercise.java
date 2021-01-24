package syntax;

public class Exercise {
    public static void main(String[] args) {

        int a = 100;
        int b = 200;
        int c = 600;
        int max = a > b ? a : b;
        max = max > c ? max : c;
        System.out.println(c);

        // 第几年最好成绩
    }
}
