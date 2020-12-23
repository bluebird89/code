package main

import "fmt"

func main() {
	var i interface{} = "hello"

	s := i.(string)
	fmt.Println(s)

	s, ok := i.(string)
	fmt.Println(s, ok)

	// 类型断言 提供了访问接口值底层具体值的方式
	f, ok := i.(float64)
	fmt.Println(f, ok)

	// f = i.(float64) // 报错(panic)
	// fmt.Println(f)
}
