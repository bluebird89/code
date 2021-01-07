import re

if re.match(r'^\d{3}\-\d{3,8}$', '010-12345'):
    print('ok')
else:
    print('failed')

print(re.split(r'[\s\,]+', 'a,b, c  d'))  # ['a', 'b', 'c', 'd']

# 提取子串 group(0)永远是原始字符串，group(1)、group(2)……表示第1、2、……个子串
m = re.match(r'^(\d{3})-(\d{3,8})$', '010-12345')
print(m.groups())

# 默认是贪婪匹配，也就是匹配尽可能多的字符 加个?就可以让\d+采用非贪婪匹配
print(re.match(r'^(\d+?)(0*)$', '102300').groups())

re_telephone = re.compile(r'^(\d{3})-(\d{3,8})$')
print(re_telephone.match('010-12345').groups())
