from basic.module.utils.utils import get_sum
from basic.module.utils.class_utils import *

print(get_sum(1, 2))

encoder = Encoder()
decoder = Decoder()

print(encoder.encode('abcde'))
print(decoder.decode('edcba'))