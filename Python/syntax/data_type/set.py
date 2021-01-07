# set 一组key的集合，但不存储value
# key不能重复

s = {1, 1, 2, 2, 3, 3}
print(s)  # {1,2,3}
s.add(4)
print(s)
s.remove(2)
print(s)

s1 = set([2, 4, 6])
print(s & s1)  # 交集 {2}
print(s | s1)  # 并集


