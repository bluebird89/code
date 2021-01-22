package design_pattern.template;

public class StringDisplay extends AbstractDisplay {
    private final int width;
    private final String str;

    public StringDisplay(String str) {
        this.width = str.getBytes().length;
        this.str = str;
    }

    @Override
    void open() {
        printLine();
    }

    @Override
    void print() {
        System.out.println("|" + str + "|");
    }

    @Override
    void close() {
        printLine();
    }

    private void printLine() {
        System.out.print("+");
        for (int i = 0; i < width; i++) {
            System.out.print("-");
        }
        System.out.println("+");
    }
}
