package main

import (
	"fmt"
	"math"
)

// An interface type is defined as a set of method signatures.定义方法名称
// 抽象接口方法的不同实现
// A value of interface type can hold any value that implements those methods.

//A type implements an interface by implementing its methods. There is no explicit declaration of intent, no "implements" keyword.

// Implicit interfaces decouple the definition of an interface from its implementation, which could then appear in any package without prearrangement.

type Abser interface {
	Abs() float64
}

type MyFloat float64

func (f MyFloat) Abs() float64 {
	if f < 0 {
		return float64(-f)
	}
	return float64(f)
}

type Vertex3 struct {
	X, Y float64
}

// 实现方法即为实现接口，无需显式声明
func (v *Vertex3) Abs() float64 {
	if v == nil {
		fmt.Println("<nil>")
		return 0
	}

	return math.Sqrt(v.X*v.X + v.Y*v.Y)
}

func main() {
	//The empty interface
	//used by code that handles values of unknown type
	var i interface{}
	describe(i)

	i = 42
	describe(i)

	i = "hello"
	describe(i)

	// 接口声明
	var a Abser
	// nil 接口值既不保存值也不保存具体类型。
	// 为 nil 接口调用方法会产生运行时错误，因为接口的元组内并未包含能够指明该调用哪个 具体 方法的类型。
	describe(a)
	//fmt.Println(a.Abs())

	//Interface values with nil underlying values
	// 接口内的具体值为 nil，方法仍然会被 nil 接收者调用。
	// 保存了 nil 具体值的接口其自身并不为 nil
	var v *Vertex3
	a = v
	describe(a)
	fmt.Println(a.Abs())

	a = &Vertex3{3, 4}
	//接口也是值。它们可以像其它值一样传递。接口值可以用作函数的参数或返回值。
	//Interface values:thought of as a tuple of a value and a concrete type 内部，接口值可以看做包含值和具体类型的元组
	//holds a value of a specific underlying concrete type. 接口值保存了一个具体底层类型的具体值。
	//Calling a method on an interface value executes the method of the same name on its underlying type. 接口值调用方法时会执行其底层类型的同名方法。
	describe(a)
	fmt.Println(a.Abs())

	a = MyFloat(-math.Sqrt2)
	describe(a)
	fmt.Println(a.Abs())

}

func describe(i interface{}) {
	fmt.Printf("(%v, %T)\n", i, i)
}
