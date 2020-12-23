package main

import "fmt"

// 返回一个“返回int的函数”
func fibonacci() func() int {
	f, g := 1, 0
	//因为下面加法运算完后才返回f，且最终打印值为f()也就是f的值。所以如果我们想返回从0开始的数列，需要将g初始赋值为0
	return func() int {
		f, g = g, f+g
		return f
	}
}

func main() {
	f := fibonacci()
	for i := 0; i < 10; i++ {
		fmt.Println(f())
	}
}
