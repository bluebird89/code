package main

import (
	"fmt"
	"strconv"
	"time"
)

//使用 error 值来表示错误状态
//与 fmt.Stringer 类似，error 类型是一个内建接口：
//
//type error interface {
//	Error() string
//}
//通常函数会返回一个 error 值，调用的它的代码应当判断这个错误是否等于 nil 来进行错误处理。
//error 为 nil 时表示成功；非 nil 的 error 表示失败。
type MyError struct {
	When time.Time
	What string
}

func (e *MyError) Error() string {
	return fmt.Sprintf("At %v, %s", e.When, e.What)
}

func run1() error {
	return &MyError{
		time.Now(),
		"it didn't work",
	}
}

func main() {
	if err := run1(); err != nil {
		fmt.Println(err)
	}

	i, err := strconv.Atoi("42")
	if err != nil {
		fmt.Printf("couldn't convert number: %v\n", err)
		return
	}
	fmt.Println("Converted integer:", i)

	fmt.Println(Sqrt(2))
	fmt.Println(Sqrt(-5))
	//fmt.Println(Sqrt(2i))
}

// Sqrt 接受到一个负数时，应当返回一个非 nil 的错误值。复数同样也不被支持。
type ErrNegativeSqrt float64

func (e ErrNegativeSqrt) Error() string {
	return fmt.Sprintf("cannot Sqrt negative number: %v", float64(e))
}
func Sqrt(x float64) (float64, error) {
	if x < 0 {
		return -1, ErrNegativeSqrt(-2)
	}

	z := 1.0
	for i := 1; (z-x) < 0.001 && i < 10; i++ {
		z -= (z*z - x) / (2 * z)
	}
	return z, nil
}
