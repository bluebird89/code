def fizz_buzz(limit):
    for i in range(limit):
        if i % 3 == 0:
            print('fizz')
        if i % 5 == 0:
            print('fizz')
        if i % 3 and i % 5:
            print(i)

def main():
    fizz_buzz(10)

    主函数没有被调用
从 0 而不是 1 开始
在 15 的整数倍的时候在不用行打印 “fizz” 和 “buzz”
在 5 的整数倍的时候打印 “fizz”
采用硬编码的参数 10 而不是从命令控制行读取参数

