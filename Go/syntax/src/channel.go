package main

import (
	"fmt"
	"math/rand"
	"time"
)

var chs0 [10]chan int
var chs1 []chan int
var chs2 map[string]chan int

// 第二个参数:通道容量,有容量瓶颈
// 默认  0，此时通道可以被称作非缓冲通道，表示往通道中发送一个元素后，只有该元素被接收后才能存入下一个元素
// 当缓存值大于 0 时，通道可以称作缓冲通道，即使通道元素没有被接收，也可以继续往里面发送元素，直到超过缓冲值

// 单向管道:在使用层面对通道进行限制(参数类型)，而不是语法层面
// 约束在生产协程中只能发送数据到通道，而在消费协程中只能从通道接收数据，从而让代码遵循「最小权限原则」，避免误操作和通道使用的混乱，让代码更加稳健
// 类型转化:转化是不可逆的，双向通道可以转化为任意类型的单向通道，但单向通道不能转化为双向通道，读写通道之间也不能相互转化
// 关闭通道函数 close 也不能作用到只读通道
//ch1 := make(chan int)
//ch2 := <-chan int(ch1)
//ch3 := chan<- int(ch1)

// 将数据发送到通道时，发送的是数据副本
// 从通道中接收数据时，接收的也是数据副本
// 如果通道中没有数据，进行读取操作的话会导致读取操作所在的协程阻塞，直到通道中写入了数据
// 如果通道中已经有了数据，再往里面写入数据的话，也会导致写入操作所在的协程阻塞，直到其中的数据被其他协程接收
// 动态平衡达到最大性能:中间件
func pTest(ch chan int) {
	for i := 0; i < 100; i++ {
		ch <- i
	}
	// 从一个空的通道接收数据会报如下运行时错误（死锁）
	// 关闭通道的操作只能执行一次，试图关闭已关闭的通道会引发 panic
	// 关闭通道的操作只能在发送数据的一方关闭，如果在接收一方关闭，会导致 panic
	close(ch)
}

// 通过 select 分支语句选择指定分支代码执行: 分支会并发执行
// 会选择先操作成功返回的那个 case 分支去执行，如果两者同时返回，则随机选择一个执行，如果这两者都没有返回，则进入 default 分支，这里也不会出现阻塞
// 如果 chan1 通道为空，或者 chan2 通道已满，就会立即进入 default 分支，但是如果没有 default 语句，则会阻塞直到某个通道操作成功
// select 语句只能对其中的每一个 case 表达式各求值一次，如果想连续操作其中的通道的话，需要通过在 for 语句中嵌入 select 语句的方式来实现
func main() {
	start := time.Now()
	ch := make(chan int, 20)
	go pTest(ch)
	// 循环 从通道中读取数据
	for i := range ch {
		fmt.Println("接收到的数据:", i)
	}
	end := time.Now()
	consume := end.Sub(start).Seconds()
	fmt.Println("程序执行耗时(s)：", consume)

	chs := [3]chan int{
		make(chan int, 1),
		make(chan int, 1),
		make(chan int, 1),
	}
	index := rand.Intn(3) // 随机生成0-2之间的数字
	fmt.Printf("随机索引/数值: %d\n", index)
	chs[index] <- index // 向通道发送随机数字

	// 哪一个通道中有值，哪个对应的分支就会被执行
	select {
	case <-chs[0]:
		fmt.Println("第一个条件分支被选中")
	case <-chs[1]:
		fmt.Println("第二个条件分支被选中")
	case num := <-chs[2]:
		fmt.Println("第三个条件分支被选中:", num)
	default:
		fmt.Println("没有分支被选中")
	}

	index2 := rand.Intn(3)
	fmt.Printf("随机索引/数值: %d\n", index2)
	chs[index2] <- rand.Int()

	index3 := rand.Intn(3)
	fmt.Printf("随机索引/数值: %d\n", index3)
	chs[index3] <- rand.Int()

	// 哪一个通道中有值，哪个对应的分支就会被执行
	for i := 0; i < 3; i++ {
		select {
		case num, ok := <-chs[0]:
			if !ok {
				break
			}
			fmt.Println("第一个条件分支被选中: chs[0]=>", num)
		case num, ok := <-chs[1]:
			if !ok {
				break
			}
			fmt.Println("第二个条件分支被选中: chs[1]=>", num)
		case num, ok := <-chs[2]:
			if !ok {
				break
			}
			fmt.Println("第三个条件分支被选中: chs[2]=>", num)
		default:
			fmt.Println("没有分支被选中")
		}
	}

	// 超时处理机制:只要其中一个 case 对应的通道操作已经完成，程序就会继续往下执行，而不会考虑其他 case 的情况
	ch4 := make(chan int, 1)
	timeout := make(chan bool, 1)
	go func() {
		time.Sleep(1e9) // 睡眠1秒钟
		timeout <- true
	}()
	select {
	case <-ch4:
		fmt.Println("接收到 ch 通道数据")
	case <-timeout:
		fmt.Println("超时1秒，程序退出")
	}

	// 避免对已关闭通道再度执行关闭操作引发 panic，一般约定只能在发送方关闭通道
	// 在接收方，则通过通道接收操作返回的第二个参数是否为 false 判定通道是否已经关闭，如果已经关闭，则不再执行发送操作
	ch5 := make(chan int, 2)
	// 发送方
	go func() {
		for i := 0; i < 5; i++ {
			fmt.Printf("发送方: 发送数据 %v...\n", i)
			ch5 <- i
		}
		fmt.Println("发送方: 关闭通道...")
		close(ch5)
	}()
	// 接收方
	for {
		num, ok := <-ch5
		if !ok {
			fmt.Println("接收方: 通道已关闭")
			break
		}
		fmt.Printf("接收方: 接收数据: %v\n", num)
	}
	fmt.Println("程序退出")
}
