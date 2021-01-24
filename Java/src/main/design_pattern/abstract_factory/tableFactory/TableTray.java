package design_pattern.abstract_factory.listfactory;

import design_pattern.abstract_factory.factory.Item;
import design_pattern.abstract_factory.factory.Tray;

public class ListTray extends Tray {
    public ListTray(String caption) {
        super(caption);
    }

    @Override
    public String makeHTML() {
        StringBuffer buffer = new StringBuffer();
        buffer.append("<li>\n").append(caption).append("\n").append("<ul>\n");

        for (Object o : tray) {
            Item item = (Item) o;
            buffer.append(item.makeHTML());
        }
        buffer.append("</ul>/n").append("</li>\n");

        return buffer.toString();
    }
}
