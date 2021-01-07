# 可迭代对象 Iterable:可以直接作用于for循环的对象
# 集合数据类型，如list、tuple、dict、set、str
# generator，包括生成器和带yield的generator function

# 迭代器 Iterator:可以被next()函数调用并不断返回下一个数据，直到没有数据时抛出StopIteration错误
# 表示的是一个数据流,一个有序序列，但我们却不能提前知道序列的长度，只能不断通过next()函数实现按需计算下一个数据，所以Iterator的计算是惰性的，只有在需要返回下一个数据时它才会计算
# 生成器
# list、dict、str等不是Iterator Iterable, 变成Iterator可以使用iter()函数

from collections import Iterable, Iterator

isinstance('abc', Iterable)  # str是否可迭代
isinstance([1, 2, 3], Iterable)  # list是否可迭代
isinstance(123, Iterable)  # 整数是否可迭代

isinstance((x for x in range(10)), Iterator)  # True
isinstance([], Iterator)  # False
isinstance({}, Iterator)  # False
isinstance('abc', Iterator)  # False
isinstance(iter([]), Iterator)  # True
isinstance(iter('abc'), Iterator)  # True
a
# for循环本质上就是通过不断调用next()函数实现
for i, value in enumerate(['A', 'B', 'C']):
    print(i, value)


for x, y in [(1, 1), (2, 4), (3, 9)]:
    print(x, y)
