package design_pattern.builder;

public class Director {
    private final Builder builder;

    public Director(Builder builder) {
        this.builder = builder;
    }

    public void construct() {
        builder.makeTitle("Greeting");
        builder.makeString("From morning to Afternoon");
        builder.makeItems(new String[]{
                "Good Morning!",
                "Good Afternoon!"
        });
        builder.makeString("Evening");
        builder.makeItems(new String[]{
                "Good Evening.",
                "Good Night.",
                "Goodbye."
        });
        builder.close();
    }
}
