package main

import "fmt"

func main() {
	var i interface{} = "hello"

	// A type assertion provides access to an interface value's underlying concrete value.访问接口值底层具体值的方式

	// 该语句断言接口值 i 保存了具体类型 string，并将其底层类型为 T 的值赋予变量 s。
	//若 i 并未保存 string 类型的值，会触发一个恐慌
	s := i.(string)
	fmt.Println(s)

	// 判断一个接口值是否保存了一个特定的类型，类型断言可返回两个值：其底层值以及一个报告断言是否成功的布尔值
	// 保存了一个 string ，那么 s 将会是其底层值，而 ok 为 true
	//否则，ok 将为 false 而 s 将为 string 类型的零值，程序并不会产生恐慌
	s, ok := i.(string)
	fmt.Println(s, ok)

	f, ok := i.(float64)
	fmt.Println(f, ok)

	//f = i.(float64) // 报错(panic)
	//fmt.Println(f)

	do(21)
	do("hello")
	do(true)
}

//类型选择 是一种按顺序从几个类型断言中选择分支的结构。
func do(i interface{}) {
	switch v := i.(type) {
	case int:
		fmt.Printf("Twice %v is %v\n", v, v*2)
	case string:
		fmt.Printf("%q is %v bytes long\n", v, len(v))
	default:
		fmt.Printf("I don't know about type %T!\n", v)
	}
}
