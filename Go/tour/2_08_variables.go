package main

import "fmt"

// var 语句用于声明一个变量列表，跟函数的参数列表一样，类型在最后。可以出现在包或函数级别
var c, python, java bool

func main() {
	var i int
	fmt.Println(i, c, python, java) // 0 false false false
}
