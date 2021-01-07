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
}
