# 生成器: 保存的是算法，每次调用next(g)，就计算出g的下一个元素的值，直到计算到最后一个元素
# 没有更多的元素时，抛出StopIteration的错误
# 语法：列表生成式的[]改成()；函数定义中包含yield关键字
# 在循环过程中不断调用yield，就会不断中断。当然要给循环设置一个条件来退出循环，不然就会产生一个无限数列出来

g = (x * x for x in range(10))

# next(g)

for n in g:
    print(n)


def fib(max):
    n, a, b = 0, 0, 1
    while n < max:
        yield b
        a, b = b, a + b
        n = n + 1
    return 'done'


g = fib(6)
while True:
    try:
        x = next(g)
        print('g:', x)
    except StopIteration as e:
        print('Generator return value:', e.value)
        break


def odd():
    print('step 1')
    yield 1
    print('step 2')
    yield(3)
    print('step 3')
    yield(5)


def triangles(n):
    for i in range(1, n+1):
        if i == 1:
            a = [1]
        yield a
        b = (i+1)*[1]
        for j in range(1, i):
            b[j] = a[j-1]+a[j]
        a = b


n = 0
results = []
for t in triangles(10):
    print(t)
    results.append(t)
    n = n + 1
    if n == 10:
        break
if results == [
    [1],
    [1, 1],
    [1, 2, 1],
    [1, 3, 3, 1],
    [1, 4, 6, 4, 1],
    [1, 5, 10, 10, 5, 1],
    [1, 6, 15, 20, 15, 6, 1],
    [1, 7, 21, 35, 35, 21, 7, 1],
    [1, 8, 28, 56, 70, 56, 28, 8, 1],
    [1, 9, 36, 84, 126, 126, 84, 36, 9, 1]
]:
    print('测试通过!')
else:
    print('测试失败!')
