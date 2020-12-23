package main

import "fmt"

func main() {
	// 初始化语句：在第一次迭代前执行
	// 条件表达式：在每次迭代前求值
	// 后置语句：在每次迭代的结尾执行
	sum := 0
	for i := 0; i < 10; i++ {
		sum += i
	}
	fmt.Println(sum)

	// 初始化语句和后置语句是可选的, 去掉分号可以去掉
	sum1 := 1
	for sum1 < 10 {
		sum1 += sum1
	}
	fmt.Println(sum1)

	// 省略循环条件 无限循环
	for {
	}
}
