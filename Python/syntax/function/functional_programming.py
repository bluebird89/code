#!/usr/bin/env python
# -*- coding: utf-8 -*- python

# 允许把函数本身作为参数传入另一个函数，还允许返回一个函数.没有变量
# 函数名其实就是指向函数的变量
# 高阶函数:一个函数就可以接收另一个函数作为参数
import functools
from functools import reduce


# 传入函数
def add(x, y, f):
    return f(x) + f(y)


print(add(5, -6, abs))


# map 传入的函数依次作用到序列的每个元素，并把结果作为新的Iterator返回
def upperFirstWord(inStr):
    return "%s" % (inStr[:1].upper() + inStr[1:].lower())


print(list(map(upperFirstWord, ['adam', 'LISA', 'barT'])))
print(list(map(str, [1, 2, 3, 4, 5, 6, 7, 8, 9])))


# reduce 把结果继续和序列的下一个元素做累积计算
def add(x, y):
    return x + y


reduce(add, [1, 3, 5, 7, 9])


def str2int(s):
    def fn(x, y):
        return x * 10 + y

    def char2num(s):  # 获取数组下标
        return {'0': 0, '1': 1, '2': 2, '3': 3, '4': 4, '5': 5, '6': 6, '7': 7, '8': 8, '9': 9}[s]

    return reduce(fn, map(char2num, s))  # str为迭代对象
    # return reduce(lambda x, y: x * 10 + y, map(char2num, s))


print(str2int('45666'))  # 45666


# filter() 传入的函数依次作用于每个元素，然后根据返回值是True还是False决定保留还是丢弃该元素
def not_empty(s):
    return s and s.strip()


# ['A', 'B', 'C']
print(list(filter(not_empty, ['A', '', 'B', None, 'C', '  '])))


# 求素数
def _odd_iter():
    n = 1
    while True:
        n = n + 2
        yield n


def _not_divisible(n):
    return lambda x: x % n > 0


def primes():
    yield 2
    it = _odd_iter()
    while True:
        n = next(it)
        yield n
        it = filter(_not_divisible(n), it)


for n in primes():
    if n < 50:
        print(n)
    else:
        break


def is_palindrome(s):
    return str(s)[:] == str(s)[-1::-1]


output = filter(is_palindrome, range(1, 1000))
print('1~1000:', list(output))
if list(filter(is_palindrome, range(1, 200))) == [1, 2, 3, 4, 5, 6, 7, 8, 9, 11, 22, 33, 44, 55, 66, 77, 88, 99, 101,
                                                  111, 121, 131, 141, 151, 161, 171, 181, 191]:
    print('测试成功!')
else:
    print('测试失败!')

# sorted key指定的函数将作用于list的每一个元素上，并根据key函数返回的结果进行排序
print(sorted(['bob', 'about', 'Zoo', 'Credit'], key=str.lower, reverse=True))

L = [('Bob', 75), ('Adam', 92), ('Bart', 66), ('Lisa', 88)]


def by_name(t):
    return t[0]


print(sorted(L, key=by_name))


# 函数作为结果值返回
# 闭包（Closure）:内部函数sum可以引用外部函数lazy_sum的参数和局部变量，当lazy_sum返回函数sum时，相关参数和变量都保存在返回的函数中
# 调用lazy_sum()时，每次调用都会返回一个新的函数，即使传入相同的参数
def lazy_sum(*args):
    def sum():
        ax = 0
        for n in args:
            ax = ax + n
        return ax

    return sum


f = lazy_sum(1, 3, 5, 7, 9)
f1 = lazy_sum(1, 3, 5, 7, 9)
print(f())
print(f == f1)  # False


# 闭包：返回函数不要引用任何循环变量，或者后续会发生变化的变量
# 方法是再创建一个函数，用该函数的参数绑定循环变量当前的值，无论该循环变量后续如何更改，已绑定到函数参数的值不变
def count():
    def f(j):
        def g():
            return j * j

        return g

    fs = []
    for i in range(1, 4):
        fs.append(f(i))
    return fs


f1, f2, f3 = count()
print(f1(), f2(), f3())


# lambda:表示匿名函数，冒号前面的 x 表示函数参数,只能有一个表达式,也可以把匿名函数赋值给一个变量，再利用变量来调用该函数
def f(x, y, z): return x + y + z


print(f(2, 4, 5))

f = lambda x: x * x
print(f(5))


def build(x, y):
    return lambda: x * x + y * y


print(build(3, 4)())

## 偏函数
int2 = functools.partial(int, base=2)
print(int2('1000000'))
