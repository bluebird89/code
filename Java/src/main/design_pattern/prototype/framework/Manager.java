package design_pattern.prototype.framework;

import java.util.HashMap;

public class Manager {
    private final HashMap<String, Product> showcase = new HashMap<String, Product>();

    public void register(String name, Product proto) {
        showcase.put(name, proto);
    }

    public Product create(String protoname) {
        Product p = showcase.get(protoname);

        return p.createClone();
    }
}
