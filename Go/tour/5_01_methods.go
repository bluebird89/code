package main

import (
	"fmt"
	"math"
)

type Vertex struct {
	X, Y float64
}

// 数据的扩展方法，根据类型重载
// 声明：结构体 添加方法
// 实例化后调用方法
func (v Vertex) Abs() float64 {
	return math.Sqrt(v.X*v.X + v.Y*v.Y)
}

type MyFloat float64

func (f MyFloat) Abs() float64 {
	if f < 0 {
		return float64(-f)
	}
	return float64(f)
}

// 方法即函数
func Abs(v Vertex) float64 {
	return math.Sqrt(v.X*v.X + v.Y*v.Y)
}
func main() {
	v := Vertex{3, 4}
	fmt.Println(v.Abs())

	f := MyFloat(-math.Sqrt2)
	fmt.Println(f.Abs())
	fmt.Println(Abs(v))
}
