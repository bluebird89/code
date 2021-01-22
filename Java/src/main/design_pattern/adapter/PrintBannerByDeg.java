package design_pattern.adapter;

public class PrintBannerByDeg implements Print {
    private final Banner banner;

    public PrintBannerByDeg(String string) {
        this.banner = new Banner(string);
    }

    @Override
    public void printWeak() {
        this.banner.showWithParen();
    }

    @Override
    public void printStrong() {
        this.banner.showWithAster();
    }
}
