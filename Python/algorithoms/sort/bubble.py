def bubble_sort(ls):
    unsort_util_index = len(ls) - 1
    sortd = False
    count = 0

    while not sortd:
        sortd = True
        for i in range(unsort_util_index):
            count = count + 1
            if ls[i] > ls[i + 1]:
                sortd = False
                ls[i], ls[i + 1] = ls[i + 1], ls[i]
        unsort_util_index = unsort_util_index - 1
    return count


ls = [65, 45, 55, 35, 25, 15, 10]
print(bubble_sort(ls))

print(ls)
