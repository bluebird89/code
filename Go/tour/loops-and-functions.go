package main

import (
	"fmt"
	"math"
)

// 牛顿法实现平方根函数:根据 z² 与 x 的近似度来调整 z，产生一个更好的猜测
//
func mysqrt(x int) {
	z := 1.00
	for i := 0; i < 10; i++ {
		z -= (z*z - float64(x)) / (2 * z)
		fmt.Println(z)
	}
}

func main() {
	mysqrt(15)

	fmt.Println("math.Sqrt is :", math.Sqrt(100))
}
