package main

import "fmt"

const Pi = 3.14

const (
	// 将 1 左移 100 位来创建一个非常大的数字
	// 即这个数的二进制是 1 后面跟着 100 个 0
	Big = 1 << 100
	// 再往右移 99 位，即 Small = 1 << 1，或者说 Small = 2
	Small = Big >> 99
)

func needInt(x int) int { return x*10 + 1 }
func needFloat(x float64) float64 {
	return x * 0.1
}

func main() {
	// Constants declare
	// can be character, string, boolean, or numeric values.
	// cannot be declared using the := syntax
	const World = "世界"
	fmt.Println("Hello", World)
	fmt.Println("Hello", Pi, "Day")

	const Truth = true
	fmt.Println("Go rules?", Truth)

	//  Numeric Constants: are high-precision values.
	// An untyped constant takes the type needed by its context.
	//An int can store at maximum a 64-bit integer, and sometimes less.
	fmt.Println(needInt(Small))
	fmt.Println(needFloat(Small))
	fmt.Println(needFloat(Big))
}
