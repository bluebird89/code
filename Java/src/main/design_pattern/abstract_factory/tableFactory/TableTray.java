package design_pattern.abstract_factory.tableFactory;

import design_pattern.abstract_factory.factory.Item;
import design_pattern.abstract_factory.factory.Tray;

public class TableTray extends Tray {
    public TableTray(String caption) {
        super(caption);
    }

    @Override
    public String makeHTML() {
        StringBuffer buffer = new StringBuffer();
        buffer.append("<td> <table width=\"100%\" border=\"1\"<tr>")
                .append("<td bgcolor=\"#cccccc\" align=\"center\" colspan=\"" + tray.size() + "\"><b>")
                .append(caption)
                .append("</b></td>")
                .append("</tr>\n")
                .append("<tr>\n");

        for (Object o : tray) {
            Item item = (Item) o;
            buffer.append(item.makeHTML());
        }
        buffer.append("</tr></table>").append("</td>");

        return buffer.toString();
    }
}
