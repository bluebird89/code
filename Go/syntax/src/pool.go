package main

import (
	"fmt"
	"sync"
)

// 对对象进行重复利用，以避免产生太多垃圾
// sync.Pool 是一个临时对象池，用来临时存储对象，下次使用时从对象池中获取，避免重复创建对象。提供了 Put 和 Get 方法，分别对临时对象进行存储和获取
// Put 方法支持的参数类型是空接口 interface{}，因此这个值可以是任何类型 通过 Get 方法从临时对称池获取临时对象后，会将原来存放在里面的对象删除，最后再返回这个对象，而如果临时对象池中原来没有存储任何对象，调用 Get 方法时会通过对象池的 New 字段对应函数创建一个新值并返回（这个 New 字段需要在初始化临时对象池时指定，否则对象池为空时调用 Get 方法返回的可能就是 nil），从而保证无论临时对象池中是否存在值，始终都能返回结果
// Get 方法返回值类型也是 interface{}
// 适用于在并发编程中用作临时对象缓存，实现对象的重复使用，优化 GC，提升系统性能，但是由于不能设置对象池大小，而且放进对象池的临时对象每次 GC 运行时会被清除，所以只能用作简单的临时对象池，不能用作持久化的长连接池，比如数据库连接池、Redis 连接池

func main() {
	var pool = &sync.Pool{
		New: func() interface{} {
			return "Hello,World!"
		},
	}
	value := "Hello,学院君!"
	pool.Put(value)
	fmt.Println(pool.Get())
	fmt.Println(pool.Get())

	var wg sync.WaitGroup
	wg.Add(1)
	go testPut(pool, wg.Done)
	wg.Wait()
	fmt.Println(pool.Get())
}

func testPut(pool *sync.Pool, deferFunc func()) {
	defer func() {
		deferFunc()
	}()
	value := "Hello,学院君!"
	pool.Put(value)
}
