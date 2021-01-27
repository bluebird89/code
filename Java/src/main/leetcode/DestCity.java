package leetcode;

import java.util.ArrayList;
import java.util.List;

public class DestCity {
    public static String destCity(List<List<String>> paths) {
        String des = "";
        for (int i = 0; i < paths.size(); i++) {
            List path = paths.get(i);

            des = (String) path.get(1);
            for (int j = i + 1; j < paths.size(); j++) {
                List path1 = paths.get(j);

                if (path1.get(0) == path.get(1)) {
                    des = (String) path1.get(1);
                } else if (path1.get(1) == path.get(0)) {
                    des = (String) path.get(1);
                }
            }
        }

        return des;
    }

    public static void main(String[] args) {
        // List<List<String>> numbers = new ArrayList<List<>>(Arrays.asList(new String[]{"London", "New York"}, new String[]{"New York", "Lima"}, new String[]{"Lima", "Sao Paulo"}));
        // destCity(numbers);

        List<String> languages = new ArrayList<>();
        languages.add("Java");
        languages.add("PHP");
        languages.add("Python");
        System.out.println(languages);
        System.out.println(languages.get(1));
    }
}
