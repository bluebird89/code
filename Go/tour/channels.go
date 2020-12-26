package main

import (
	"fmt"
	"time"
)

// 信道 带有类型的管道 a typed conduit，can send and receive values with the channel operator, <-,（The data flows in the direction of the arrow.）
//ch <- v    // Send v to channel ch.
//v := <-ch  // Receive from ch, and assign value to v.
//channels are great for communication among goroutines

// By default, sends and receives block until the other side is ready. This allows goroutines to synchronize without explicit locks or condition variables.
func sum(s []int, c chan int) {
	sum := 0
	for _, v := range s {
		sum += v
	}

	c <- sum // send sum to c
}

// A sender can close a channel to indicate that no more values will be sent.
// Receivers can test whether a channel has been closed by assigning a second parameter to the receive expression: after v, ok := <-ch
// 迭代例子
func fibonacci2(n int, c chan int) {
	x, y := 0, 1
	for i := 0; i < n; i++ {
		c <- x
		x, y = y, y+x
	}
	// fatal error: all goroutines are asleep - deadlock!
	close(c)
}

func main() {
	s := []int{7, 2, 8, -9, 4, 0}
	//和映射与切片一样，在使用前必须创建
	c := make(chan int)

	go sum(s[len(s)/2:], c)
	go sum(s[:len(s)/2], c)
	//By default, sends and receives block until the other side is ready. This allows goroutines to synchronize without explicit locks or condition variables.
	x, y := <-c, <-c // receive from c
	fmt.Println(x, y, x+y)

	//Buffered Channels：Provide the buffer length as the second argument to make to initialize a buffered channel
	//  Sends to a buffered channel block only when the buffer is full.
	//	Receives block when the buffer is empty
	ch := make(chan int, 2)
	ch <- 1
	ch <- 2
	//ch <- 3 # fatal error: all goroutines are asleep - deadlock!
	fmt.Println(<-ch)
	fmt.Println(<-ch)
	//fmt.Println(<-ch)

	// Range and Close
	c = make(chan int, 10)
	go fibonacci2(cap(c), c)
	for i := range c {
		fmt.Println(i)
	}

	// Select
	c = make(chan int)
	quit := make(chan int)
	go func() {
		for i := 0; i < 10; i++ {
			fmt.Println(<-c)
		}
		quit <- 0
	}()
	fibonacci(c, quit)

	//Default Selection
	//The default case in a select is run if no other case is ready.
	//Use a default case to try a send or receive without blocking
	tick := time.Tick(100 * time.Millisecond)
	boom := time.After(500 * time.Millisecond)
	for {
		select {
		case <-tick:
			fmt.Println("tick.")
		case <-boom:
			fmt.Println("BOOM!")
			return
			//接收会阻塞时执行
		default:
			fmt.Println("    .")
			time.Sleep(50 * time.Millisecond)
		}
	}
}

// The select statement lets a goroutine wait on multiple communication operations. select 语句使一个 Go 程可以等待多个通信操作。
// A select blocks until one of its cases can run, then it executes that case. It chooses one at random if multiple are ready. select 会阻塞到某个分支可以继续执行为止，这时就会执行该分支。当多个分支都准备好时会随机选择一个执行。
func fibonacci(c, quit chan int) {
	x, y := 0, 1
	for {
		select {
		case c <- x:
			x, y = y, x+y
		case <-quit:
			fmt.Println("quit")
			return
		}
	}
}
