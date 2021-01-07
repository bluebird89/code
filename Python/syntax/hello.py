#!/usr/bin/env python3
# -*- coding: utf-8 -*-

# 一组Python代码的集合
# 代码的可维护性
# 避免函数名和变量名冲突

' a tests module '

__author__ = 'Michael Liao'

import sys


def test():
    args = sys.argv
    if len(args) == 1:
        print('Hello, world!')
    elif len(args) == 2:
        print('Hello, %s!' % args[1])
    else:
        print('Too many arguments!')


if __name__ == '__main__':
    test()
