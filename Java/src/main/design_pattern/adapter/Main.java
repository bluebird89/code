package design_pattern.adapter;

public class Main {
    public static void main(String[] args) {
        Print p = new PrintBanner("Hello");
        p.printWeak();
        p.printStrong();

        p = new PrintBannerByDeg("World");
        p.printWeak();
        p.printStrong();
    }
}
