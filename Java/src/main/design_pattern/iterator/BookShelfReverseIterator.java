package design_pattern.iterator;

public class BookShelfReverseIterator implements Iterator {

    private final BookShelf bookShelf;
    private int index;

    public BookShelfReverseIterator(BookShelf bookShelf) {
        this.bookShelf = bookShelf;
        this.index = bookShelf.getLength();
    }

    @Override
    public boolean hasNext() {
        return index > 0;
    }

    @Override
    public Object next() {
        Book book = bookShelf.getBookAt(index - 1);
        index--;

        return book;
    }
}
