package main

import (
	"fmt"
	"time"
)

func main() {
	t := time.Now()
	// 没有条件的 switch
	switch {
	case t.Hour() < 12:
		fmt.Println("Good Morning!")
	case t.Hour() < 17:
		fmt.Println("Good afternoon!")
	default:
		fmt.Println("Good evening!")
	}
}
