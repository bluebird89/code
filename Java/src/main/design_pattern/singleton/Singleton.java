package design_pattern.singleton;

public class Singleton {
    private static final Singleton singletonNoStrict = new Singleton();

    private void SingletonNoStrict() {
        System.out.println("Create a instance");
        slowdown();
    }

    private void slowdown() {
        try {
            Thread.sleep(1000);
        } catch (InterruptedException ignored) {
        }
    }

    public static synchronized Singleton getInstance() {

        return singletonNoStrict;
    }
}
