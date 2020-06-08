package main

import (
	"errors"
	"fmt"
	"reflect"
	"time"
)

// 默认按值传参:函数内参数改变对全局变量没有影响
// 像切片（slice）、字典（map）、接口（interface）、通道（channel）引用类型 默认使用引用传参（即使没有显示的指出指针)
func add(a, b int) int {
	a *= 2
	b *= 3
	return a + b
}

// 引用传参 多返回值及返回值命名
func add1(a, b *int) (c int, err error) {
	if *a < 0 || *b < 0 {
		err = errors.New("只支持非负整数")
	}
	*a *= 2
	*b *= 3
	c = *a + *b
	return
}

// 变长参数
func myfunc(numbers ...int) {
	for _, number := range numbers {
		fmt.Println(number)
	}
}

// 任意类型变长参数：空接口类型可以用于表示任意类型
func myPrintf(args ...interface{}) {
	for _, arg := range args {
		switch reflect.TypeOf(arg).Kind() {
		case reflect.Int:
			fmt.Println(arg, "is an int value.")
		case reflect.String:
			fmt.Printf("\"%s\" is a string value.\n", arg)
		case reflect.Array:
			fmt.Println(arg, "is an array type.")
		default:
			fmt.Println(arg, "is an unknown type.")
		}
	}
}

func callback(x int, f func(int, int)) {
	f(x, 2)
}

// 返回函数
func addfunc(a int) func(b int) int {
	return func(b int) int {
		return a + b
	}
}

func main() {
	x, y := 1, 2
	fmt.Printf("add(%d, %d) = %d\n", x, y, add(x, y))

	x = -1
	z, err := add1(&x, &y)
	if err != nil {
		fmt.Println(err.Error())
	}
	fmt.Printf("add(%d, %d) = %d\n", x, y, z)

	myfunc(1, 2, 3, 4, 5)
	slice := []int{1, 2, 3, 4, 5}
	myfunc(slice...)
	myfunc(slice[0:3]...)

	myPrintf(1, "1", [1]int{1}, true)

	// 匿名函数
	add := func(a, b int) int {
		return a + b
	}
	fmt.Println(add(1, 2))
	func(a, b int) {
		fmt.Println(a + b)
	}(1, 2) // 花括号后直接跟参数列表表示直接调用函数

	// 闭包
	var j int = 1
	f := func() {
		// 闭包内部声明的局部变量无法从外部修改
		var i int = 1
		fmt.Printf("i, j: %d, %d\n", i, j)
	}
	f()
	j += 2
	f()

	// 匿名函数作为参数
	i := 10
	add1 := func(a, b int) {
		fmt.Printf("Variable i from main func: %d\n", i)
		fmt.Printf("The sum of %d and %d is: %d\n", a, b, a+b)
	}
	callback(1, add1)

	// 匿名函数作为返回值
	f1 := addfunc(1)
	fmt.Println(f1(2))

	// 递归:函数内部调用函数自身的函数
	n1 := 50
	start1 := time.Now()
	num1 := fibonacci(n1)
	end1 := time.Now()
	consume1 := end1.Sub(start1).Seconds()
	fmt.Printf("The %dth number of fibonacci sequence is %d,It takes %f seconds to calculate the number\n", n1, num1, consume1)
	// 在同一个包中（即定义在同一个目录下的 Go 文件中），只需直接调用即可
	// 跨包调用时，只有首字母大写的函数才可以被调用
}

const MAX = 50

var fibs [MAX]int

func fibonacci(n int) int {
	if n == 1 {
		return 0
	}
	if n == 2 {
		return 1
	}
	// 优化递归
	index := n - 1
	if fibs[index] != 0 {
		return fibs[index]
	}

	num := fibonacci(n-1) + fibonacci(n-2)
	fibs[index] = num
	return num
}
