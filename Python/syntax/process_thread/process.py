import os
import time
import random
import subprocess
from multiprocessing import Process, Pool, Queue

print('Process (%s) start...' % os.getpid())
# OS 创建子进程
# Only works on Unix/Linux/Mac:
pid = os.fork()
if pid == 0:
    print('I am child process (%s) and my parent is %s.' %
          (os.getpid(), os.getppid()))
else:
    print('I (%s) just created a child process (%s).' % (os.getpid(), pid))


def run_proc(name):
    print('Run child process %s (%s)...' % (name, os.getpid()))


# multiprocessing模块就是跨平台版本的多进程模块
print('Parent process %s.' % os.getpid())
p = Process(target=run_proc, args=('tests',))
print('Child process will start.')
p.start()
# join()方法可以等待子进程结束后再继续往下运行，通常用于进程间的同步
p.join()
print('Child process end.')


# 用进程池的方式批量创建子进程
def long_time_task(name):
    print('Run task %s (%s)...' % (name, os.getpid()))
    start = time.time()
    time.sleep(random.random() * 3)
    end = time.time()
    print('Task %s runs %0.2f seconds.' % (name, (end - start)))


# task 0，1，2，3是立刻执行的，而task 4要等待前面某个task完成后才执行
# if __name__ == '__main__':
print('Parent process %s.' % os.getpid())
p = Pool(4)
for i in range(5):
    p.apply_async(long_time_task, args=(i,))
print('Waiting for all subprocesses done...')
p.close()
# 调用join()方法会等待所有子进程执行完毕，调用join()之前必须先调用close()，调用close()之后就不能继续添加新的Process了。
p.join()
print('All subprocesses done.')


# 子进程并不是自身，而是一个外部进程。我们创建了子进程后，还需要控制子进程的输入和输出
print('$ nslookup www.python.org')
r = subprocess.call(['nslookup', 'www.python.org'])
print('Exit code:', r)


# 需要输入
print('$ nslookup')
p = subprocess.Popen(['nslookup'], stdin=subprocess.PIPE,
                     stdout=subprocess.PIPE, stderr=subprocess.PIPE)
output, err = p.communicate(b'set q=mx\npython.org\nexit\n')
print(output.decode('utf-8'))
print('Exit code:', p.returncode)


# 进程间通信
# 写数据进程执行的代码:
def write(q):
    print('Process to write: %s' % os.getpid())
    for value in ['A', 'B', 'C']:
        print('Put %s to queue...' % value)
        q.put(value)
        time.sleep(random.random())


# 读数据进程执行的代码:
def read(q):
    print('Process to read: %s' % os.getpid())
    while True:
        value = q.get(True)
        print('Get %s from queue.' % value)


# 父进程创建Queue，并传给各个子进程：
print('进程间通信')
q = Queue()
pw = Process(target=write, args=(q,))
pr = Process(target=read, args=(q,))
# 启动子进程pw，写入:
pw.start()
# 启动子进程pr，读取:
pr.start()
# 等待pw结束:
pw.join()
# pr进程里是死循环，无法等待其结束，只能强行终止:
pr.terminate()
