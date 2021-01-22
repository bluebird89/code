package tdd.args;

public class IntegerFlag implements IFlag {
    private Object value;
    private static final String TYPE = "integer";

    public IntegerFlag(Object value) {
        this.value = value;
    }

    @Override
    public String getType() {
        return TYPE;
    }

    @Override
    public Object getDefaultValue() {
        return 0;
    }

    @Override
    public Object getValue() {
        return Integer.valueOf(value.toString());
    }

    @Override
    public Boolean isTypeOf(String type) {
        return TYPE.equals(type);
    }
}
