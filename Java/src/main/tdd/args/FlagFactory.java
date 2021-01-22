package tdd.args;


import java.lang.reflect.Constructor;
import java.lang.reflect.InvocationTargetException;
import java.util.ArrayList;
import java.util.List;

public class FlagFactory {
    private static List<IFlag> flags = new ArrayList<>();

    static {
        flags.add(new BooleanFlag(null));
        flags.add(new IntegerFlag(null));
        flags.add(new StringFlag(null));
        flags.add(new StringListFlag(null));
    }

    public static IFlag createFlag(String type) {
        return createFlag(type, null);
    }

    public static IFlag createFlag(String type, Object value) {
        try {
            for (IFlag flag : flags) {
                if (flag.isTypeOf(type)) {
                    Constructor con = flag.getClass().getConstructor(Object.class);
                    return (IFlag) con.newInstance(value);
                }
            }
        } catch (NoSuchMethodException | InstantiationException | IllegalAccessException | InvocationTargetException e) {
            return null;
        }
        return null;
    }
}
