package tdd.args;


import java.util.Arrays;
import java.util.HashMap;

public class Schema {
    private HashMap<String, IFlag> flags = new HashMap<>();

    public Schema(String format) {
        Arrays.stream(format.split(" ")).forEach(flag -> {
            String[] split = flag.split(":");
            this.flags.put(split[0], FlagFactory.createFlag(split[1]));
        });
    }

    public Object getValue(String flag) {
        return this.flags.get(flag).getDefaultValue();
    }

    public String getType(String flag) {
        return this.flags.get(flag).getType();
    }

}
