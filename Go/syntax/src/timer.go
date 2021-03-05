package main

import "time"
import "fmt"

func main() {
	timer := time.NewTimer(2 * time.Second)
	<-timer.C
	fmt.Println("timer expired!")

	ticker := time.NewTicker(time.Second)
	go func() {
		for t := range ticker.C {
			fmt.Println(t)
		}
	}()
	//设置一个timer，10钞后停掉ticker
	timer1 := time.NewTimer(10 * time.Second)
	<-timer1.C
	ticker.Stop()
	fmt.Println("timer expired!")

	// 1.获取ticker对象
	//ticker := time.NewTicker(1 * time.Second)
	//i := 0
	//// 子协程
	//go func() {
	//	for {
	//		//<-ticker.C
	//		i++
	//		fmt.Println(<-ticker.C)
	//		if i == 5 {
	//			//停止
	//			ticker.Stop()
	//		}
	//	}
	//}()
	//time.Sleep(6 * time.Second)
}
