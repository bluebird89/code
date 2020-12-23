package main

import "fmt"

// 在函数中，简洁赋值语句 := 可在类型明确的地方代替 var 声明
func main() {
	var i, j int = 1, 2
	k := 3
	c, python, java := true, false, "no!"

	fmt.Println(i, j, k, c, python, java)
}
