package main.syntax;

import java.util.ArrayList;
import java.util.List;

public class Collec {
    public static void main(String[] args) {
        // Iterable 接口
        // List<Object> lst = new ArrayList();
        // for (Object obj: lst){
        //
        // }

        // for(Iterator it = lst.iterator(); lst.hasNext(); ){
        //     System.out.println(lst.next());
        // }
        List<String> arrayList = new ArrayList<String>();
        arrayList.add("cxuan");

        for (int i = 0; i < arrayList.size(); i++) {
            String item = (String) arrayList.get(i);
            // System.out.println("test === ", item);
        }
    }
}
