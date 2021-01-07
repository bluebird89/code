#! usr/bin/env python

import threading
import time
from time import sleep, ctime

loops = [4, 2]


def loop(nloop, nsec):
    print('starting loop', nloop, 'at:', ctime())
    sleep(nsec)
    print('ending loop', nloop, 'done at:', ctime())


def main():
    print('starting at:', ctime())
    threads = []
    nloops = range(len(loops))

    for i in nloops:
        t = threading.Thread(target=loop, args=(i, loops[i]))
        threads.append(t)

    for i in nloops:
        threads[i].start()

    for i in nloops:
        threads[i].join()

    print('all DONE at:', ctime())


# if __name__ == '__main__':
main()


# 新线程执行的代码:
def loop1():
    print('thread %s is running...' % threading.current_thread().name)
    n = 0
    while n < 5:
        n = n + 1
        # current_thread():永远返回当前线程的实例
        print('thread %s >>> %s' % (threading.current_thread().name, n))
        time.sleep(1)
    print('thread %s ended.' % threading.current_thread().name)


# 主线程实例的名字叫MainThread，子线程的名字在创建时指定，用LoopThread命名子线程
print('thread %s is running...' % threading.current_thread().name)
t = threading.Thread(target=loop1, name='LoopThread')
t.start()
t.join()
print('thread %s ended.' % threading.current_thread().name)


# Lock:
# 假定银行存款:
balance = 0
lock = threading.Lock()


def change_it(n):
    # 先存后取，结果应该为0:
    global balance
    balance = balance + n
    balance = balance - n


def run_thread(n):
    for i in range(100000):
        # 先要获取锁: 当多个线程同时执行lock.acquire()时，只有一个线程能成功地获取锁，然后继续执行代码，其他线程就继续等待直到获得锁为止
        # 获得锁的线程用完后一定要释放锁，否则那些苦苦等待锁的线程将永远等待下去，成为死线程。所以我们用try...finally来确保锁一定会被释放
        lock.acquire()
        try:
            change_it(n)
        finally:
            # 改完了一定要释放锁:
            lock.release()


t1 = threading.Thread(target=run_thread, args=(5,))
t2 = threading.Thread(target=run_thread, args=(8,))
t1.start()
t2.start()
t1.join()
t2.join()
print(balance)
