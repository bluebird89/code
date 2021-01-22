package design_pattern.singleton;

public class Triple {

    private static final Triple[] triple = new Triple[]{
            new Triple(0),
            new Triple(1),
            new Triple(2),
    };
    private int id;

    public Triple(int id) {
        System.out.println("The instance " + id + " is created.");
        this.id = id;
    }

    public static Triple getInstance(int id) {
        return triple[id];
    }

    public String toString() {
        return "[Triple id=" + id + "]";
    }
}
