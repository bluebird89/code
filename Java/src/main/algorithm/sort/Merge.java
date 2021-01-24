package main.algrithom.sort;

/**
 * @author henry
 */
public class Merge {

    public Merge(int[] array) {
        if (array == null || array.length <= 1) {
            // return array;
        }

        int[] newArray = new int[array.length];
        mergeSort(array, 0, array.length - 1, newArray);
    }

    private void mergeSort(int[] array, int left, int right, int[] newArray) {
        // base case
        if (left >= right) {
            return;
        }

        // 「分」
        int mid = left + (right - left) / 2;

        // 「治」
        mergeSort(array, left, mid, newArray);
        mergeSort(array, mid + 1, right, newArray);

        // 辅助的 array
        for (int i = left; i <= right; i++) {
            newArray[i] = array[i];
        }

        // 「合」
        int i = left;
        int j = mid + 1;
        int k = left;
        while (i <= mid && j <= right) {
            // 等号会影响算法的稳定性
            if (newArray[i] <= newArray[j]) {
                array[k++] = newArray[i++];
            } else {
                array[k++] = newArray[j++];
            }
        }
        while (i <= mid) {
            array[k++] = newArray[i++];
        }
    }

    void main() {
        Merge instance = new Merge(new int[]{5, 7, 3, 4, 9, 6, 8});
        // assertEquals(new int[]{5, 7, 3, 4, 9, 6, 8}, instance);
    }
}
