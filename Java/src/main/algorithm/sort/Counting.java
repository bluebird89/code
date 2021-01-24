package main.algrithom.sort;

import java.util.Arrays;

/**
 * @author henry
 * [计数排序](https://mp.weixin.qq.com/s/eIegGzddx4DuqjvKELlAZA)
 */
public class Counting {

    static void countingSort1(int[] arr) {
        int n = arr.length;
        int[] output = new int[n];

        int[] count = new int[256];
        for (int i = 0; i < 256; i++) {
            count[i] = 0;
        }

        for (int i = 0; i < n; i++) {
            ++count[arr[i]];
        }

        for (int i = 1; i <= 255; i++) {
            count[i] += count[i - 1];
        }

        for (int i = n - 1; i >= 0; i--) {
            output[count[arr[i]] - 1] = arr[i];
            --count[arr[i]];
        }

        for (int i = 0; i < n; i++) {
            arr[i] = output[i];
        }
    }

    static void countSort(int[] arr) {
        int max = Arrays.stream(arr).max().getAsInt();
        int min = Arrays.stream(arr).min().getAsInt();
        int range = max - min + 1;
        int[] count = new int[range];
        int[] output = new int[arr.length];
        for (int i = 0; i < arr.length; i++) {
            count[arr[i] - min]++;
        }

        for (int i = 1; i < count.length; i++) {
            count[i] += count[i - 1];
        }

        for (int i = arr.length - 1; i >= 0; i--) {
            output[count[arr[i] - min] - 1] = arr[i];
            count[arr[i] - min]--;
        }

        for (int i = 0; i < arr.length; i++) {
            arr[i] = output[i];
        }
    }

    static void printArray(int[] arr) {
        for (int i = 0; i < arr.length; i++) {
            System.out.print(arr[i] + " ");
        }
        System.out.println("");
    }

    public static void main(String[] args) {
        int[] arr = {1, 4, 1, 2, 5, 2, 4, 1, 8};
        countingSort1(arr);
        printArray(arr);

        int[] arr1 = {-1, 4, 1, -2, 5, -2, 4, -1, 8};
        countSort(arr1);
        printArray(arr1);
    }

}