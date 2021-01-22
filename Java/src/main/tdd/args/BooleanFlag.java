package tdd.args;

public class BooleanFlag implements IFlag {
    private Object value;
    private static final String TYPE = "boolean";

    public BooleanFlag(Object value) {
        this.value = value;
    }

    @Override
    public String getType() {
        return TYPE;
    }

    @Override
    public Object getDefaultValue() {
        return Boolean.FALSE;
    }

    @Override
    public Object getValue() {
        return Boolean.valueOf(value.toString());
    }

    @Override
    public Boolean isTypeOf(String type) {
        return TYPE.equals(type);
    }
}
