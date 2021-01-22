package tdd.args;

public interface IFlag {
    public String getType();

    public Object getDefaultValue();

    public Object getValue();

    public Boolean isTypeOf(String type);
}
