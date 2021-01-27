# 请编写前述sum函数的代码。
# 编写一个递归函数来计算列表包含的元素数。
# 找出列表中最大的数字
def sum(ls):
    rs = 0
    maxIndex = len(ls) - 1

    while ls is not None:
        rs = rs + ls[maxIndex]
        if maxIndex == 0:
            break
        ls = ls[:maxIndex]
        maxIndex = maxIndex - 1
    return rs


if __name__ == '__main__':
    print(sum([2, 4, 6]))
