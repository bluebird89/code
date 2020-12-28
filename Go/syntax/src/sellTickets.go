package main

import (
	"fmt"
	"math/rand"
	"runtime"
	"sync"
	"time"
)

var totalTickets int32 = 10
var mutex = &sync.Mutex{} //可简写成：var mutex sync.Mutex

func sellTickets(i int) {
	for totalTickets > 0 {
		mutex.Lock()
		if totalTickets > 0 {
			time.Sleep(time.Duration(rand.Intn(5)) * time.Millisecond)
			totalTickets--
			fmt.Println("id:", i, "  ticket:", totalTickets)
		}
		mutex.Unlock()
	}
}

func main() {

	runtime.GOMAXPROCS(4)        //电脑是4核处理器，所以我设置了4
	rand.Seed(time.Now().Unix()) //生成随机种子
	for i := 0; i < 5; i++ {     //并发5个goroutine来卖票
		go sellTickets(i)
	}

	//等待线程执行完
	var input string
	fmt.Scanln(&input)
	fmt.Println(totalTickets, "done") //退出时打印还有多少票

}
