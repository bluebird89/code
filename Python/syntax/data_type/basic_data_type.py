#!/usr/bin/env python3
# -*- coding: utf-8 -*-

# Python中单行注释用#表示，#之后同行字符全部认为被注释。

""" 与之对应的是多行注释
    用三个双引号表示，这两段双引号当中的内容都会被视作是注释
"""

# 基础数据类型

# 字符串：不可以被更改(不可变的),赋值给字符串索引的位置会导致错误
print('spam eggs')
print('doesn\'t' + " doesn't")  # 特殊字符会用反斜杠转义
print('"Yes," he said.' + "\"Yes,\" he said.")
print('"Isn\'t," she said.')  # "Isn't," she said.
print(r'C:\some\name')  # 带有 \ 的字符被当作特殊字符，可以使用 原始字符串

a = 'abc'
b = a.replace('a', 'A')
print(a, b)  # a 没有改变

# Unicode把所有语言都统一到一套编码里
# ASCII编码是1个字节，而Unicode编码通常是2个字节
# 编码:内存中以Unicode 网络传输、保存硬盘、读取 以字节为单位的bytes显示 用\x##显示,每个字符占用一个字节
# 把Unicode编码转化为“可变长编码”的UTF-8编码。UTF-8编码把一个Unicode字符根据不同的数字大小编码成1-6个字节，常用的英文字母被编码成1个字节，汉字通常是3个字节，只有很生僻的字符才会被编码成4-6个字节。
# 1个中文字符经过UTF-8编码后通常会占用3个字节，而1个英文字符只占用1个字节
# 纯英文的str可以用ASCII编码为bytes，内容是一样的，含有中文的str可以用UTF-8编码为bytes。含有中文的str无法用ASCII编码
print(u'中文')  # 中文
print(len(u'中文'))
print(u'中文'.encode('utf-8'))  # b'\xe4\xb8\xad\xe6\x96\x87'
print(len(u'中文'.encode('utf-8')))
print(r'\\\t\\')  # r''表示''内部的字符串默认不转义

# str，在内存中以Unicode表示，一个字符对应若干个字节。如果要在网络上传输，或者保存到磁盘上，就需要把str变为以字节为单位的bytes
# 'ABC'和b'ABC'，前者是str，后者虽然内容显示得和前者一样，但bytes的每个字符都只占用一个字节
print('abc'.encode('utf-8'))  # b'abc'
print(b'ABC'.decode('ascii'))  # 'ABC'
print(b'\xe4\xb8\xad\xe6\x96\x87'.decode('utf-8'))  # '中文'

# 多行: 加上 \ 来避免 行尾换行符会被自动包含到字符串中
print("""\
Usage: thingy [OPTIONS]
     -h                        Display this usage message
     -H hostname               Hostname to connect to
""")

print(3 * 'un' + 'ium')
print('Py' 'thon')  # 只用于两个字符串文本，不能用于字符串表达式

# 切片
# 索引有非常有用的默认值；省略的第一个索引默认为零，省略的第二个索引默认为切片的字符串的大小
# 索引值 为字符前面的位置 0(-6) p 1 y 2 t 3 h 4 o 5(-1) n 6
word = 'Python'
print(word[0] + word[5] + word[-2])
print(word[:2] + word[2:])
print(word[-2:])

print(len(word))
# 获取字符的整数表示
print(ord('A'))
# 把编码转换为对应的字符
print(chr(65))

# 格式化输出
print('%.2f' % 3.1415926)
print('Hi, %s, you have $%d.' % ('Michael', 1000000))
print('%x' % 15)  # f
print('Hello, {0}, 成绩提升了 {1:.1f}%'.format('小明', 17.125))
print('Today:%2d-%02d' % (3, 1))
print('Growth rate:%d%%' % 7)

# 布尔型
print(True and True)
print(True or False)
print(not True)
0 == False

# 空型
print(None)

# 常量：不能变的变量
PI = 3.1415926
print(PI)

# 运算操作符
print(2 + 2)
print(50 - 5 * 6)
print((50 - 5 * 6) / 4)
print(8 / 5)  # 1.6
print(17 / 3)  # 5.6666666667
print(17 // 3)  # 5
print(17 % 3)  # 2
print(5 ** 2)  # 25
print(3 * 3.75 / 1.5)

# 数据类型转换
print(abs(-20))
print(max(2, 3, 1, -5))
print(int('123'))
print(int(12.34))
print(float('12.34'))
print(bool(''))  # False
print(int('123'), int(12.34), str(123), bool(''))

# 变量
# 赋值
# 浅复制：值赋值，内存地址的别名
a = -100
b = 200
# print(abs(a), cmp(a, b))
print(a * b)
# print(2 + _ ) # 交互模式中，最近一个表达式的值赋给变量 _

a = 'ABC'
b = a
a = 'XYZ'  # 指向新的变量地址
print(b)

# 不变对象：返回操作后值，减少了由于修改数据导致的错误
# 可变对象：操作自己本身
