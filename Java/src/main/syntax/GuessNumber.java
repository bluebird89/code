package syntax;

import java.util.Scanner;

public class GuessNumber {

    public static void main(String[] args) {
        Scanner in = new Scanner(System.in);

        int totalGameCount = 0;
        int totalCorrectCount = 0;

        System.out.println("Please input Min munber:");
        int rangeStart = Integer.parseInt(in.nextLine());
        System.out.println("Please input Max munber:");
        int rangEnd = Integer.parseInt(in.nextLine());

        System.out.println("Please input you chances number:");
        int guessTotal = Integer.parseInt(in.nextLine());

        System.out.println("Want leave game[y/N]:");
        String charIsleave = in.nextLine();

        while (!charIsleave.equals("y")) {
            for (int i = 0; i <= guessTotal; i++) {
                int randomNum = (int) (Math.random() * 100 % (rangEnd - rangeStart) + rangeStart);

                System.out.println("Please input Your Guess(range + " + rangeStart + "-" + rangEnd + "):");
                System.out.println("Your left " + (guessTotal - i) + " Chances");
                int userGuess = Integer.parseInt(in.nextLine());

                if (randomNum == userGuess) {
                    System.out.println("Bingo!");
                    totalCorrectCount = totalCorrectCount + 1;
                } else {
                    System.out.println("Sorry, The right number's " + randomNum + ". try again");
                }
                totalGameCount = totalGameCount + 1;
                break;
            }

            System.out.println("Sorry, your chances has run out. Your have play " + totalGameCount + " times," + "correct " + totalCorrectCount + " times.");
        }
        System.out.println("Game is over");
    }
}
