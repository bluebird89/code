package design_pattern.abstract_factory.listfactory;

import design_pattern.abstract_factory.factory.Item;
import design_pattern.abstract_factory.factory.Page;

public class ListPage extends Page {
    public ListPage(String title, String author) {
        super(title, author);
    }

    @Override
    protected String makeHTML() {
        StringBuffer buffer = new StringBuffer();
        buffer.append("<html><head><title>" + title + "</title></head>\n")
                .append("<body>\n").append("<h1>" + title + "</h1>\n").append("<ul>\n");

        for (Object o : content) {
            Item item = (Item) o;
            buffer.append(item.makeHTML());
        }
        buffer.append("</ul>\n").append("<hr><address>" + author + "</address>")
                .append("</body></html>\n");

        return buffer.toString();
    }
}
