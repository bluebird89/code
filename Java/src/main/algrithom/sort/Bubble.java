package main.algrithom.sort;

public class Bubble {

    // This class should not be instantiated.
    private Bubble() {
    }

    /**
     * Rearranges the array in ascending order, using the natural order.
     *
     * @param a the array to be sorted
     */
    public static <Key extends Comparable<Key>> void sort(Key[] a) {
        int n = a.length;
        for (int i = 0; i < n; i++) {
            int exchanges = 0;
            for (int j = n - 1; j > i; j--) {
                if (less(a[j], a[j - 1])) {
                    exch(a, j, j - 1);
                    exchanges++;
                }
            }
            if (exchanges == 0) break;
        }
    }

    // is v < w ?
    private static <Key extends Comparable<Key>> boolean less(Key v, Key w) {
        return v.compareTo(w) < 0;
    }

    // exchange a[i] and a[j]
    private static <Key extends Comparable<Key>> void exch(Key[] a, int i, int j) {
        Key swap = a[i];
        a[i] = a[j];
        a[j] = swap;
    }

    // print array to standard output
    private static void show(Comparable[] a) {
        for (int i = 0; i < a.length; i++) {
            // StdRandom.println(a[i]);
        }
    }

    /**
     * Reads in a sequence of strings from standard input; bubble sorts them;
     * and prints them to standard output in ascending order.
     *
     * @param args the command-line arguments
     */
    public static void main(String[] args) {
        // String[] a = StdIn.readAllStrings();
        // Bubble.sort(a);
        // show(a);
    }
}