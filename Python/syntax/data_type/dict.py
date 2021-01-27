# dict 使用键-值（key-value）存储
# 保证hash的正确性，作为key的对象就不能变（通过hash）
# 获取的key必须存在（否则报错）

# 多次对一个key放入value，后面的值会把前面的值冲掉
# 与list相比
# 查找和插入的速度极快，不会随着key的增加而变慢
# 需要占用大量的内存，内存浪费多
# dict 建立索引 放进去的时候，必须根据key算出value的存放位置

d = {'henry': 80, 'michael': 75, 'Tracy': 85}

print('henry' in d)
print(d.get('tomas'))
print(d.get('tomas', -1))
print(d['henry'])
d['Adam'] = 67
d.pop('michael')
print(d)

print({(3, 5, 7): 'henry'})

cache = {}


def get_page(url):
    if cache.get(url):
        return cache[url]
    else:
        data = get_data_from_server(url)
        cache[url] = data
        return data
