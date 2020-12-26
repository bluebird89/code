package main

import (
	"fmt"
	"math"
	"math/cmplx"
)

// basic types

//bool
//
//string
//
//int  int8  int16  int32  int64
//uint uint8 uint16 uint32 uint64 uintptr
//
//byte // alias for uint8
//
//rune // alias for int32
//// represents a Unicode code point
//
//float32 float64
//
//complex64 complex128

// ariable declarations may be "factored" into blocks, as with import statements

//need an integer value you should use int unless you have a specific reason to use a sized or unsigned integer type
var (
	ToBe   bool       = false
	MaxInt uint64     = 1<<64 - 1
	z      complex128 = cmplx.Sqrt(-5 + 12i)
)

func main() {
	fmt.Printf("Type: %T Value: %v\n", ToBe, ToBe)
	fmt.Printf("Type: %T Value: %v\n", MaxInt, MaxInt)
	fmt.Printf("Type: %T Value: %v\n", z, z)

	//Zero values:没有明确初始值的变量声明会被赋予它们的 零值
	var i int
	var f float64
	var b bool
	var s string
	fmt.Printf("%v %v %v %q\n", i, f, b, s)

	// Type conversions
	//in Go assignment between items of different type requires an explicit conversion
	var x, y int = 3, 4
	var f1 float64 = math.Sqrt(float64(x*x + y*y))
	var z uint = uint(f1)
	fmt.Println(x, y, f1, z)

	// Type inference 类型推测
	// 在声明一个变量而不指定其类型时（即使用不带类型的 := 语法或 var = 表达式语法），变量的类型由右值推导得出。
	v := 42 // change me!
	fmt.Printf("v is of type %T\n", v)
}
