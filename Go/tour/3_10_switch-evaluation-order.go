package main

import (
	"fmt"
	"time"
)

// 从上到下顺次执行，直到匹配成功时停止
func main() {
	fmt.Print("When's Saturday?")
	today := time.Now().Weekday()
	fmt.Println(today)
	switch time.Saturday {
	case today + 0:
		fmt.Println("Today.")
	case today + 1:
		fmt.Println("Tomorrow.")
	case today + 2:
		fmt.Println("In two days.")
	default:
		fmt.Printf("Too far away.")
	}
}
