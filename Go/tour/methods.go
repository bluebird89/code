package main

import (
	"fmt"
	"math"
)

type Vertex2 struct {
	X, Y float64
}

// define methods on types. 对象方法：根据类型重载 A method is a function with a special receiver argument
//can only declare a method with a receiver whose type is defined in the same package as the method. You cannot declare a method with a receiver whose type is defined in another package (which includes the built-in types such as int).
// 声明：结构体 添加方法
// 实例化后调用方法
func (v Vertex2) Abs() float64 {
	return math.Sqrt(v.X*v.X + v.Y*v.Y)
}

// Pointer receivers 为指针接收者声明方法，可以修改接收者指向的值
// 使用值接收者，那么 Scale 方法会对原始 Vertex 值的副本进行操作。本身值没有改变
func (v *Vertex2) Scale(f float64) {
	v.X = v.X * f
	v.Y = v.Y * f
}

// 函数 VS 方法:不同实现方式 a method is just a function with a receiver argument.
//Methods and pointer indirection
// functions
//     with a pointer argument must take a pointer
//     take a value argument must take a value of that specific type
// methods
//     with pointer receivers take either a value or a pointer as the receiver
//     with value receivers take either a value or a pointer as the receiver
func AbsFunc(v Vertex2) float64 {
	return math.Sqrt(v.X*v.X + v.Y*v.Y)
}
func ScaleFunc(v *Vertex2, f float64) {
	v.X = v.X * f
	v.Y = v.Y * f
}

type MyFloat1 float64

//can only declare a method with a receiver whose type is defined in the same package as the method
func (f MyFloat1) Abs() float64 {
	if f < 0 {
		return float64(-f)
	}
	return float64(f)
}

func main() {
	v := Vertex2{3, 4}
	v.Scale(10)
	fmt.Println(v.Abs())

	p := &Vertex2{4, 3}
	// 函数 必须参数类型一致
	ScaleFunc(p, 10)
	// 方法：值或者指针都OK
	p.Scale(3)
	fmt.Println(AbsFunc(*p))

	f := MyFloat1(-math.Sqrt2)
	fmt.Println(f.Abs())
}
