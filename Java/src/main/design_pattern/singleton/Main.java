package design_pattern.singleton;

public class Main {
    public static void main(String[] args) {
        Singleton obj1 = Singleton.getInstance();
        Singleton obj2 = Singleton.getInstance();

        if (obj1 == obj2) {
            System.out.println("两个实例相同");
        } else {
            System.out.println("两个实例不同");
        }

        System.out.println(TicketMaker.getInstance().getNextTicketNumber());
        System.out.println(TicketMaker.getInstance().getNextTicketNumber());
        System.out.println(TicketMaker.getInstance().getNextTicketNumber());

        for (int i = 0; i < 9; i++) {
            Triple triple = Triple.getInstance(i % 3);
            System.out.println(i + ":" + triple);
        }
    }
}
