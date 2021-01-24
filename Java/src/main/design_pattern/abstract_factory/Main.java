package design_pattern.abstract_factory;

import design_pattern.abstract_factory.factory.Factory;
import design_pattern.abstract_factory.factory.Link;
import design_pattern.abstract_factory.factory.Page;
import design_pattern.abstract_factory.factory.Tray;

public class Main {
    public static void main(String[] args) {
        if (args.length != 1) {
            System.out.println("Usage: java Main class.name.of.ConcreteFactory");
            System.out.println("Example 1: java main listfactory.ListFactory");
            System.out.println("Example 2: java main tablefactory.TableFactory");
        }
        Factory factory = Factory.getFactory(args[0]);

        Link people = factory.createLink("人民日报", "https://open.spotify.com/");
        Link gmw = factory.createLink("光明日报", "https://open.spotify.com/");

        Link google = factory.createLink("Google", "https://open.spotify.com/");
        Link bing = factory.createLink("Bing", "https://open.spotify.com/");
        Link us_yahoo = factory.createLink("US Yahoo", "https://open.spotify.com/");
        Link jp_yahoo = factory.createLink("Japan Yahoo", "https://open.spotify.com/");

        Tray traynews = factory.createTray("日报");
        traynews.add(people);
        traynews.add(gmw);

        Tray trayyahoo = factory.createTray("Yahoo!");
        trayyahoo.add(us_yahoo);
        trayyahoo.add(jp_yahoo);

        Tray traysearch = factory.createTray("Search engine");
        traysearch.add(trayyahoo);
        traysearch.add(google);
        traysearch.add(bing);

        Page page = factory.createPage("Link Page", "Henry");
        page.add(traynews);
        page.add(traysearch);
        page.output();
    }
}
