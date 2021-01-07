from functools import wraps
import functools


# 一个返回函数的高阶函数:接受一个函数作为参数，并返回一个函数
# functools.wraps: 把原始函数的__name__等属性复制到wrapper()函数
def logging(level):
    def wrapper(func):
        @functools.wraps(func)
        def inner_wrapper(*args, **kwargs):
            print("[{level}]: enter function {func}()".format(
                level=level,
                func=func.__name__))
            return func(*args, **kwargs)
        return inner_wrapper
    return wrapper


# class logging(object):
#     def __init__(self, func):
#         self.func = func

#     def __call__(self, func):  # 接受函数
#         def wrapper(*args, **kwargs):
#             print("[{level}]: enter function {func}()".format(
#                 level=self.level,
#                 func=func.__name__))
#             func(*args, **kwargs)
#         return wrapper  # 返回函数


@logging(level='INFO')
def say_hello(something):
    print("say {}!".format(something))


@logging(level='DEBUG')
def do(something):
    print("do {}...".format(something))




# # classmethod
# class classmethod(object):
#    """
#    classmethod(function) -> method
#    """
#    def __init__(self, function):  # for @classmethod decorator
#        pass
#    # ...
# class staticmethod(object):
#    """
#    staticmethod(function) -> method
#    """
#    def __init__(self, function):  # for @staticmethod decorator
#        pass
#    # ...
# class Foo(object):
#    @staticmethod
#    def bar():
#        pass
#    # 等同于 bar = staticmethod(bar)


if __name__ == '__main__':
    say_hello('hello')
    do('my work')


# 代码运行期间动态增加功能的方式,参数为函数名称的高阶函数
def log(func):
    @functools.wraps(func)
    def wrapper(*args, **kw):
        print('call %s():' % func.__name__)
        return func(*args, **kw)
    return wrapper


@log
def now():
    print('2015-3-25')


now()


def log(text):
    def decorator(func):
        @functools.wraps(func)
        def wrapper(*args, **kw):
            print('%s %s():' % (text, func.__name__))
            return func(*args, **kw)
        return wrapper
    return decorator


@log('execute')
def now():
    print('2015-3-25')


now()

# 偏函数:一个函数的某些参数给固定住（也就是设置默认值），返回一个新的函数，调用这个新函数会更简单
int2 = functools.partial(int, base=2)
print(int2('1000000'))
