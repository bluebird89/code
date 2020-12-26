package main

import (
	"fmt"
	"runtime"
	"time"
)

func main() {
	//A switch statement is a shorter way to write a sequence of if - else statements.
	//It runs the first case whose value is equal to the condition expression.
	//except that Go only runs the selected case, not all the cases that follow.
	//In effect, the break statement that is needed at the end of each case in those languages is provided automatically in Go
	fmt.Print("Go runs on ")
	switch os := runtime.GOOS; os {
	case "darwin":
		fmt.Println("OS X.")
	case "linux":
		fmt.Println("Linux.")
	default:
		fmt.Printf("%s.", os)
	}

	// switch-evaluation-order 从上到下顺次执行，直到匹配成功时停止
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

	// Switch with no condition
	t := time.Now()
	switch {
	case t.Hour() < 12:
		fmt.Println("Good Morning!")
	case t.Hour() < 17:
		fmt.Println("Good afternoon!")
	default:
		fmt.Println("Good evening!")
	}
}
