package syntax;

import java.util.Scanner;

public class InOutput {
    public static void main(String[] args) {
        Scanner in = new Scanner(System.in);
        System.out.println("What's your name?");
        String name = in.nextLine();
        System.out.println("Hello " + name);
        System.out.println("How old are you?");
        String age = in.nextLine();
        System.out.println(name + " 's " + age + " years old.");
    }
}
