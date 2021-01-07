import hashlib

# 摘要算法又称哈希算法、散列算法。它通过一个函数，把任意长度的数据转换为一个长度固定的数据串
# MD5是最常见的摘要算法，速度很快，生成结果是固定的128 bit字节，通常用一个32位的16进制字符串表示
md5 = hashlib.md5()
md5.update('how to use md5 in python hashlib?'.encode('utf-8'))
print(md5.hexdigest())

md5.update('how to use md5 in '.encode('utf-8'))
md5.update('python hashlib?'.encode('utf-8'))
print(md5.hexdigest())

# SHA1的结果是160 bit字节，通常用一个40位的16进制字符串表示
sha1 = hashlib.sha1()
sha1.update('how to use sha1 in '.encode('utf-8'))
sha1.update('python hashlib?'.encode('utf-8'))
print(sha1.hexdigest())

# 比SHA1更安全的算法是SHA256和SHA512，不过越安全的算法不仅越慢，而且摘要长度更长
# 碰撞:两个不同的数据通过某个摘要算法得到了相同的摘要
# 不存储用户的明文口令，而是存储用户口令的摘要:可以事先计算出这些常用口令的MD5值，得到一个反推表
# 通过把登录名作为Salt的一部分来计算MD5，从而实现相同口令的用户也存储不同的MD5


def calc_md5(username, password):
    md5 = hashlib.md5()
    md5.update((password + username + 'the-Salt').encode('utf-8'))
    return md5.hexdigest()


print(calc_md5('henry1', '12334444sas*&^&*88'))
