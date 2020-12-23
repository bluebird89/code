package main

import "fmt"

type Vertex struct {
	X, Y float64
}

func (v *Vertex) Scale(f float64) {
	v.X = v.X * f
	v.Y = v.Y * f
}

func ScaleFunc(v *Vertex, f float64) {
	v.X = v.X * f
	v.Y = v.Y * f
}

func main() {
	v := Vertex{3, 4}
	p := &Vertex{4, 3}
	// 方法  值或者指针都OK
	v.Scale(2)
	p.Scale(3)
	// 函数 必须参数类型一致
	ScaleFunc(&v, 10)
	ScaleFunc(p, 8)

	fmt.Println(v, p)
}
