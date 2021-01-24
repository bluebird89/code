package syntax;

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

        for (String s : arrayList) {
            String item = (String) s;
            // System.out.println("test === ". item);
        }
    }
}
