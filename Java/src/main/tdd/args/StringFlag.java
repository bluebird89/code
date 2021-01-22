package tdd.args;

public class StringFlag implements IFlag {
    private static final String TYPE = "string";
    private Object value;

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