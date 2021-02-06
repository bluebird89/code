package syntax.mutal_thread;

class MyThread extends Thread {
    @Override
    public void run() {
        System.out.println("hello myThread" + Thread.currentThread().getName());
    }
}
class ThreadA extends Thread{

    private String age;

    public ThreadA(String age){
        this.age = age;
    }
    @Override
    public void run() {
        System.out.println("age=" + age);
    }
}

public class by_thread {

    public static void main(String[] args) {
        Thread MyThread = new MyThread();
        MyThread.start();

        String age = new String("12");
        ThreadA a = new ThreadA(age);
        a.start();
    }
}
