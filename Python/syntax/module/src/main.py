from syntax.module.proto.mat import Matrix
from syntax.module.utils.mat_mul import mat_mul

a = Matrix([[1, 2], [3, 4]])
b = Matrix([[5, 6], [7, 8]])

print(mat_mul(a, b).data)
