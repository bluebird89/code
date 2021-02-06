package syntax.mutal_thread;

import java.util.concurrent.Callable;

class MyRunnable implements Runnable {
    @Override
    public void run() {
        System.out.println("hello myRunnable" + Thread.currentThread().getName());
    }
}

class MyCallable implements Callable<String> {

    private String name;

    public MyCallable(String name) {
        this.name = name;
    }

    @Override
    public String call() throws Exception {
        return "call:" + name;
    }
}

public class by_runnable {
    public static void main(String[] args) {

        MyRunnable myRunnable = new MyRunnable();
        Thread thread = new Thread(myRunnable);
        thread.start();

        MyCallable MyCallable = new MyCallable("张方兴");
        String call = null;
        try {
            call = MyCallable.call();
        } catch (Exception e) {
            e.printStackTrace();
        }
        System.out.println(call);
    }
}
