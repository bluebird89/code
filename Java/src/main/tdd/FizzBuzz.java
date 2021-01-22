package tdd;

/**
 * @author henry
 */
public class FizzBuzz {

    public static void main(String[] args) {
        FizzBuzz1();
    }

    public static void FizzBuzz1() {
        for (int i = 0; i < 200; i++) {
            String result = handleSingleDigit357(i);
            if (result.equals("")) {
                result = String.valueOf(i);
            }

            System.out.println(result);
        }
    }

    public static String handleSingleDigit357(int i) {
        String result = "";
        String s = String.valueOf(i);
        if (i % 3 == 0 || s.contains("3")) {
            result += "Fizz";
        }
        if (i % 5 == 0 || s.contains("5")) {
            result += "Buzz";
        }
        if (i % 7 == 0 || s.contains("7")) {
            result += "Whizz";
        }

        return result;
    }
}
