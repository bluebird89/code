package main

import "fmt"

// 在声明一个变量而不指定其类型时（即使用不带类型的 := 语法或 var = 表达式语法），变量的类型由右值推导得出。
func main() {
	v := 42
	fmt.Printf("v is of type %T\n", v)
}
