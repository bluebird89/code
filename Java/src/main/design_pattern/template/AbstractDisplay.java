package design_pattern.template;

public abstract class AbstractDisplay {
    abstract void open();

    abstract void print();

    public final void display() {
        open();
        for (int i = 0; i < 5; i++) {
            print();
        }
        close();
    }

    abstract void close();
}
