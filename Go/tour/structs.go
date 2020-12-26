package main

import "fmt"

//A struct is a collection of fields.
type Vertex struct {
	X int
	Y int
}

//Struct Literals 结构体文法
// 通过直接列出字段的值来新分配一个结构体 denotes a newly allocated struct value by listing the values of its fields.
// 使用 Name: 语法可以仅列出部分字段。（字段名的顺序无关。）
// 特殊的前缀 & 返回一个指向结构体的指针
var (
	v1 = Vertex{1, 2}  // 创建一个 Vertex 类型的结构体
	v2 = Vertex{X: 1}  // Y:0 被隐式地赋予
	v3 = Vertex{}      // X:0 Y:0
	p  = &Vertex{1, 2} // 创建一个 *Vertex 类型的结构体（指针）
)

// 通过结构体指针来访问结构体字段
// 使用隐式间接引用，直接写 p.X 就可以
func main() {
	v := Vertex{1, 2}
	// Struct Fields accessed using a dot.
	v.X = 4
	fmt.Println(v)

	//Pointers to structs:Struct fields can be accessed through a struct pointer.
	//隐式间接引用
	p := &v
	p.X = 1e9
	fmt.Println(v)

	fmt.Println(v1, p, v2, v3)
}
