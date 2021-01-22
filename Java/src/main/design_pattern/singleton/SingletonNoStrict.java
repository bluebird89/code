package design_pattern.singleton;

public class SingletonNoStrict {

    private static final SingletonNoStrict singleton = new SingletonNoStrict();

    private SingletonNoStrict() {
        System.out.println("Create a instance");
    }

    public static SingletonNoStrict getInstance() {
        return singleton;
    }
}
