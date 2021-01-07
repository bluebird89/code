
import struct

# 处理字节的数据类型, b'str'可以表示字节，所以，字节数组＝二进制str
n = 10240099
b1 = (n & 0xff000000) >> 24
b2 = (n & 0xff0000) >> 16
b3 = (n & 0xff00) >> 8
b4 = n & 0xff
bs = bytes([b1, b2, b3, b4])
print(bs)

# >表示字节顺序是big-endian，也就是网络序，I表示4字节无符号整数 H：2字节无符号整数
# unpack把bytes变成相应的数据类型
print(struct.pack('>I', n))
print(struct.unpack('>IH', b'\xf0\xf0\xf0\xf0\x80\x80'))
