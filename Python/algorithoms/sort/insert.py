def insert_sort(ls):
    for i in range(1, len(ls)):
        position = i
        temp_min = ls[i]

        while position > 0 and ls[position - 1] > temp_min:
            ls[position] = ls[position - 1]
            position = position - 1

        ls[position] = temp_min


ls = [65, 45, 55, 35, 25, 15, 10]
insert_sort(ls)
print(ls)
