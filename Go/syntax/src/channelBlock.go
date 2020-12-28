package main

import (
	"fmt"
	"time"
)

func main() {
	// 哪一个通道中有值，哪个对应的分支就会被执行
	//创建两个channel - c1 c2
	c1 := make(chan string)
	c2 := make(chan string)
	go func() {
		time.Sleep(time.Second * 1)
		c1 <- "Hello"
	}()
	go func() {
		time.Sleep(time.Second * 1)
		c2 <- "World"
	}()
	for {
		timeoutCnt := 0
		select {
		case msg1 := <-c1:
			fmt.Println("msg1 received", msg1)
		case msg2 := <-c2:
			fmt.Println("msg2 received", msg2)
		case <-time.After(time.Second * 30):
			fmt.Println("没有分支被选中 Time Out")
			timeoutCnt++
		}
		if timeoutCnt > 3 {
			break
		}
	}
}
