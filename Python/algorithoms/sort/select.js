function selectionSort(array) {
    for (var i = 0; i < array.length; i++) {

        var lowestNumberIndex = i;
        for (var j = i + 1; j < array.length; j++) {

            if (array[j] < array[lowestNumberIndex]) {
                lowestNumberIndex = j;
            }
        }

        if (lowestNumberIndex != i) {
            var temp = array[i];
            array[i] = array[lowestNumberIndex];
            array[lowestNumberIndex] = temp;
        }
    }
    return array;
}

ls = [65, 45, 55, 35, 25, 15, 10]

console.log(selectionSort(ls))
