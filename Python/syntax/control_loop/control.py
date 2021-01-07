# 控制语句 在某个判断上是True，把该判断对应的语句执行后，就忽略掉剩下的elif和else

age = int(input('age:'))  # 的数据类型是str
if age <= 6:
    print('your age is', age)
    print('kid')
elif age >= 18:
    print('adult')
else:
    print('teenager')

# 可迭代的，即适合作为期望从某些东西中获得连续项直到结束的函数或结构的一个目标（参数）
print(list(range(0, 10, 3)))

sum1 = 0
for x in range(10):
    sum1 = sum1 + x
print(sum1)

words = ['cat', 'window', 'defenestrate']
for w in words[:]:
    if len(w) > 6:
        words.insert(0, w)
print(words)

a = ['Mary', 'had', 'a', 'little', 'lamb']
for i in range(len(a)):
    print(i, a[i])

n = 0
while n < 100:
    if n > 10:  # 当n = 11时，条件满足，执行break语句
        break  # break语句会结束当前循环
    n = n + 1
    if n % 2 == 0:
        continue
    print(n)

sum1 = 0
n = 99
while n > 0:
    sum1 = sum1 + n
    n = n - 10
print(sum1)
