package main.syntax;

import java.io.File;

class FileDemo {
    public static void main(String[] args) {

        // f.createNewFile(); // 创建一个文件
        File f = new File("./io.txt");
        // File类的两个常量
        //路径分隔符(与系统有关的）<windows里面是 ; linux里面是 ： >
        System.out.println(File.pathSeparator);
        //与系统有关的路径名称分隔符<windows里面是 \ linux里面是/ >
        System.out.println(File.separator);

        if (f.exists()) {
            f.delete();
        } else {
            System.out.println("文件不存在");
        }

        String fileName = "D:" + File.separator + "filepackage";
        f.mkdir();
        String[] str = f.list();
        for (int i = 0; i < str.length; i++) {
            System.out.println(str[i]);
        }

    }
}
