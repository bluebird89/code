package main

import (
	"fmt"
	"time"
)

func say(s string) {
	for i := 0; i < 2; i++ {
		time.Sleep(time.Millisecond * 100)
		fmt.Println(s, time.Now())
	}
}

func main() {
	go say("world")
	say("Hello") // Hello world world Hello
}
