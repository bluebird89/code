package tdd;

import com.google.gson.Gson;
import com.google.gson.GsonBuilder;

public class HelloWorld {

    public static void main(String[] args) {
        Person p = new Person();
        p.setName("Bill Yang");
        p.setAge(45);

        Gson gson = new GsonBuilder().create();
        String pJson = gson.toJson(p);

        System.out.println("Hello world," + pJson);
    }
}
