package design_pattern.abstract_factory.tableFactory;

import design_pattern.abstract_factory.factory.Item;
import design_pattern.abstract_factory.factory.Page;

public class TablePage extends Page {
    public TablePage(String title, String author) {
        super(title, author);
    }

    @Override
    protected String makeHTML() {
        StringBuffer buffer = new StringBuffer();
        buffer.append("<html><head><title>" + title + "</title></head>\n")
                .append("<body>\n")
                .append("<h1>" + title + "</h1>\n")
                .append("<table width=\"80%\" border=\"3\">\n");

        for (Object o : content) {
            Item item = (Item) o;
            buffer.append("<tr>" + item.makeHTML() + "</tr>");
        }
        buffer.append("</table>\n")
                .append("<hr><address>" + author + "</address>")
                .append("</body></html>\n");

        return buffer.toString();
    }
}
