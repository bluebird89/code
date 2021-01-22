package design_pattern.factory.idcard;

import design_pattern.factory.framework.Product;

public class IDCard extends Product {
    private final String owner;

    // 非 public， 为了包外类无法new 出新实例
    IDCard(String owner) {
        System.out.println("Make " + owner + "'s Card.");
        this.owner = owner;
    }

    @Override
    public void use() {
        System.out.println("Use " + owner + "'s Card.");
    }

    public String getOwner() {
        return owner;
    }
}
