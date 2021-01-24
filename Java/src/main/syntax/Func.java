package syntax;

public class Func {

    public static int add(int... numbers) {
        int sum = 0;
        for (int num : numbers) {
            sum += num;
        }
        return sum;
    }

    public static void main(String[] args) {
        int sum = add(1, 2, 3, 4, 5, 6);
        System.out.println(sum);
    }
}
