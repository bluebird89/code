package tdd;

public class GameNumber {
    private int i;

    public GameNumber(int i) {
        this.i = i;
    }

    public String toString1() {
        if (this.i % 3 == 0) {
            return "Fizz";
        } else if (this.i % 5 == 0) {
            return "Buzz";
        } else if (this.i % 3 == 0 && this.i % 5 == 0) {
            return "FizzBuzz";
        }

        return String.valueOf(this.i);
    }

    public String toString() {
        String rs = "";

        if (this.i % 3 == 0) {
            rs += "Fizz";
        }
        if (this.i % 5 == 0) {
            rs += "Buzz";
        }

        if (rs.equals("")) {
            rs = String.valueOf(this.i);
        }

        return rs;
    }

    public static void main(String[] args) {
        for (int i = 0; i < 100; i++) {
        }
    }
}
