package tdd.args;

public class StringFlag implements IFlag {
    private Object value;
    private static final String TYPE = "string";

    public StringFlag(Object value) {
        this.value = value;
    }

    @Override
    public String getType() {
        return TYPE;
    }

    @Override
    public Object getDefaultValue() {
        return "";
    }

    @Override
    public Object getValue() {
        return value.toString();
    }

    @Override
    public Boolean isTypeOf(String type) {
        return TYPE.equals(type);
    }
}