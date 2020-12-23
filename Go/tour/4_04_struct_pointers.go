package main

import "fmt"

type Vertex struct {
	X int
	Y int
}

// 可以通过结构体指针来访问结构体字段
// 使用隐式间接引用，直接写 p.X 就可以
func main() {
	v := Vertex{1, 2}
	p := &v
	p.X = 1e9
	fmt.Println(v)
}
