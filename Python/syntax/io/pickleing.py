import pickle,json
# module 'pickle' has no attribute 'dump' 脚本文件名称与标准库pickle命名冲突

d = dict(name='Bob', age=20, score=88)
f = open('content.txt', 'wb')
pickle.dump(d, f)

f = open('content.txt', 'rb')
d = pickle.load(f)
print(d)
f.close()

print(json.dumps((d)))
