def select_sort(ls):
    for i in range(len(ls) - 1):
        min_index = i
        for j in range(i + 1, len(ls) - 1):
            if ls[min_index] > ls[j]:
                min_index = j

        if ls[min_index] > ls[i]:
            ls[min_index], ls[i] = ls[i], ls[min_index]


ls = [65, 45, 55, 35, 25, 15, 10]
select_sort(ls)
print(ls)
