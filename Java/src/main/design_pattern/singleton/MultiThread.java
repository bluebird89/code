package design_pattern.singleton;

public class MultiThread extends Thread {

    public MultiThread(String name) {
        super(name);
    }

    public static void main(String[] args) {
        new MultiThread("A").start();
        new MultiThread("B").start();
        new MultiThread("C").start();
    }

    public void run() {
        // 多线程会生成不同实例
        SingletonNoStrict obj = SingletonNoStrict.getInstance();
        // Singleton obj = Singleton.getInstance();
        System.out.println(getName() + ": obj = " + obj);
    }

}
