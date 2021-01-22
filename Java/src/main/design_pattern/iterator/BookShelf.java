package design_pattern.iterator;

public class BookShelf implements Aggregate {
    private final Book[] books;
    private int last = 0;

    public BookShelf(int maxsize) {
        this.books = new Book[maxsize];
    }

    public Book getBookAt(int index) {
        return books[index];
    }

    public void appendBook(Book book) {
// TODO:检测容量
        this.books[last] = book;
        last++;
    }

    public Iterator iterator() {
        return new BookShelfIterator(this);
    }

    public Iterator reverseIterator() {
        return new BookShelfReverseIterator(this);
    }

    public int getLength() {
        return last;
    }
}
