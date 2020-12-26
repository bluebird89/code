package main

import (
	"fmt"
	"time"
)

func say(s string) {
	for i := 0; i < 5; i++ {
		time.Sleep(time.Millisecond * 100)
		fmt.Println(s, time.Now())
	}
}

// Go 程（goroutine）a lightweight thread managed by the Go runtime.
// go f(x, y, z)  会启动一个新的 Go 程并执行 f()
//     The evaluation of f, x, y, and z happens in the current goroutine f, x, y 和 z 的求值发生在当前的 Go 程中
//     the execution of f happens in the new goroutine.
// Go 程在相同的地址空间中运行，因此在访问共享的内存时必须进行同步。sync 包提供了这种能力，不过在 Go 中并不经常用到
func main() {
	go say("world")
	say("Hello")
}
