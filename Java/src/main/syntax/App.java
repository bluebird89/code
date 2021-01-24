package syntax;

public class App {
    public String getGreeting() {
        return "Hello World";
    }

    public void main(String[] args) {
        System.out.println(new App().getGreeting());
    }
}
