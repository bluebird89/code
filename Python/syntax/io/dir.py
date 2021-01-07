import os

# 环境变量
print(os.name)
print(os.uname)
print(os.environ)
print(os.environ.get('PATH'))

# 目录
basepath = os.path.abspath('')
realPath = os.path.join(basepath, 'testdir')


# if os.path.isdir((realpath):
#    # os.rmdir(realPath)
#    pass

# if os.path.isdir(realPath) == False
#    os.mkdir(realPath)

print(os.path.split(realPath))
print(os.path.splitext(realPath))

# 文件
os.rename('tests.txt', 'tests.py')
os.remove('tests.py')

print([x for x in os.listdir('../') if os.path.isdir(x)])
print([x for x in os.listdir('') if os.path.isfile(
    x) and os.path.splitext(x)[1] == '.py'])
