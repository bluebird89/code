package tdd.args;


import java.util.Arrays;
import java.util.HashMap;

public class ArgsParser {
	private Schema schema;
	private HashMap<String, IFlag> commands = new HashMap<>();

	public ArgsParser(Schema schema, String commandline) {
		this.schema = schema;
		Arrays.stream(commandline.split("-")).forEach(c -> {
			c = c.trim();
			if (!c.contains(" ") && !c.equals("")) {
				this.commands.put(c, FlagFactory.createFlag(this.schema.getType(c), Boolean.TRUE));
			} else if (c.contains(" ")) {
				String[] split = c.split(" ");
				this.commands.put(split[0], FlagFactory.createFlag(this.schema.getType(split[0]), split[1]));
			}
		});
	}

	public Object getValue(String flag) {
		if (this.commands.containsKey(flag)) {
			return this.commands.get(flag).getValue();
		} else {
			return this.schema.getValue(flag);
		}
	}
}
