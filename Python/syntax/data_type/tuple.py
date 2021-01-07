# 一旦初始化就不能修改, 代码更安全
classmates = ('henry', 'lily', 123)
print(classmates[1])
classmates = (123,)
print(classmates)
classmates = ('henry', 'lily', ['A', 'B'])
classmates[2][0] = 'X'
classmates[2][1] = 'Y'
print(classmates)

# 定义一个元素
print((1,))

# 不变：指向永远不变
t = ('a', 'b', ['A', 'B'])
t[2][0] = 'X'
t[2][1] = 'Y'
print(t)
