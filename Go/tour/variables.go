package main

import "fmt"

//A var statement can be at package or function level
//A var declaration can include initializers, one per variable.
//If an initializer is present, the type can be omitted; the variable will take the type of the initializer.
var i, j int = 1, 2

func main() {
	// var 语句用于声明一个变量列表，跟函数的参数列表一样，类型在最后。可以出现在包或函数级别
	var c, python, java = true, false, "no!"
	fmt.Println(i, j, c, python, java)

	var i, j int = 4, 5
	//Short variable declarations
	//Inside a function, the := short assignment statement can be used in place of a var declaration with implicit type.
	//Outside a function, every statement begins with a keyword (var, func, and so on) and so the := construct is not available.
	k := 3
	c1, python1, java1 := true, false, "no!"

	fmt.Println(i, j, k, c1, python1, java1)
}
