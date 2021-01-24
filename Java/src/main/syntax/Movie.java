package syntax;

public class Movie {

    public static final int CHILDRENS = 2;
    public static final int REGUALR = 1;
    public static final int NEW_REALEASE = 0;

    private final String _title;
    private int _priceCode;

    public Movie(String title, int priceCode) {
        _title = title;
        _priceCode = priceCode;
    }

    public int getPriceCode() {
        return _priceCode;
    }

    public void setPriceCode(int arg) {
        _priceCode = arg;
    }

    public String getTitle() {
        return _title;
    }
}
