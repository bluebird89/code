package main

import "fmt"

func main() {
	// the for loop:Go has only one looping construc
	//the init statement: executed before the first iteration, often be a short variable declaration, and the variables declared there are visible only in the scope of the for statement
	//the condition expression: evaluated before every iteration. The loop will stop iterating once the boolean condition evaluates to false.
	//the post statement: executed at the end of every iteration
	// no parentheses surrounding the three components of the for statement and the braces { } are always required
	sum := 0
	for i := 0; i < 10; i++ {
		sum += i
	}
	fmt.Println(sum)

	// 初始化语句和后置语句是可选的, 去掉分号可以去掉
	sum = 1
	for sum < 1000 {
		sum += sum
	}
	fmt.Println(sum)

	// For is Go's "while":C's while is spelled for in Go
	sum = 1
	for sum < 1000 {
		sum += sum
	}
	fmt.Println(sum)

	// forever:If you omit the loop condition it loops forever, so an infinite loop is compactly expressed.
	for {
	}
}
