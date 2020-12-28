package main

import (
	"fmt"
	"sync"
	"time"
)

// 保证每次只有一个 Go 程能够访问一个共享的变量
//*互斥（mutual*exclusion）* :通常使用 *互斥锁（Mutex）* 这一数据结构来提供这种机制
//通过在代码前调用 Lock 方法，在代码后调用 Unlock 方法来保证一段代码的互斥执行
// SafeCounter 的并发使用是安全的。
type SafeCounter1 struct {
	v   map[string]int
	mux sync.Mutex
}

// Inc 增加给定 key 的计数器的值。
func (c *SafeCounter1) Inc(key string) {
	c.mux.Lock()
	// Lock 之后同一时刻只有一个 goroutine 能访问 c.v
	c.v[key]++
	c.mux.Unlock()
}

// Value 返回给定 key 的计数器的当前值。
func (c *SafeCounter1) Value(key string) int {
	c.mux.Lock()
	// Lock 之后同一时刻只有一个 goroutine 能访问 c.v
	defer c.mux.Unlock()
	return c.v[key]
}

func main() {
	c := SafeCounter1{v: make(map[string]int)}
	for i := 0; i < 1000; i++ {
		go c.Inc("somekey")
		go c.Inc("another")
	}

	time.Sleep(time.Second)
	fmt.Println(c.Value("somekey"), c.Value("another"))
}
