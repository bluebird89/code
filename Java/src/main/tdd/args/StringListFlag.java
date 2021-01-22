package tdd.args;

import java.util.ArrayList;
import java.util.Arrays;

public class StringListFlag implements IFlag {
    private Object value;
    private static final String TYPE = "stringlist";

    public StringListFlag(Object value) {
        this.value = value;
    }

    @Override
    public String getType() {
        return TYPE;
    }

    @Override
    public Object getDefaultValue() {
        return new ArrayList<String>();
    }

    @Override
    public Object getValue() {
        return Arrays.asList(this.value.toString().split(","));
    }

    @Override
    public Boolean isTypeOf(String type) {
        return TYPE.equals(type);
    }
}