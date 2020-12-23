package main

import (
	"fmt"
	"math"
)

type Vertex struct {
	X, Y float64
}

func (v Vertex) Abs() float64 {
	return math.Sqrt(v.X*v.X + v.Y*v.Y)
}

func AbsFunc(v Vertex) float64 {
	return math.Sqrt(v.X*v.X + v.Y*v.Y)
}

func main() {
	v := Vertex{3, 4}
	p := &Vertex{4, 3}

	fmt.Println(v.Abs())
	fmt.Println(p.Abs())
	// fmt.Println(AbsFunc(&v)) // 编译错误！
	fmt.Println(AbsFunc(v))
	fmt.Println(AbsFunc(*p))
}
