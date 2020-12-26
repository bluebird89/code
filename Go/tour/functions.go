package main

import (
	"fmt"
	"math"
)

//take zero or more arguments.
func add(x int, y int) int {
	return x + y
}

// 连续两个或多个已命名形参类型相同时，除最后一个类型以外，其它都可以省略
func add1(x, y int) int {
	return x + y
}

//multiple-results 返回任意数量返回值
func swap(x, y string) (string, string) {
	return y, x
}

// Named return values
//Go's return values may be named. If so, they are treated as variables defined at the top of the function.
// 返回值的名称应当具有一定的意义，可以作为文档使用。
// 没有参数的 return 语句返回已命名的返回值。也就是 直接 返回。
// 直接返回语句应当仅用在下面这样的短函数中。在长的函数中它们会影响代码的可读性。
func split(sum int) (x, y int) {
	x = sum * 4 / 9
	y = sum - x
	return
}

func compute(fn func(float64, float64) float64) float64 {
	return fn(3, 4)
}

// 绑定函数外变量，再封装一层
//A closure is a function value that references variables from outside its body. The function may access and assign to the referenced variables; in this sense the function is "bound" to the variables.
func adder() func(int) int {
	sum := 0
	return func(x int) int {
		sum += x
		return sum
	}
}

// 返回一个“返回int的函数”
func fibonacci1() func() int {
	f, g := 1, 0
	//下面加法运算完后才返回f，且最终打印值为f()也就是f的值。所以如果我们想返回从0开始的数列，需要将g初始赋值为0
	return func() int {
		f, g = g, f+g
		return f
	}
}

func main() {
	fmt.Println(add(42, 13))
	fmt.Println(add1(4200, 1003))

	a, b := swap("hello", "world")
	fmt.Println(a, b)

	fmt.Println(split(17))

	fmt.Print("------Function values:may be used as function arguments and return values----- \r\n")
	hypot := func(x, y float64) float64 {
		return math.Sqrt(x*x + y*y)
	}
	fmt.Println(hypot(5, 12))

	fmt.Println(compute(hypot))
	fmt.Println(compute(math.Pow))

	// closures 闭包:一个函数值，它引用了其函数体之外的变量。该函数可以访问并赋予其引用的变量的值，换句话说，该函数被这些变量“绑定”在一起
	pos, neg := adder(), adder()
	for i := 0; i < 10; i++ {
		fmt.Println(
			pos(i),
			neg(-2*i),
		)
	}

	f := fibonacci1()
	for i := 0; i < 10; i++ {
		fmt.Println(f())
	}
}
